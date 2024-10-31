<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoEdit extends Component
{
    public $empleadoId;
    public $nombre, $apellido, $fechaNacimiento, $email, $telefono, $direccion, $salario, $fechaContratacion, $informacionBeneficios;

    protected $rules = [
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'fechaNacimiento' => 'required|date',
        'email' => 'required|email|unique:empleados,email',
        'telefono' => 'required|string',
        'direccion' => 'required|string',
        'salario' => 'required|numeric',
        'fechaContratacion' => 'required|date',
        'informacionBeneficios' => 'nullable|string',
    ];

    public function mount($id)
    {
        // Cargar los datos del empleado en los atributos del componente
        $empleado = Empleado::findOrFail($id);
        $this->empleadoId = $empleado->idEmpleado;
        $this->nombre = $empleado->nombre;
        $this->apellido = $empleado->apellido;
        $this->fechaNacimiento = $empleado->fechaNacimiento;
        $this->email = $empleado->email;
        $this->telefono = $empleado->telefono;
        $this->direccion = $empleado->direccion;
        $this->salario = $empleado->salario;
        $this->fechaContratacion = $empleado->fechaContratacion;
        $this->informacionBeneficios = $empleado->informacionBeneficios;
    }

    public function actualizarEmpleado()
    {
        // Validar datos y actualizar el registro
        $this->validate();

        $empleado = Empleado::findOrFail($this->empleadoId);
        $empleado->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fechaNacimiento' => $this->fechaNacimiento,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'salario' => $this->salario,
            'fechaContratacion' => $this->fechaContratacion,
            'informacionBeneficios' => $this->informacionBeneficios,
        ]);

        session()->flash('message', 'Empleado actualizado exitosamente.');
        return redirect()->route('empleados.index');
    }

    public function render()
    {
        return view('livewire.empleado-edit');
    }
}
