<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{

  // Creo una variable para que lo registre y se asigne
  public $posts;

  //Cuando se crea el componente se manda a llamar a su controlador
  // Le paso la variable al controlador
  // php artisan view:clear: para limpiar las vistas
  public function __construct($posts)
  {
    $this->posts = $posts;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|\Closure|string
  */
  public function render()
  {
    return view('components.listar-post');
  }

}
