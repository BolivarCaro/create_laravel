<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table ='cliente';
    protected $fillable = ['nombre','apellido','email','telefono','direccion','ciudad','departamento','codigo_postal','fecha_ingreso','ultimo_ingreso','observaciones'];

    public function envios()
    {
        return $this->hasMany(Envio::class, 'id_cliente');
    }
}
