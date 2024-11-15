<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('storage/css/css.css') }}" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="usuario-AC-principal">
      <div class="div">
        <div class="frame">
          <div class="overlap">
            <img class="line" src="{{ asset('img/line-1.svg') }}" />
            <img class="img" src="{{ asset('img/line-2.svg') }}" />
          </div>
          <div class="overlap-group">
            <img class="image" src="{{ asset('storage/img/LOGO.png') }}" />
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
                        <x-dropdown-link :href="route('logout')"  onclick="event.preventDefault(); this.closest('form').submit();" class="login1" >
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
          </div>
        </div>
          <div class="text-wrapper-2">
            Administrador
            <div class="linea">.<div class="linea2">.</div></div>
          </div>
        </div>
        <div class="overlap-2">
          <div class="element-input-field"></div>
          <div class="frame-2"></div>
          <div class="frameiconos">
            <div class="grid-container">
              <div class="menu-item" onclick="window.location.href='{{ route('opcgenerales') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/ajustes-de-engranajes.png') }}" alt="Generales" class="menu-image">
                <span class="label">Generales</span>
              </div>
              <div class="menu-item"onclick="window.location.href='{{ route('opcedificios') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/edificio.png') }}" alt="edificios" class="menu-image">
                <span class="label">Edificios</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcestantes') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/estante (1).png') }}" alt="estantes" class="menu-image">
                <span class="label">Estante</span>
              </div>
              <div class="menu-item"onclick="window.location.href='{{ route('opcusuariosp') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/esperar.png') }}" alt="usuariosgdsp" class="menu-image">
                <span class="label">Usuarios Con Solicitudes De Salidas Pendientes</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opctipodebien') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/categorias-de-producto.png') }}" alt="tiposdebien" class="menu-image">
                <span class="label">Tipo de Bien</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcproveedores') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/mensajero.png') }}" alt="proveedores" class="menu-image">
                <span class="label">Proveedores</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcfacturas') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/factura (1).png') }}" alt="facturas" class="menu-image">
                <span class="label">Facturas</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opctiposdeactivos') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/ordenador-personal.png') }}" alt="tiposdeactivos" class="menu-image">
                <span class="label">Tipos de Activos</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcplantas') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/arquitectura.png') }}" alt="plantas" class="menu-image">
                <span class="label">Plantas</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opccharolas') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/estante (1).png') }}" alt="charolas" class="menu-image">
                <span class="label">Charolas</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcentradasysalidas') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/arriba-y-abajo.png') }}" alt="entradaysalida" class="menu-image">
                <span class="label">Entradas y Salidas</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcbienes') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/bienes (1).png') }}" alt="bienes" class="menu-image">
                <span class="label">Bienes</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcespacios') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/espacio-de-trabajo.png') }}" alt="espacios" class="menu-image">
                <span class="label">Espacios</span>
              </div>
              <div class="menu-item"onclick="window.location.href='{{ route('opcmateriales') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/papeleria.png') }}" alt="materiales" class="menu-image">
                <span class="label">Materiales</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcreporte') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/ajustes-de-engranajes.png') }}" alt="reporte" class="menu-image">
                <span class="label">Reporte</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opceditarbienespt') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/maquina-de-escribir.png') }}" alt="editarbienesportipo" class="menu-image">
                <span class="label">Editar Bienes Por Tipo</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcubicaciones') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/ubicaciones.png') }}" alt="ubicaciones" class="menu-image">
                <span class="label">Ubicaciones</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcunidades') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/paquete-de-pila.png') }}" alt="unidades" class="menu-image">
                <span class="label">Unidades</span>
              </div>
              <div class="menu-item" onclick="window.location.href='{{ route('opcbienesporu') }}'">
                <img src="{{ asset('storage/img/iconosdashboard/ubicacion (1).png') }}" alt="bienesporunidad" class="menu-image">
                <span class="label">Bienes Por Unidades</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
