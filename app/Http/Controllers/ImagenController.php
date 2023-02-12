<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
      // $input = $request->all();
      $imagen = $request->file('file');

      // Genero ids unicos para cada imagen
      $nombreImagen = Str::uuid() . "." . $imagen->extension();

      //Creo una imagen 
      $imagenServidor = Image::make($imagen);
      $imagenServidor->fit(1000, 1000);
      // Puedes buscar en la api de intervetion image para aplicar efectos disponibles 

      // Mover la imagen al servidor
      // dirección de la imagen
      $imagenPath = public_path('uploads') . '/' . $nombreImagen;
      $imagenServidor->save($imagenPath);

      return response()->json(['imagen' => $nombreImagen ]);
    }
}


