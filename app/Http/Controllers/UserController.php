<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('users', compact('all_users'));
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
           'celular' => 'required',
           'senha' => 'required|confirmed|min:4|max:8',
        ]);

        try {
            $newUser = new User;
            $newUser->nome_completo = $request->nome_completo;
            $newUser->email = $request->email;
            $newUser->celular = $request->celular;
            $newUser->senha =  Hash::make($request->senha);
            $newUser->save();

            return redirect('/users')->with('success', 'Usuario Adicionado com Sucesso');
        } catch (\Exception $ex) {
            return redirect('/add/user')->with('fail', $ex->getMessage());
        }

        // $all_users = User::all();
        return view('add-user');
    }
}
