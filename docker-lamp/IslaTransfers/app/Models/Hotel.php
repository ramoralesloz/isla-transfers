<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends Authenticatable
{
    use HasFactory;

    protected $table = 'tranfer_hotel'; // El nombre correcto de la tabla en la base de datos
    protected $primaryKey = 'id_hotel'; // Definir la clave primaria correcta

    public $timestamps = false; // Desactivar timestamps


    protected $fillable = [
        'id_zona',
        'comision',
        'usuario',
        'password',
    ];

    // Atributos que deben ser ocultos al serializar el modelo
    protected $hidden = [
        'password',
    ];

    // Mutator para cifrar la contraseña al guardar
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    // Desactiva el uso del remember_token
    public $rememberTokenName = null;
    // Definir la relación entre Hotel y Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_hotel', 'id_hotel');
    }

    // Relación con TransferZona usando la clave primaria correcta
    public function zona()
    {
        return $this->belongsTo(TransferZona::class, 'id_zona', 'id_zona');
    }
}
