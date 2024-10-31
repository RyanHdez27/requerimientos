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
        'user_id',
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
