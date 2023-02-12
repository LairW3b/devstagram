<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');//Protejo la ruta
  }
  
  public function index()
  {
    return view('perfil.index');
  }

  public function store(Request $request)
  {
    //Slug??
    $request->request->add(['username' => Str::slug($request->username)]);

    $this->validate($request, [
      'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'],
      //cuando son más de tres reglas de validación laravel recomienda colocarlas en un arreglo.
    ]);

    if($request->imagen) {

      $imagen = $request->file('imagen');

      // Genero ids unicos para cada imagen
      $nombreImagen = Str::uuid() . "." . $imagen->extension();

      //Creo una imagen 
      $imagenServidor = Image::make($imagen);
      $imagenServidor->fit(1000, 1000);
      // Puedes buscar en la api de intervetion image para aplicar efectos disponibles 

      // Mover la imagen al servidor
      // dirección de la imagen
      $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
      $imagenServidor->save($imagenPath);

    } 

    // Guardar cambios
    $usuario = User::find(auth()->user()->id);
    $usuario->username = $request->username;
    $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
    // Para guardar en la base de datos
    $usuario->save();

    // Redirect
    return redirect()->route('posts.index', $usuario->username); 
    // Ejercicio=>cambiar el email.
       
  }
}
