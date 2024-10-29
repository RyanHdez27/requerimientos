
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Empleado</h2>

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="documento">Documento:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="salario">Salario:</label>
            <input type="number" step="0.01" name="salario" id="salario" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="fechaContratacion">Fecha de Contratación:</label>
            <input type="date" name="fechaContratacion" id="fechaContratacion" class="form-control" required>
        </div>
<!-- aqui se asigna rol admin -->
        <div class="form-group mb-3">
            <label for="informacionBeneficios">Beneficios:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <!-- falta campo de rol -->

        <button type="submit" class="btn btn-success">Guardar Empleado</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

