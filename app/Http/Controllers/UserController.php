<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountRequest;

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
}
