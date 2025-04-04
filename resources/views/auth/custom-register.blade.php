<!-- resources/views/auth/custom-register.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <style>
        :root {
            --primary-color: #f11515;
            --secondary-color: #c8130c;
            --glass-bg: rgba(0, 0, 0, 0.1);
            --text-color: #060678;
            --input-bg: rgb(150, 50, 50);
            --input-focus-bg: rgba(255, 255, 255, 0.625);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            --border: 1px solid rgba(0, 0, 0, 0.3);
        }

        body {
            margin: 0;
            padding: 0;
            min-block-size: 100vh;
            background: url("{{ asset('storage/img/INSTALACIONES.png') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column; /* Cambiamos a columna para separar el título del formulario */
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            color: var(--text-color);
        }

        .register-title {
            color: var(--text-color);
            font-size: 2.5rem;
            margin-block-end: 2rem; /* Espacio entre el título y el formulario */
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            font-weight: 600;
            text-align: center;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.9); /* Fondo blanco con 20% de opacidad */
            backdrop-filter: blur(15px); /* Efecto de desenfoque */
            border-radius: 1.5rem;
            padding: 2.5rem;
            inline-size: 100%;
            max-inline-size: 700px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(6, 6, 120, 0.743);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .register-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .register-header {
            text-align: center;
            margin-block-end: 2rem;
        }

        .register-title {
            color: rgb(255, 255, 255);
            font-size: 2rem;
            margin-block-end: 0.5rem;
            text-shadow: 2px 2px 4px rgba(6, 2, 50, 0.897);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
            margin-block-end: 1.5rem;
        }

        .form-group {
            margin-block-end: 2rem;
            margin-inline-start: 1.5rem; /* Mueve los campos hacia la derecha */
        }

        .form-label {
            display: block;
            color: #060678;
            margin-block-end: 0.5rem;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.793);
        }

         /* Estilos para los campos de entrada y selects */
         .form-input, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #060678; /* Borde azul oscuro */
            border-radius: 0.5rem;
            background: rgba(246, 242, 242, 0.986);
            color: rgb(0, 0, 0);
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-input:focus, .form-select:focus {
            outline: none; /* Elimina el outline predeterminado */
            border-color: #060678; /* Mantén el mismo color del borde */
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 3px rgba(6, 6, 120, 0.3); /* Sombra para resaltar */
        }

        /* Estilos para los placeholders */
        .form-input::placeholder {
            color: rgba(8, 7, 7, 0.7); /* Color gris oscuro */
            font-style: italic; /* Opcional: estilo cursivo */
        }

        .submit-btn {
            width: 100%;
            padding: 1.25rem;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white; /* Texto blanco para el botón */
            border: none;
            border-radius: 0.75rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            font-size: 1rem;
        }

        .submit-btn:hover {
            background: linear-gradient(to right, 
                color-mix(in srgb, var(--primary-color), black 20%), 
                color-mix(in srgb, var(--secondary-color), black 20%)
            );
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .error-message {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            .register-container {
                margin: 1.5rem;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Título fuera del recuadro -->
    <h1 class="register-title">Registro de Nuevo Usuario</h1>

    <!-- Contenedor del formulario -->
    <div class="register-container">
        <form method="POST" action="{{ route('custom.register') }}">
            @csrf

            <div class="form-grid">
                <!-- Columna Izquierda -->
                <div class="form-group">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" class="form-input" id="name" name="name" required placeholder="Ingresa tu nombre">
                    @error('name')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="lastname1">Apellido Paterno</label>
                    <input type="text" class="form-input" id="lastname1" name="lastname1" required placeholder="Ingresa tu apellido paterno">
                    @error('lastname1')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="lastname2">Apellido Materno</label>
                    <input type="text" class="form-input" id="lastname2" name="lastname2" required placeholder="Ingresa tu apellido materno">
                    @error('lastname2')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="codigo">Código</label>
                    <input type="text" class="form-input" id="codigo" name="codigo" required placeholder="Ingresa tu código">
                    @error('codigo')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <!-- Columna Derecha -->
                <div class="form-group">
                    <label class="form-label" for="email">Correo Electrónico</label>
                    <input type="email" class="form-input" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
                    @error('email')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <input type="password" class="form-input" id="password" name="password" required placeholder="Ingresa tu contraseña">
                    @error('password')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password-confirm">Confirmar Contraseña</label>
                    <input type="password" class="form-input" id="password-confirm" name="password_confirmation" required placeholder="Confirma tu contraseña">
                </div>

                <!-- Selectores -->
                <div class="form-group">
                    <label class="form-label" for="id_role">Rol</label>
                    <select class="form-select" id="id_role" name="id_role" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_role')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="id_puesto">Puesto</label>
                    <select class="form-select" id="id_puesto" name="id_puesto" required>
                        @foreach($puestos as $puesto)
                            <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_puesto')<span class="error-message">{{ $message }}</span>@enderror
                </div>

            <button type="submit" class="submit-btn">
                Registrar Usuario
            </button>
        </form>
    </div>
</body>
</html>