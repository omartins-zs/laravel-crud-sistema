<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('users');
    }

    public function loadAllUserForm()
    {
        return view('add-user');
    }
}
