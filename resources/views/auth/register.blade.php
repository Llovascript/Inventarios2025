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
        <div class="mt-4">
            <x-input-label for="employee_number" :value="__('Código empleado:')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" />
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
            <x-input-label for="password" :value="__('Contraseña')" />
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
            <x-input-label for="Rol" :value="__('Rol')" />
            <select id="id_role" name="id_role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Seleccionar Rol</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}">{{$rol->nombre}}</option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('id_role')" class="mt-2" />
        </div>

        <!-- Seleccionar Cargo -->
        <div class="mt-4">
            <x-input-label for="cargo" :value="__('Cargo')" />
            <select id="id_puesto" name="id_puesto" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Seleccionar Cargo</option>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_puesto')" class="mt-2" />
        </div>

        <!-- Seleccionar Cargo -->
        <div class="mt-4">
            <x-input-label for="estatus" :value="__('Estatus')" />
            <select id="estatus" name="estatus" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            <x-input-error :messages="$errors->get('estatus')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
