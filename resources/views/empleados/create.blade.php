@extends('layouts.app')

@section('page-title', 'Crear Nuevo Empleado')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">Registrar Empleado</h3>
        
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" id="documento" name="documento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea id="direccion" name="direccion" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" id="salario" name="salario" class="form-control" required step="0.01">
            </div>

            <div class="mb-3">
                <label for="fechaContratacion" class="form-label">Fecha de Contratación</label>
                <input type="date" id="fechaContratacion" name="fechaContratacion" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="informacionBeneficios" class="form-label">Información de Beneficios</label>
                <textarea id="informacionBeneficios" name="informacionBeneficios" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select id="rol" name="rol" class="form-select" required>
                    <option value=""></option>
                    <option value="User">Usuario</option>
                    <option value="Admin">Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
