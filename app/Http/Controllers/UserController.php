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
    public function AddUser(Request $request)
    {
        $request->validate([
           'nome_completo' => 'required|string',
           'email' => 'required|email',
           'celular' => 'required|integer',
           'senha' => 'required|confrmed|min:4|max:8',
        ]);
        // $all_users = User::all();
        return view('add-user');
    }
}
