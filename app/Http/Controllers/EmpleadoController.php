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
            'rol' => 'nullable|string|in:Usuario,Admin', // Asigna el rol 
        ]);

        // Crea el usuario automático
        $user = User::create([
            'name' => $data['nombre'] . ' ' . $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['documento']), // documento es la contraseña
        ]);

        // Asigna el rol de Usuario o Admin
        $role = $request->input('rol', 'Usuario'); // Si no se especificael rol se asigna "Usuario"
        $user->assignRole($role);

        // Crea el empleado con un id
        $data['user_id'] = $user->id;
        Empleado::create($data);

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
            'documento' => 'required|string|unique:empleados,documento,' . $empleado->idEmpleado,
            'fechaNacimiento' => 'required|date',
            'email' => 'required|email|unique:empleados,email,' . $empleado->idEmpleado,
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'salario' => 'required|numeric',
            'fechaContratacion' => 'required|date',
            'informacionBeneficios' => 'nullable|string',
        ]);

        // Actualizar el empleado
        $empleado->update($data);

        // Actualizar el usuario relacionado
        $user = $empleado->user;
        if ($user) {
            $user->update([
                'name' => $data['nombre'] . ' ' . $data['apellido'],
                'email' => $data['email'],
                'password' => Hash::make($data['documento']), // Actualiza la contraseña si cambió el documento
            ]);
        }

        return redirect()->route('empleados.index')->with('success', 'Empleado y usuario actualizados exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        // Elimina el usuario relacionado
        $user = $empleado->user;
        if ($user) {
            $user->delete();
        }

        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
