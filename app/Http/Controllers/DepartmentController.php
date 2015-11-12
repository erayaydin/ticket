<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use App\Http\Requests\NewDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index', ['departments' => Department::all()]);
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("department.create");
    }

    /**
     * Store a newly created department in storage.
     *
     * @param  \App\Http\Requests\NewDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewDepartmentRequest $request)
    {
        $department = new Department;
        $department->name = $request->get('name');
        $department->save();

        foreach($request->get('users') as $user){
            $department->users()->attach($user);
        }

        return redirect()->route('department.index')->with('success', trans('department.created'));
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit', ['department' => $department]);
    }

    /**
     * Update the specified department in storage.
     *
     * @param  \App\Http\Requests\NewDepartmentRequest  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(NewDepartmentRequest $request, Department $department)
    {
        $department->name = $request->get('name');
        $department->save();

        $department->users()->sync($request->has('users') ? $request->get('users') : []);

        return redirect()->route('department.edit', $department->id)->with('success', trans('department.edited'));
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')->with('success', trans('department.deleted'));
    }
}
