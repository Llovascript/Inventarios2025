<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dbestilos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="//unpkg.com/alpinejs" defer></script>
  <title>Dashboard Administrador</title>
</head>
<body>
  <div class="usuario-AC-principal">
    <!-- Encabezado principal -->
    <header class="div">
      <div class="frame">
        <div class="overlap">
        </div>
        <div class="overlap-group">
          <img class="image" src="{{ asset('img/LOGO.png') }}" alt="Logo Universidad">
          <h1 class="heading">Universidad Politécnica <br>De Querétaro</h1>
        </div>
        <div class="heading-2">
          <div class="hidden sm:flex sm:items-center sm:ms-6">
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
              <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')" class="perfil">
                  {{ __('Profile') }}
                </x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="login1">
                    {{ __('Log Out') }}
                  </x-dropdown-link>
                </form>
              </x-slot>
            </x-dropdown>
          </div>
        </div>
      </div>
      
    </header>

    <!-- Subtítulo -->
    <div class="text-wrapper-2">
      Administrador
      <div class="linea">
        
        <div class="linea2"></div>
      </div>
    </div>

    <!-- Contenido principal de todo el dashboard...-->
    <main class="overlap-2">
      <div class="frameiconos">
        <div class="grid-container">
          <!-- Menú dinámico con rutas y etiquetas -->
          @php
            $menuItems = [
              ['route' => 'opcgenerales', 'img' => 'ajustes-de-engranajes.png', 'label' => 'Generales'],
              ['route' => 'opcedificios', 'img' => 'edificio.png', 'label' => 'Edificios'],
              ['route' => 'opcestantes', 'img' => 'estante (1).png', 'label' => 'Estante'],
              ['route' => 'opcusuariosp', 'img' => 'esperar.png', 'label' => 'Usuarios Con Solicitudes De Salidas Pendientes'],
              ['route' => 'opctipodebien', 'img' => 'categorias-de-producto.png', 'label' => 'Tipo de Bien'],
              ['route' => 'opcproveedores', 'img' => 'mensajero.png', 'label' => 'Proveedores'],
              ['route' => 'opcfacturas', 'img' => 'factura (1).png', 'label' => 'Facturas'],
              ['route' => 'opctiposdeactivos', 'img' => 'ordenador-personal.png', 'label' => 'Tipos de Activos'],
              ['route' => 'opcplantas', 'img' => 'arquitectura.png', 'label' => 'Plantas'],
              ['route' => 'opccharolas', 'img' => 'estante (1).png', 'label' => 'Charolas'],
              ['route' => 'opcentradasysalidas', 'img' => 'arriba-y-abajo.png', 'label' => 'Entradas y Salidas'],
              ['route' => 'opcbienes', 'img' => 'bienes (1).png', 'label' => 'Bienes'],
              ['route' => 'opcespacios', 'img' => 'espacio-de-trabajo.png', 'label' => 'Espacios'],
              ['route' => 'opcmateriales', 'img' => 'papeleria.png', 'label' => 'Materiales'],
              ['route' => 'opcreporte', 'img' => 'ajustes-de-engranajes.png', 'label' => 'Reporte'],
              ['route' => 'opceditarbienespt', 'img' => 'maquina-de-escribir.png', 'label' => 'Editar Bienes Por Tipo'],
              ['route' => 'opcubicaciones', 'img' => 'ubicaciones.png', 'label' => 'Ubicaciones'],
              ['route' => 'opcunidades', 'img' => 'paquete-de-pila.png', 'label' => 'Unidades'],
              ['route' => 'opcbienesporu', 'img' => 'ubicacion (1).png', 'label' => 'Bienes Por Unidades']
            ];
          @endphp

          @foreach ($menuItems as $item)
          <div class="menu-item" onclick="window.location.href='{{ route($item['route']) }}'">
            <img src="{{ asset('img/iconosdashboard/' . $item['img']) }}" alt="{{ $item['label'] }}" class="menu-image">
            <span class="label">{{ $item['label'] }}</span>
          </div>
          @endforeach
        </div>
      </div>
    </main>
  </div>
</body>
</html>
