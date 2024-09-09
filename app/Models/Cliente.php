<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table ='clientes';
    protected $fillable = ['nombre','apellido','document_type', 'document', 'email','telefono','direccion','ciudad','departamento','codigo_postal','fecha_recoleccion','hora_recogida','observaciones'];

    public function recipients()
    {
        return $this->hasMany(Recipient::class, 'id_cliente');
    }
}
