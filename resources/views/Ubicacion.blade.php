<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ubicaciones</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/topbar.js', 'resources/js/sidebar.js'])
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

        .table-container {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar Component -->
    <x-sidebar />

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Topbar Component -->
                <x-topbar />

                <div class="content-wrapper">
                    <!-- Alerts -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- List Section -->
                    <div id="listSection" class="section active">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Listado de Ubicaciones</h2>
                            <button type="button" class="btn btn-primary" onclick="showSection('createSection')">Nueva Ubicación</button>
                        </div>

                        <div class="mb-4">
                            <form id="filterForm" class="row g-3">
                                <div class="col-md-4">
                                    <label for="edificio" class="form-label">Filtrar por Edificio</label>
                                    <select name="edificio" id="edificio" class="form-select">
                                        <option value="">Todos los edificios</option>
                                        @foreach($edificios as $edificio)
                                            <option value="{{ $edificio->id }}" {{ $edificioFilter == $edificio->id ? 'selected' : '' }}>
                                                {{ $edificio->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                                </div>
                            </form>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Edificio</th>
                                            <th>Planta</th>
                                            <th>Área</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ubicaciones as $ubicacion)
                                            <tr>
                                                <td>{{ $ubicacion->id }}</td>
                                                <td>{{ $ubicacion->descripcion }}</td>
                                                <td>{{ $ubicacion->edificio->nombre ?? 'N/A' }}</td>
                                                <td>{{ $ubicacion->planta->nombre ?? 'N/A' }}</td>
                                                <td>{{ $ubicacion->area->nombre ?? 'N/A' }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-info btn-sm" 
                                                                onclick="showDetails({{ $ubicacion->id }})">Ver</button>
                                                        <button type="button" class="btn btn-primary btn-sm" 
                                                                onclick="editUbicacion({{ $ubicacion->id }})">Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm" 
                                                                onclick="deleteUbicacion({{ $ubicacion->id }})">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No hay ubicaciones registradas</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                {{ $ubicaciones->links() }}
                            </div>
                        </div>
                    </div>

                    <!-- Create Section -->
                    <div id="createSection" class="section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Nueva Ubicación</h2>
                            <button type="button" class="btn btn-secondary" onclick="showSection('listSection')">Volver al Listado</button>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="createForm" method="POST" action="{{ route('ubicaciones.store') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="create_descripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                                                       id="create_descripcion" name="descripcion" value="{{ old('descripcion') }}" required>
                                                @error('descripcion')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="create_id_edificio" class="form-label">Edificio</label>
                                                <select class="form-select @error('id_edificio') is-invalid @enderror" 
                                                        id="create_id_edificio" name="id_edificio" required>
                                                    <option value="">Seleccione un edificio</option>
                                                    @foreach($edificios as $edificio)
                                                        <option value="{{ $edificio->id }}" {{ old('id_edificio') == $edificio->id ? 'selected' : '' }}>
                                                            {{ $edificio->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_edificio')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="create_id_planta" class="form-label">Planta</label>
                                                <select class="form-select @error('id_planta') is-invalid @enderror" 
                                                        id="create_id_planta" name="id_planta" required>
                                                    <option value="">Seleccione primero un edificio</option>
                                                    @foreach ($plantas as $planta)
                                                        <option value="{{ $planta->id }}" {{ old('id_planta') == $planta->id ? 'selected' : ''}}>
                                                            {{ $planta->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_planta')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="create_id_area" class="form-label">Área</label>
                                                <select class="form-select @error('id_area') is-invalid @enderror" 
                                                        id="create_id_area" name="id_area" required>
                                                    <option value="">Seleccione primero una planta</option>
                                                    @foreach ($areas as $area)
                                                        <option value="{{ $area->id }}" {{ old('id_area') == $area->id ? 'selected' : ''}}>
                                                            {{ $area->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_area')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary" onclick="showSection('listSection')">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Section -->
                    <div id="editSection" class="section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Editar Ubicación</h2>
                            <button type="button" class="btn btn-secondary" onclick="showSection('listSection')">Volver al Listado</button>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="editForm" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label for="edit_descripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control" id="edit_descripcion" name="descripcion" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="edit_id_edificio" class="form-label">Edificio</label>
                                                <select class="form-select" id="edit_id_edificio" name="id_edificio" required>
                                                    <option value="">Seleccione un edificio</option>
                                                    @foreach($edificios as $edificio)
                                                        <option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="edit_id_planta" class="form-label">Planta</label>
                                                <select class="form-select" id="edit_id_planta" name="id_planta" required>
                                                    <option value="">Seleccione primero un edificio</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="edit_id_area" class="form-label">Área</label>
                                                <select class="form-select" id="edit_id_area" name="id_area" required>
                                                    <option value="">Seleccione primero una planta</option>
                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary" onclick="showSection('listSection')">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Show Section -->
                    <div id="showSection" class="section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Detalles de Ubicación</h2>
                            <button type="button" class="btn btn-secondary" onclick="showSection('listSection')">Volver al Listado</button>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 30%">ID</th>
                                                        <td id="show_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <td id="show_descripcion"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Edificio</th>
                                                        <td id="show_edificio"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Planta</th>
                                                        <td id="show_planta"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Área</th>
                                                        <td id="show_area"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fecha de Creación</th>
                                                        <td id="show_created_at"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Última Actualización</th>
                                                        <td id="show_updated_at"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-primary" id="show_edit_button">Editar</button>
                                            <button type="button" class="btn btn-danger" id="show_delete_button">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro que desea eliminar esta ubicación?
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
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Global variables
        let deleteModal;
        let currentUbicacionId = null;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap modal
            deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            
            // Setup form submissions
            setupFilterForm();
            setupCreateForm();
            setupEditForm();
            
            // Setup dropdown dependencies for create form
            setupDropdownDependencies('create_id_edificio', 'create_id_planta', 'create_id_area');
            
            // Setup dropdown dependencies for edit form
            setupDropdownDependencies('edit_id_edificio', 'edit_id_planta', 'edit_id_area');
        });

        // Section visibility functions
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show the requested section
            document.getElementById(sectionId).classList.add('active');
        }

        // Setup filter form
        function setupFilterForm() {
            const filterForm = document.getElementById('filterForm');
            filterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const edificioId = document.getElementById('edificio').value;
                window.location.href = "{{ route('ubicaciones.index') }}" + (edificioId ? "?edificio=" + edificioId : "");
            });
        }

        // Setup create form
        function setupCreateForm() {
            // The form already submits to the correct route
        }

        // Setup edit form
        function setupEditForm() {
            const editForm = document.getElementById('editForm');
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                fetch(`{{ url('ubicaciones') }}/${currentUbicacionId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        return response.json();
                    }
                })
                .then(data => {
                    if (data && data.errors) {
                        // Handle validation errors
                        console.error(data.errors);
                        alert('Error al actualizar la ubicación. Verifique los datos ingresados.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al actualizar la ubicación.');
                });
            });
        }

        // Setup dropdown dependencies
        function setupDropdownDependencies(edificioSelectId, plantaSelectId, areaSelectId) {
            const edificioSelect = document.getElementById(edificioSelectId);
            const plantaSelect = document.getElementById(plantaSelectId);
            const areaSelect = document.getElementById(areaSelectId);
            
            // Function to load plantas based on selected edificio
            edificioSelect.addEventListener('change', function() {
                const edificioId = this.value;
                
                // Reset the dependent dropdowns
                plantaSelect.innerHTML = '<option value="">Seleccione una planta</option>';
                areaSelect.innerHTML = '<option value="">Seleccione primero una planta</option>';
                
                if (edificioId) {
                    // Fetch plantas for the selected edificio
                    fetch(`/api/plantas-by-edificio?id_edificio=${edificioId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(planta => {
                                const option = document.createElement('option');
                                option.value = planta.id;
                                option.textContent = planta.nombre;
                                plantaSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
            
            // Function to load areas based on selected planta
            plantaSelect.addEventListener('change', function() {
                const plantaId = this.value;
                
                // Reset the area dropdown
                areaSelect.innerHTML = '<option value="">Seleccione un área</option>';
                
                if (plantaId) {
                    // Fetch areas for the selected planta
                    fetch(`/api/areas-by-planta?id_planta=${plantaId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(area => {
                                const option = document.createElement('option');
                                option.value = area.id;
                                option.textContent = area.nombre;
                                areaSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        }

        // Show details of a ubicacion
        function showDetails(id) {
            fetch(`{{ url('ubicaciones') }}/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('show_id').textContent = data.id;
                    document.getElementById('show_descripcion').textContent = data.descripcion;
                    document.getElementById('show_edificio').textContent = data.edificio ? data.edificio.nombre : 'N/A';
                    document.getElementById('show_planta').textContent = data.planta ? data.planta.nombre : 'N/A';
                    document.getElementById('show_area').textContent = data.area ? data.area.nombre : 'N/A';
                    document.getElementById('show_created_at').textContent = formatDate(data.created_at);
                    document.getElementById('show_updated_at').textContent = formatDate(data.updated_at);
                    
                    // Setup buttons
                    document.getElementById('show_edit_button').onclick = () => editUbicacion(id);
                    document.getElementById('show_delete_button').onclick = () => deleteUbicacion(id);
                    
                    // Show the details section
                    showSection('showSection');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar los detalles de la ubicación.');
                });
        }

        // Edit a ubicacion
        function editUbicacion(id) {
            currentUbicacionId = id;
            
            fetch(`{{ url('ubicaciones') }}/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    // Set form action
                    document.getElementById('editForm').action = `{{ url('ubicaciones') }}/${id}`;
                    
                    // Fill form fields
                    document.getElementById('edit_descripcion').value = data.ubicacion.descripcion;
                    
                    // Set edificio and trigger change to load plantas
                    const edificioSelect = document.getElementById('edit_id_edificio');
                    edificioSelect.value = data.ubicacion.id_edificio;
                    
                    // Store current values for restoration
                    const currentPlantaId = data.ubicacion.id_planta;
                    const currentAreaId = data.ubicacion.id_area;
                    
                    // Trigger edificio change to load plantas
                    const edificioEvent = new Event('change');
                    edificioSelect.dispatchEvent(edificioEvent);
                    
                    // Set planta after plantas are loaded
                    setTimeout(() => {
                        const plantaSelect = document.getElementById('edit_id_planta');
                        plantaSelect.value = currentPlantaId;
                        
                        // Trigger planta change to load areas
                        const plantaEvent = new Event('change');
                        plantaSelect.dispatchEvent(plantaEvent);
                        
                        // Set area after areas are loaded
                        setTimeout(() => {
                            document.getElementById('edit_id_area').value = currentAreaId;
                        }, 500);
                    }, 500);
                    
                    // Show the edit section
                    showSection('editSection');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar los datos para editar la ubicación.');
                });
        }

        // Delete a ubicacion
        function deleteUbicacion(id) {
            currentUbicacionId = id;
            document.getElementById('deleteForm').action = `{{ url('ubicaciones') }}/${id}`;
            deleteModal.show();
        }

        // Format date helper
        function formatDate(dateString) {
            if (!dateString) return 'N/A';
            const date = new Date(dateString);
            return date.toLocaleString('es-ES');
        }
    </script>
</body>
</html>

