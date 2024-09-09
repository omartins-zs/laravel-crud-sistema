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
        // return view('add-user');
    }

    public function loadEditForm($id)
    {
        $user = User::find($id);

        return view('edit-user', compact('user'));
    }
    
    public function EditUser(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string',
            'email' => 'required|email',
            'celular' => 'required',
        ]);

        try {
            $usuario_atualizado = User::where('id', $request->user_id)->update([
                'nome_completo' => $request->nome_completo,
                'email' => $request->email,
                'celular' => $request->celular,
            ]);

            return redirect('/users')->with('success', 'Usuario Atualizado com Sucesso');
        } catch (\Exception $ex) {
            return redirect('/edit/user')->with('fail', $ex->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'Usuario Deletado com Sucesso');
        } catch (\Exception $ex) {
            return redirect('/users')->with('fail', $ex->getMessage());
        }
    }
}
