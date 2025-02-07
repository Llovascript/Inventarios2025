<x-app-layout>

    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Contenido principal -->
        <div class="flex-1 ml-60 p-6" style="background-image: url('{{ asset('img/INSTALACIONES.png') }}'); background-size: cover; background-position: center; min-height: 100vh;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
