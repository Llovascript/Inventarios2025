<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/topbar.js', 'resources/js/sidebar.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        <h1 class="h2">Listado de Proveedores</h1>
                        <button id="btnAgregarProveedor" class="btn btn-primary btn-sm">
                            + Nuevo Proveedor
                        </button>
                    </div>

                    <!-- Tabla de Proveedores -->
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>RFC</th>
                                        <th>Razón Social</th>
                                        <th>Teléfonos</th>
                                        <th>Correo</th>
                                        <th>Estatus</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->apellido_pat }} {{ $proveedor->apellido_mat }}</td>
                                        <td>{{ $proveedor->RFC }}</td>
                                        <td>{{ $proveedor->razon_social }}</td>
                                        <td>
                                            Oficina: {{ $proveedor->tel_oficina }}<br>
                                            Personal: {{ $proveedor->tel_personal }}
                                        </td>
                                        <td>{{ $proveedor->correo }}</td>
                                        <td><span class="badge bg-{{ $proveedor->estatus == 'activo' ? 'success' : 'danger' }}">{{ ucfirst($proveedor->estatus) }}</span></td>
                                        <td>{{ $proveedor->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $proveedor->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-icon btn-outline-warning edit-btn"
                                                        data-id="{{ $proveedor->id }}"
                                                        data-estatus="{{ $proveedor->estatus }}">
                                                    <span class="material-icons">edit</span>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-outline-danger delete-btn"
                                                        data-id="{{ $proveedor->id }}"
                                                        data-nombre="{{ $proveedor->nombre }}">
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
                            {{ $proveedores->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Agregar Proveedor -->
    <div class="modal fade" id="modalAgregarProveedor" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalLabel">Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('proveedores.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellido_pat" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellido_mat">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">RFC</label>
                                    <input type="text" class="form-control" name="RFC" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Razón Social</label>
                                    <input type="text" class="form-control" name="razon_social" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Estatus</label>
                                    <select class="form-select" name="estatus" required>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono Oficina</label>
                                    <input type="tel" class="form-control" name="tel_oficina" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teléfono Personal</label>
                                    <input type="tel" class="form-control" name="tel_personal" required>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="correo" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Estatus -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Cambiar Estatus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nuevo Estatus</label>
                            <select class="form-select" name="estatus" id="editEstatus" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>¿Estás seguro de eliminar a <strong id="deleteNombre"></strong>?</p>
                        <p class="text-danger"><small>Esta acción no se puede deshacer</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Script para editar
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const estatus = this.dataset.estatus;

            const selectEstatus = document.getElementById('editEstatus');
            selectEstatus.value = estatus;
            document.getElementById('editForm').action = `/proveedores/${id}`;
            
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });

    // Script para eliminar (similar a ubicaciones)
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;
            
            document.getElementById('deleteNombre').textContent = nombre;
            document.getElementById('deleteForm').action = `/proveedores/${id}`;
            
            new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
        });
    });

    // Abrir modal de agregar
    document.getElementById('btnAgregarProveedor').addEventListener('click', () => {
    new bootstrap.Modal(document.getElementById('modalAgregarProveedor')).show();
    });
    </script>
</body>
</html>