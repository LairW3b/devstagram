<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
      return view('auth.login');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
       'email' => 'required|email',
       'password' => 'required'
      ]);

      // Comprobar si las credenciales son correctas
      //me de vuelve false si las credenciales son incorrectas
      //Coloca el mensaje en lo que se conoce como una sesión
      if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
        return back()->with('mensaje', 'Credenciales Incorrectas');
      }
      // Ejercicio=> Cambiar password: introducir el pasword actual para poder validar he ingresar el nuevo
      // Primero se corre la validacion y luego se reescribe el password
      
      return redirect()->route('posts.index', auth()->user()->username);

    }

    
}
