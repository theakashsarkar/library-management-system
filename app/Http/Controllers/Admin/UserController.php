<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::cursor()->filter(function (User $user)
        {
            return $user->id <= 10;
        });
       
        return view('Admin.pages.UserList.index',['users' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.pages.UserList.index', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->role;
        $user->save();
        return redirect('/admin/user-list')->with('role create successfully');
    }
}
