<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = new User;
        if ($request->has('empresa'))
            $usuarios = $usuarios->where('name', 'Like', '%'.$request->input('nome').'%');
    	return view('users.index',[
    		'usuarios' => $usuarios->paginate(10),
    		'nome' => $request->input('nome'),
    	]);
    }

    public function show(User $usuario)
    {
        return view('users.show',['usuario'=>$usuario]);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect(route('usuarios'));
    }
}
