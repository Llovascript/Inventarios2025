<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicaciones</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/topbar.js', 'resources/js/sidebar.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/storage/img/INSTALACIONES.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        .content-wrapper {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 140px;
        }
        .filter-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .table-container {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .action-buttons {
            gap: 10px;
        }
        .btn-icon {
            border: none;
            background: transparent !important;
            padding: 4px;
            transition: all 0.3s ease;
        }
        .btn-icon .material-icons {
            font-size: 23px;
            vertical-align: middle;
        }

        .btn-outline-warning .material-icons { color: #0db0d0; }
        .btn-outline-danger .material-icons { color: #dc3545; }

        /* Transición base para todos los iconos */
.btn-icon .material-icons {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-outline-warning:hover .material-icons {
    color: #044d8d !important;
    transform: scale(1.2);
}

.btn-outline-danger:hover .material-icons {
    color: #910202 !important;
    transform: scale(1.2);
}

        /* Quitar estilos por defecto de Bootstrap */
        .btn-outline-info:hover,
        .btn-outline-warning:hover,
        .btn-outline-danger:hover {
            background: transparent !important;
            border-color: transparent !important;
        }
        .modal-content { margin-top: 100px; }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
        }
        .modal-title {
            font-size: 1.25rem;
            font-weight: 500;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }
    </style>
</head>
<body>
    <x-sidebar />
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <x-topbar />

                <div class="content-wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h2">Listado de Ubicaciones</h1>
                        <button id="btnAgregarUbicacion" class="btn btn-primary btn-sm">
                            <span class="material-icons"></span>+ Nueva Ubicación
                        </button>
                    </div>

                    <!-- Filtrado por Edificio -->
                    <div class="filter-section">
                        <h5 class="mb-3">Filtrar por Edificio</h5>
                        <select class="form-select form-select-sm" id="filtroEdificio" name="edificio">
                            <option value="todos" {{ request('edificio') == 'todos' ? 'selected' : '' }}>Todos los edificios</option>
                            @foreach($edificios as $edificio)
                            <option value="{{ $edificio->id }}" {{ request('edificio') == $edificio->id ? 'selected' : '' }}>
                                {{ $edificio->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tabla de Ubicaciones -->
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>N°</th>
                                        <th>Descripción</th>
                                        <th>Edificio</th>
                                        <th>Planta</th>
                                        <th>Área</th>
                                        <th>Fecha Creación</th>
                                        <th>Última Actualización</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ubicaciones as $ubicacion)
                                    <tr data-edificio="{{ $ubicacion->edificio->id ?? '' }}">
                                        <td>{{ ($ubicaciones->currentPage() - 1) * $ubicaciones->perPage() + $loop->iteration }}</td>
                                        <td>{{ $ubicacion->descripcion }}</td>
                                        <td>{{ $ubicacion->edificio->nombre ?? 'N/A' }}</td>
                                        <td>{{ $ubicacion->planta->nombre ?? 'N/A' }}</td>
                                        <td>{{ $ubicacion->area->nombre ?? 'N/A' }}</td>
                                        <td>{{ $ubicacion->fecha_creacion->format('d/m/Y H:i') }}</td>
                                        <td>{{ $ubicacion->ultima_actualizacion->format('d/m/Y H:i') }}</td>
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-icon btn-outline-warning edit-btn" 
                                                        data-id="{{ $ubicacion->id }}"
                                                        data-descripcion="{{ $ubicacion->descripcion }}"
                                                        data-edificio="{{ $ubicacion->id_edificio }}"
                                                        data-planta="{{ $ubicacion->id_planta }}"
                                                        data-area="{{ $ubicacion->id_area }}">
                                                    <span class="material-icons">edit</span>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-outline-danger delete-btn" 
                                                    data-id="{{ $ubicacion->id }}"
                                                    data-descripcion="{{ $ubicacion->descripcion }}">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $ubicaciones->appends(['edificio' => request('edificio')])->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<!-- Modal Agregar Ubicación -->
<div class="modal fade" id="modalAgregarUbicacion" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Nueva Ubicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ubicaciones.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Edificio</label>
                        <select class="form-select" name="id_edificio" required>
                            <option value="">Seleccionar Edificio</option>
                            @foreach($edificios as $edificio)
                            <option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Planta</label>
                        <select class="form-select" name="id_planta" required>
                            <option value="">Seleccionar Planta</option>
                            @foreach($plantas as $planta)
                            <option value="{{ $planta->id }}">{{ $planta->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Área</label>
                        <select class="form-select" name="id_area" required>
                            <option value="">Seleccionar Área</option>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirmacion eliminar -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar la ubicación: <strong id="ubicacionNombre"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Editar Ubicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="editDescripcion" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Edificio</label>
                        <select class="form-select" name="id_edificio" id="editEdificio" required>
                            @foreach($edificios as $edificio)
                            <option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Planta</label>
                        <select class="form-select" name="id_planta" id="editPlanta" required>
                            @foreach($plantas as $planta)
                            <option value="{{ $planta->id }}">{{ $planta->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Área</label>
                        <select class="form-select" name="id_area" id="editArea" required>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Activar filtrado
    document.getElementById('filtroEdificio').addEventListener('change', function() {
            const value = this.value;
            const url = new URL(window.location.href);
            
            if (value === 'todos') {
                url.searchParams.delete('edificio');
            } else {
                url.searchParams.set('edificio', value);
            }
            
            window.location.href = url.toString();
        });

    // Botón para abrir modal (usando Bootstrap)
    document.getElementById('btnAgregarUbicacion').addEventListener('click', () => {
        new bootstrap.Modal(document.getElementById('modalAgregarUbicacion')).show();
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const descripcion = this.dataset.descripcion;
            
            document.getElementById('ubicacionNombre').textContent = descripcion;
            document.getElementById('deleteForm').action = `/ubicaciones/${id}`;
            
            new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
        });
    });

    // Edicion de ubicaciones
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const descripcion = this.dataset.descripcion;
            const edificioId = this.dataset.edificio;
            const plantaId = this.dataset.planta;
            const areaId = this.dataset.area;
            
            // Actualizar formulario
            document.getElementById('editDescripcion').value = descripcion;
            document.getElementById('editEdificio').value = edificioId;
            document.getElementById('editPlanta').value = plantaId;
            document.getElementById('editArea').value = areaId;
            document.getElementById('editForm').action = `/ubicaciones/${id}`;
            
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });
</script>
</body>
</html>