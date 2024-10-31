<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoIndex extends Component
{
    public $empleados;

    public function mount()
    {
        $this->empleados = Empleado::all();
    }

    public function render()
    {
        return view('livewire.empleado-index');
    }

    // metodo para eliminar un empleado
    public function eliminarEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        // actualiza la lista de empleados después de eliminar uno
        $this->empleados = Empleado::all();
    }
}
