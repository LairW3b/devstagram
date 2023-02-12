<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //User la persona que estamos siguiendo
    public function store(User $user) 
    {
      /** 
       * * 1. $user: usuario que visitamos su muro 
       * * 2. followers(): accedo a la definición del método
       * * 3. attach(): agrega que esta persona lo sigue
      */
      $user->followers()->attach(auth()->user()->id);
      return back();
    }

     public function destroy(User $user) 
    {
      
      $user->followers()->detach(auth()->user()->id);
      return back();
    }

}
