<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoCreate extends Component
{
    public $nombre, $apellido, $fechaNacimiento, $email, $telefono, $direccion, $salario, $fechaContratacion, $informacionBeneficios;

    protected $rules = [
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'fechaNacimiento' => 'required|date',
        'email' => 'required|email|unique:empleados',
        'telefono' => 'required|string',
        'direccion' => 'required|string',
        'salario' => 'required|numeric',
        'fechaContratacion' => 'required|date',
        'informacionBeneficios' => 'nullable|string',
    ];

    public function guardarEmpleado()
    {
        $this->validate();
        Empleado::create([
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

        session()->flash('message', 'Empleado creado exitosamente.');
        return redirect()->route('empleados.index');
    }

    public function render()
    {
        return view('livewire.empleado-create');
    }
}
