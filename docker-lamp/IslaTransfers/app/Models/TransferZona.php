<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferZona extends Model
{
    use HasFactory;

    // Definir el nombre explícito de la tabla
    protected $table = 'transfer_zona';

    // Definir el nombre de la clave primaria
    protected $primaryKey = 'id_zona';

    // La clave primaria no es incremental por defecto, asegúrate de definir esto si es necesario
    public $incrementing = false;

    // Si la clave primaria no es de tipo integer, también define su tipo:
    protected $keyType = 'int';

    // Definir los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'descripcion',
    ];

    // Definir la relación con los hoteles
    public function hoteles()
    {
        return $this->hasMany(Hotel::class, 'id_zona', 'id_zona');
    }
}


