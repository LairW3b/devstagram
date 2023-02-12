<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //  Aquí escribes los campos que va a resibir la base de datos
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Creo la relación donde un usuario puede tener multiples post
    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }

    // Almacenar seguidores
    /* Al salierme de las convecnciones de laravel 
      * debo especificare donde encontrara la información que necesita
     */
    public function followers()
    {
      // Creo relación uno a muchos un User puede tener muchos seguidores
      //* Le indico la tabla 
      //* Agrego las tablas foraneas que sirven de pivote
      //* las tengo que especificar porque me estoy saliendo de las convenciones de laravel
      return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    // Almacenar a los que seguimos
    public function followings() {
      return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // Comprobar si un usuario ya sigue a otro
    public function siguiendo(User $user) {
      return $this->followers->contains($user->id);
    }

}
