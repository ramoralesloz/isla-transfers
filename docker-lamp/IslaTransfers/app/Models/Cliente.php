<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambiar Model por Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'transfer_viajeros';

    // Clave primaria personalizada
    protected $primaryKey = 'id_viajero';

    // Desactivar marcas de tiempo
    public $timestamps = false;

    // Atributos asignables en masa
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'direccion',
        'codigoPostal',
        'ciudad',
        'pais',
        'email',
        'password',
    ];

    // Atributos ocultos
    protected $hidden = [
        'password',
        'remember_token', // Para usar el sistema "Remember Me"
    ];
}
