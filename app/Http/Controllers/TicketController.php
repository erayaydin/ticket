<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use App\TicketComment;
use App\Http\Requests\NewTicketRequest;
use App\Http\Requests\NewCommentRequest;
use App\File;
use Validator;
use App\Http\Requests\SetStatusRequest;
use App\Http\Requests\EditTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is('agent'))
            $tickets = auth()->user()->ownTickets()->orderBy('created_at', 'DESC')->paginate(20);
        elseif(auth()->user()->is('admin'))
            $tickets = Ticket::orderBy('created_at', 'DESC')->paginate(20);
        else
            $tickets = auth()->user()->tickets()->orderBy("created_at", "DESC")->paginate(20);

        return view("ticket.index", ["tickets" => $tickets]);

    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ticket.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewTicketRequest $request)
    {
        $uploadedFiles = [];

        if($request->hasFile("files")){
            $files = $request->file("files");
            $count = count($files);
            $upload = 0;
            $errors = [];
            foreach ($files as $file) {
                $rules = ['file' => 'required'];
                $validator = Validator::make(['file' => $file], $rules);
                if ($validator->passes()) {
                    $fileName = str_random(5)."-".$file->getClientOriginalName();
                    if($file->move(storage_path()."/app/files/", $fileName)){
                        $f = new File;
                        $f->file = $fileName;
                        $f->name = $file->getClientOriginalName();
                        $f->ext = $file->getClientOriginalExtension();
                        $f->size = $file->getClientSize();
                        $f->type = ""; // Todo: 'type' for what ?!
                        $f->save();

                        $uploadedFiles[] = $f;

                        $upload++;
                    }
                }
            }

            if ($upload != $count)
                return redirect()->route('ticket.create')->withInput()->withErrors($errors);
        }


        $ticket = new Ticket;
        $ticket->subject = $request->get("subject");
        $ticket->content = $request->get("content");
        $ticket->department_id = $request->get("department_id");
        $ticket->priority_id = $request->get("priority_id");
        $ticket->user_id = auth()->user()->id;
        $ticket->save();

        if(count($uploadedFiles) > 0){
            foreach($uploadedFiles as $file){
                $ticket->files()->save($file);
            }
        }

        return redirect()->route('ticket.show', $ticket->id)->with("success", trans("ticket.created"));
    }

    /**
     * Display the specified ticket.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        if($ticket->user == auth()->user() || $ticket->agent == auth()->user() || auth()->user()->is('admin'))
            return view("ticket.show", ["ticket" => $ticket]);
        return redirect()->route('ticket.index');
    }

    /**
     * Add comment to specified ticket.
     *
     * @param \App\Http\Requests\NewCommentRequest $request
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function comment(NewCommentRequest $request, Ticket $ticket)
    {
        $uploadedFiles = [];

        if($request->hasFile("files")){
            $files = $request->file("files");
            $count = count($files);
            $upload = 0;
            $errors = [];
            foreach ($files as $file) {
                $rules = ['file' => 'required'];
                $validator = Validator::make(['file' => $file], $rules);
                if ($validator->passes()) {
                    $fileName = str_random(5)."-".$file->getClientOriginalName();
                    if($file->move(storage_path()."/app/files/", $fileName)){
                        $f = new File;
                        $f->file = $fileName;
                        $f->name = $file->getClientOriginalName();
                        $f->ext = $file->getClientOriginalExtension();
                        $f->size = $file->getClientSize();
                        $f->type = ""; // Todo: 'type' for what ?!
                        $f->save();

                        $uploadedFiles[] = $f;

                        $upload++;
                    }
                }
            }

            if ($upload != $count)
                return redirect()->route('ticket.show', $ticket->id)->withInput()->withErrors($errors);
        }

        $comment = new TicketComment;
        $comment->content = $request->get("content");
        $comment->user_id = auth()->user()->id;
        $comment->ticket_id = $ticket->id;
        $comment->save();

        if(count($uploadedFiles) > 0){
            foreach($uploadedFiles as $file){
                $comment->files()->save($file);
            }
        }

        return redirect()->route("ticket.show", $ticket->id)->with("success", trans("comment.success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', ["ticket" => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditTicketRequest  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(EditTicketRequest $request, Ticket $ticket)
    {
        $ticket->subject = $request->get("subject");
        $ticket->content = $request->get("content");
        $ticket->department_id = $request->get("department_id");
        $ticket->priority_id = $request->get("priority_id");
        $ticket->user_id = auth()->user()->id;
        $ticket->save();

        return redirect()->route('ticket.edit', $ticket->id)->with('success', trans("ticket.edited"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index')->with('success', trans('ticket.deleted'));
    }

    /**
     * Set status the specified ticket
     *
     * @param \App\Http\Requests\SetStatusRequest $request
     * @param \App\Ticket $ticket
     */
    public function setStatus(SetStatusRequest $request, Ticket $ticket)
    {
        $ticket->status_id = $request->get('status');
        $ticket->save();

        return redirect()->route('ticket.show', $ticket->id)->with('success', trans('ticket.statusChanged'));
    }
}
