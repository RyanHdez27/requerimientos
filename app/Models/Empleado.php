<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEmpleado';

    /**
     * 
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'fechaNacimiento',
        'email',
        'telefono',
        'direccion',
        'salario',
        'fechaContratacion',
        'informacionBeneficios',
        'user_id',

    ];

    /**
     * 
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
