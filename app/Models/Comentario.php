<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    // tengo que guardar en el fillable lo que voy a recibir
    protected $fillable = [
      'user_id',
      'post_id',
      'comentario'
    ];

    // Creo una relacion
    public function user() 
    {
      return $this->belongsTo(User::class);//Un comentario tiene un user
    }
}

