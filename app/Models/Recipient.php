<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $table = 'recipients';
    protected $fillable = ['nombre', 'apellido', 'document_type', 'document', 'email', 'telefono', 'direccion', 'ciudad', 'departamento', 'codigo_postal'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
