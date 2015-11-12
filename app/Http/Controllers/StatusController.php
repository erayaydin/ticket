<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Status;
use App\Http\Requests\NewStatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the statuses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('status.index', ['statuses' => Status::all()]);
    }

    /**
     * Show the form for creating a new status.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("status.create");
    }

    /**
     * Store a newly created status in storage.
     *
     * @param  \App\Http\Requests\NewStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewStatusRequest $request)
    {
        $status = new Status;
        $status->name = $request->get('name');
        $status->save();

        return redirect()->route('status.index')->with('success', trans('status.created'));
    }

    /**
     * Show the form for editing the specified status.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('status.edit', ['status' => $status]);
    }

    /**
     * Update the specified status in storage.
     *
     * @param  \App\Http\Requests\NewStatusRequest  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(NewStatusRequest $request, Status $status)
    {
        $status->name = $request->get('name');
        $status->save();

        return redirect()->route('status.edit', $status->id)->with('success', trans('status.edited'));
    }

    /**
     * Remove the specified status from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', trans('status.deleted'));
    }
}
