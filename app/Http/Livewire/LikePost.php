<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
  public $post;
  public $isLike;
  public $likes;

  // Moutn una funcion del ciclo de vida de livewire
  // Es exactamente igual a un constructor en php
  public function mount($post)
  {
    $this->isLike = $post->checkLike(auth()->user());
    $this->likes = $post->likes->count();
  }

  public function like()
  {
    if( $this->post->checklike(auth()->user())){
      $this->post->likes()->where('post_id', $this->post->id)->delete();
      $this->isLike=false;
      $this->likes--;
    }else {
      $this->post->likes()->create([
        'user_id' => auth()->user()->id 
      ]);
      $this->isLike=true;
      $this->likes++;
      // Intentaa agregar livewire a la caja de comentarios
    }
  }

  public function render()
  {
    return view('livewire.like-post');
  }

}
