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
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --glass-bg: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url("{{ asset('storage/img/INSTALACIONES.png') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-container {
            background: var(--glass-bg);
            backdrop-filter: blur(7px);
            border-radius: 1.5rem;
            padding: 2.5rem;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-title {
            color: white;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            color: white;
            margin-bottom: 0.5rem;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: 2px solid var(--primary-color);
            background: rgba(255, 255, 255, 0.2);
        }

        .form-select {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
        }

        .status-group {
            grid-column: span 2;
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .status-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-radio {
            appearance: none;
            width: 1.2rem;
            height: 1.2rem;
            border: 2px solid white;
            border-radius: 50%;
            cursor: pointer;
        }

        .status-radio:checked {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
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
            }
            
            .status-group {
                grid-column: span 1;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .register-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1 class="register-title">Registro de Nuevo Usuario</h1>
        </div>
        
        <form method="POST" action="{{ route('custom.register') }}">
            @csrf

            <div class="form-grid">
                <!-- Columna Izquierda -->
                <div class="form-group">
                    <label class="form-label" for="name">Nombre</label>
                    <input type="text" class="form-input" id="name" name="name" required>
                    @error('name')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="lastname1">Apellido Paterno</label>
                    <input type="text" class="form-input" id="lastname1" name="lastname1" required>
                    @error('lastname1')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="lastname2">Apellido Materno</label>
                    <input type="text" class="form-input" id="lastname2" name="lastname2" required>
                    @error('lastname2')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="codigo">Código</label>
                    <input type="text" class="form-input" id="codigo" name="codigo" required>
                    @error('codigo')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <!-- Columna Derecha -->
                <div class="form-group">
                    <label class="form-label" for="email">Correo Electrónico</label>
                    <input type="email" class="form-input" id="email" name="email" required>
                    @error('email')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <input type="password" class="form-input" id="password" name="password" required>
                    @error('password')<span class="error-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password-confirm">Confirmar Contraseña</label>
                    <input type="password" class="form-input" id="password-confirm" name="password_confirmation" required>
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