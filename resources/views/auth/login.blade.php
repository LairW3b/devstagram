@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="
        md:flex 
        md:justify-center 
        md:gap-10 
        md:items-center
      ">
        <div class="md:w-6/12">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen login de usuario">
            {{-- <img src="../../img/registrar.jpg" alt=""> --}}
        </div>


        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}" >
                {{-- Previene ataques tipo CSRF --}}
                @csrf

                @if (session('mensaje'))
                   <p
                      class="
                      bg-red-500 
                      text-white
                        my-2
                        rounded-lg
                        text-sm
                        p-2
                        text-center
                      ">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                      id="email" 
                      name="email" 
                      type="email" 
                      placeholder="Tu Email de registro"
                      class="border p-3 w-full rounded-lg 
                        @error('email') 
                         border-red-500 
                        @enderror
                      "
                      value={{old('email')}}
                    >
                </div>
                @error('email')
                    <p
                      class="
                      bg-red-500 
                      text-white
                        my-2
                        rounded-lg
                        text-sm
                        p-2
                        text-center
                      ">
                        {{ $message }}
                    </p>
                @enderror
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                      id="password" 
                      name="password" 
                      type="password" 
                      placeholder="Contraseña de registro"
                      class="border p-3 w-full rounded-lg 
                        @error('password') 
                          border-red-500 
                        @enderror
                      ">
                </div>
                @error('password')
                  <p
                    class="
                    bg-red-500 
                    text-white
                    my-2
                    rounded-lg
                    text-sm
                    p-2
                    text-center
                  ">
                    {{ $message }}
                  </p>
                @enderror

                <div class="mb-5">
                  <input type="checkbox" name="remmember"> <label class="text-gray-500 text-sm" for="">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión "
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection