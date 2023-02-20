<nav>
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        {{--  <button 
          type="button"
          class="
            inline-flex 
            items-center 
            justify-center 
            rounded-md p-2 
            text-gray-400 
            hover:bg-gray-700 
            hover:text-white 
            focus:outline-none 
            focus:ring-2 focus:ring-inset 
            focus:ring-white
          "
          x-on:click="open=true"
          aria-controls="mobile-menu" 
          aria-expanded="false">
        </button> --}}
      </div>
      <div class="flex flex-1 items-center  sm:items-stretch sm:justify-start">
        <div class="flex ">
          <a href="{{ route('home') }}" class="text-3xl font-black">
            DevStagram
          </a>
        </div>
      </div>
      @auth

        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          {{-- Activar notificaciones cunado tu publicación sea comentada o reciba un like --}}
          {{-- <button type="button"
          class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">View notifications</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
            </button> --}}
          {{-- button create --}}
          <a href="{{ route('posts.create') }}"
            class="
            flex 
            items-center
            gap-2
            bg-white
            border
            p-2
            text-gray-600
            rounded
            text-sm
            uppercase
            font-bold
            cursor-pointer
          "
            role="menuitem" tabindex="-1" id="user-menu-item-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
            </svg>
            <div class="hidden sm:block md:block">
              Crear
            </div>
          </a>
          <!-- Profile dropdown -->
          <div class="relative ml-3" x-data="{ open: false }">
            <div>
              <button x-on:click="open=true" type="button"
                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                {{-- <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}"
                  alt="imagen del usuario" /> --}}
                <img class="h-8 w-8 rounded-full"
                  src="{{  asset('img/usuario.svg') }}"
                  alt="" x-on:click="open=true"
                />
              </button>
            </div>

            <div
              class="
                absolute 
                right-0 
                z-10 
                mt-2 
                w-48
                origin-top-right 
                rounded-md 
                bg-white 
                py-1 
                shadow-lg 
                ring-1 
                ring-black 
                ring-opacity-5 
                focus:outline-none
              "
              x-show="open" x-on:click.away="open=false" role="menu" aria-orientation="vertical"
              aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="{{ route('posts.index', auth()->user()->username) }}"
                class="font-bold px-4 py-2 text-sm text-gray-600" role="menuitem" tabindex="-1" id="user-menu-item-0">
                Hola:
                <span class="font-normal">
                  {{ auth()->user()->username }}
                </span>
              </a>
              <form method="POST" action={{ route('logout') }} class="block px-4 py-2 text-sm text-gray-700"
                role="menuitem" tabindex="-1">
                @csrf
                <button type="submit" href="{{ route('logout') }}" class="font-bold uppercase text-gray-600 text-sm">
                  Cerrar Sesión
                </button>
              </form>
            </div>
          </div>
        </div>
      @endauth

      @guest
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:hidden sm:inset-auto sm:ml-6 sm:pr-0"
          x-data="{ open: false }">
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button x-on:click="open=true" type="button" class="flex  text-sm " id="user-menu-button"
                aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

              </button>
            </div>

            <div
              class="
                absolute 
                right-0 
                z-10 
                mt-2 
                w-48
                origin-top-right 
                rounded-md 
                bg-white 
                py-1 
                shadow-lg 
                ring-1 
                ring-black 
                ring-opacity-5 
                focus:outline-none
              "
              x-show="open" x-on:click.away="open=false" role="menu" aria-orientation="vertical"
              aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="{{ route('login') }}" class="font-bold px-4 py-2 text-sm text-gray-600 uppercase" role="menuitem"
                tabindex="-1" id="user-menu-item-0">
                Login
              </a>
              <form method="POST" action={{ route('logout') }} class="block px-4 py-2 text-sm text-gray-700"
                role="menuitem" tabindex="-1">
                @csrf
                <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">
                  Crear Cuenta
                </a>
              </form>
            </div>
          </div>
        </div>
        <nav class="hidden sm:block">
          <a href="{{ route('login') }}" class="font-bold m-2 uppercase text-gray-600 text-sm">
            Login
          </a>
          <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
        </nav>

      @endguest
    </div>
  </div>

</nav>
