<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('idEmpleado');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento')->unique(); 
            $table->date('fechaNacimiento');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->text('direccion');
            $table->decimal('salario', 10, 2);
            $table->date('fechaContratacion');
            $table->text('informacionBeneficios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
