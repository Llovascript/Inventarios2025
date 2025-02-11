@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/topbar.css', 'resources/js/topbar.js', 'resources/css/sidebar.css', 'resources/js/sidebar.js'])
<div class="flex min-h-screen">
    <x-sidebar />
    
    <div class="flex-1 relative">
        <x-topbar />
        
        <!-- Contenido principal -->
        <div class="main-content">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- espacio para agregar algun contenido extra -->
            </div>
        </div>
    </div>
</div>