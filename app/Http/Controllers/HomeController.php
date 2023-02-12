<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  // protegiendo el inicio
  public function __construct()
  {
    $this->middleware('auth');
  }

    // El método invoke automaticamente se manda a llamar
    public function __invoke()
    {
      // Obtener a  quienes seguimos
      // Pluck me permite seleccionar los campos que necesito 
      // toArray: los convierte en un array
      $ids = auth()->user()->followings->pluck('id')->toArray();
      /* whereIN busca en el modelo importado de Post */
      $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

      return view('home', [
        'posts' => $posts
      ]);
    }
}
