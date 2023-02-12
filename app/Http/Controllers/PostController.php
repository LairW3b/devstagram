<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
      /* este middleware revisa que el usuario este autenticado antes de realizar otra  acción protegiendo la ruta muro*/
      $this->middleware('auth')->except(['show', 'index']); 
    }

    // le paso el modelo que importo y creo la variable 
    public function index(User $user) 
    {
      //  Accedo a los datos
      $posts = Post::where('user_id', $user->id)->latest()->paginate(10);

      // le paso la variable de forma dinamica
      return view('dashboard', [
        'user' => $user,
        'posts' => $posts
      ]);
    }

    public function create()
    {
      return view('posts.create');
    }

    // en el store siempre va a tener el request ya que es lo que se guarda en la base de datos
    public function store(Request $request)
    {
      $this->validate($request,[
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'imagen' => 'required'
      ]);

      /* Post::create([
        'title' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,
        'user_id' => auth()->user()->id
      ]); */

      // Otra forma para crear registros
      /* $post = new Post;
      $post->title = $request->titulo;
      $post->descripcion = $request->descripcion;
      $post->imagen = $request->imagen;
      $post->user_id = auth()->user()->id;
      $post->save();  */
     
      $request->user()->posts()->create([
        'title' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,
        'user_id' => auth()->user()->id
      ]);


      return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
      return view('posts.show', [
        'post' => $post,
        'user' => $user
      ]);
    }

    public function destroy(Post $post)
    {
      /* Aunque tengo el formulario que lo protege en la vista esto me permite protegerlo desde el controlador */
      $this->authorize('delete', $post);
      // borro el post
      $post->delete();

      // Eliminar la imagen
      $imagen_path = public_path('uploads/' . $post->imagen);

      if(File::exists($imagen_path)) {
        // unlink($imagen_path);
         File::delete($imagen_path);
      }

      return redirect()->route('posts.index', auth()->user()->username);
    }

}
