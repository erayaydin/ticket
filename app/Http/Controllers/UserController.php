<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountRequest;
use App\User;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    /**
     * Display user account settings page
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccount()
    {
        return view("user.account");
    }

    /**
     * Update user account settings
     *
     * @return \Illuminate\Http\Redirect
     */
    public function postAccount(UserAccountRequest $request)
    {
        $user = auth()->user();

        $user->username = $request->get("username");
        $user->email    = $request->get("email");
        if($request->has("password"))
            $user->password = bcrypt($request->get("password"));
        $user->save();

        return redirect()->route("user.getAccount")->with("success", trans("user.account-updated"));
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.index", ["users" => User::orderBy("created_at", "DESC")->paginate(20)]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewUserRequest $request)
    {
        $user = new User;
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        $user->attachRole(Role::find($request->get('role')));

        return redirect()->route('user.index')->with("success", trans("user.created"));
    }

    /**
     * Show the form for editing the specified priority.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        $user->detachAllRoles();
        $user->attachRole(Role::find($request->get('role')));
        return redirect()->route('user.edit', $user->id)->with('success', trans('user.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', trans('user.deleted'));
    }
}
