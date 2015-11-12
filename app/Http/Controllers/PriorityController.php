<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Priority;
use App\Http\Requests\NewPriorityRequest;

class PriorityController extends Controller
{
    /**
     * Display a listing of the priorities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('priority.index', ['priorities' => Priority::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("priority.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewPriorityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewPriorityRequest $request)
    {
        $priority = new Priority;
        $priority->name = $request->get('name');
        $priority->color = $request->get('color');
        $priority->save();

        return redirect()->route('priority.index')->with('success', trans('priority.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified priority.
     *
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit(Priority $priority)
    {
        return view('priority.edit', ['priority' => $priority]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(NewPriorityRequest $request, Priority $priority)
    {
        $priority->name = $request->get('name');
        $priority->color = $request->get('color');
        $priority->save();

        return redirect()->route('priority.edit', $priority->id)->with('success', trans('priority.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('priority.index')->with('success', trans('priority.deleted'));
    }
}
