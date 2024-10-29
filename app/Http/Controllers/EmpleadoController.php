<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'documento' => 'required|string|unique:empleados', 
            'fechaNacimiento' => 'required|date',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'salario' => 'required|numeric',
            'fechaContratacion' => 'required|date',
            'informacionBeneficios' => 'nullable|string',
            'rol' => 'nullable|string|in:Usuario,Admin', // asigna el rol
        ]);
    
        $empleado = Empleado::create($data);
    
        // crea usuario automaticamente con las credenciales
        $user = User::create([
            'name' => $data['nombre'] . ' ' . $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['documento']), // documento es el password
        ]);
    
        // asigna el rol dependiendo del campo 
        $role = $request->input('rol', 'Usuario'); // se asigna el rol de usuario automatico si no se coloca manual
        $user->assignRole($role);
    
        return redirect()->route('empleados.index')->with('success', 'Empleado y usuario creados exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'documento' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'email' => 'required|email|unique:empleados,email,' . $empleado->idEmpleado,
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'salario' => 'required|numeric',
            'fechaContratacion' => 'required|date',
            'informacionBeneficios' => 'nullable|string',
        ]);

        $empleado->update($data);
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
    // Obtener y eliminar el usuario relacionado
    $user = User::where('email', $empleado->email)->first();
    if ($user) {
        $user->delete();
    }

    $empleado->delete();
    return redirect()->route('empleados.index');
    }
}
