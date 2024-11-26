<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/dbestilos.css') }}" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="usuario-AC-principal">
      <div class="div">
        <div class="frame">
          
          <div class="overlap-group">
            <img class="image" src="{{ asset('img/LOGO.png') }}" />
            <div class="heading">Universidad Politécnica <br />De Querétaro</div>
          </div>
          <!-- Incluye el menú desplegable de configuraciones de tu navegación -->
          <div class="heading-2"><div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="blogin">
                        <div>{{ Auth::user()->name }}</div>
          
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
          
                <x-slot name="content" clas="contenido2">
                    <x-dropdown-link :href="route('profile.edit')" class="perfil">
                        {{ __('Profile') }}
                    </x-dropdown-link>
          
                    <!-- Autenticación -->
                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();" class="login1">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
          </div>
        </div>
          <div class="text-wrapper-2">
              --Estante
            <div class="linea">.<div class="linea2">.</div></div>
          </div>
        </div>
        <div class="overlap-2">
          <div class="element-input-field"></div>
          <div class="frame-2"></div>
          <div class="frameiconos">
            <div class="grid-container">
              <div class="menu-item">
                <img src="{{ asset('img/iconosdashboard/ajustes-de-engranajes.png') }}" alt="Generales" class="menu-image">
                <span class="label">Estante</span>
                
              </div>
              <h1>proximamente estante</h1>
            
              
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
