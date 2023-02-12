<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // esta es la forma de laravel de proteger la base de datos 
    protected $fillable = [
      'title',
      'descripcion',
      'imagen',
      'user_id'
    ];

    // Relación donde un post teine un usuario
    public function user()
    {
      return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentarios() 
    {
      return $this->hasMany(Comentario::class);//Un post tendra multiples comentarios(creo la relación)
    }

    public function likes()
    {
      return $this->hasMany(Like::class);//Relación de uno a muchos
    }

    // Revisar si ya le dio like 
    public function checkLike(User $user)
    {
      // lo que hago es buscar en la tabla de likes si contiene el mismo user id
      return $this->likes->contains('user_id', $user->id);
    }

}
