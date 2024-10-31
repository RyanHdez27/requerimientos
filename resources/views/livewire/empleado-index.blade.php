<div>
    <div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Empleados</h1>
            <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Nuevo Empleado</a>
        </div>
    
        <!-- Tabla de Empleados -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->idEmpleado }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->fechaNacimiento }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>
                            <button wire:click="eliminarEmpleado({{ $empleado->idEmpleado }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
