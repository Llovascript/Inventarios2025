<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- nombre-->
        <div>
            <x-input-label for="name" :value="__('Nombre:')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellido paterno -->
        <div>
            <x-input-label for="lastname1" :value="__('Apellido Paterno:')" />
            <x-text-input id="lastname1" class="block mt-1 w-full" type="text" name="lastname1" :value="old('lastname1')" required autofocus autocomplete="lastname1" />
            <x-input-error :messages="$errors->get('lastname1')" class="mt-2" />
        </div>

        <!-- Apellido materno -->
        <div>
            <x-input-label for="lastname2" :value="__('Apellido Materno:')" />
            <x-text-input id="lastname2" class="block mt-1 w-full" type="text" name="lastname2" :value="old('lastname2')" required autofocus autocomplete="lastname2" />
            <x-input-error :messages="$errors->get('lastname2')" class="mt-2" />
        </div>

        <!-- Código empleado -->
        <div>
            <x-input-label for="employee_number" :value="__('Código empleado:')" />
            <x-text-input id="employee_number" class="block mt-1 w-full" type="text" name="employee_number" :value="old('employee_number')" required autofocus autocomplete="employee_number" />
            <x-input-error :messages="$errors->get('employee_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo:')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña:')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Seleccionar Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Rol')" />
            <select id="rol" name="rol" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Seleccionar Rol</option>
                <option value="Administrador">Administrador</option>

            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Seleccionar Cargo -->
        <div class="mt-4">
            <x-input-label for="cargo" :value="__('Cargo')" />
            <select id="cargo" name="cargo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Seleccionar Cargo</option>
                <option value="Laboratorio A">Laboratorio A</option>
            </select>
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
