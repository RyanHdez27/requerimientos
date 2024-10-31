@extends('layouts.app')

@section('page-title', 'Lista de Empleados')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-secondary">Empleados</h2>
    <a href="{{ route('empleados.create') }}" class="btn btn-success">Crear Nuevo Empleado</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Salario</th>
                <th>Fecha de Contratación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($empleados as $empleado)
                <tr>
                    <td class="text-center">{{ $empleado->idEmpleado }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->fechaNacimiento }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>${{ number_format($empleado->salario, 2) }}</td>
                    <td>{{ $empleado->fechaContratacion }}</td>
                    <td class="text-center">
                        <a href="{{ route('empleados.edit', $empleado->idEmpleado) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->idEmpleado) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No hay empleados registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
