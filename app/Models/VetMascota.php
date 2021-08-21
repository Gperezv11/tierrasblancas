<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetMascota extends Model
{
    use HasFactory;

    public function dueno() {
        return $this->belongsTo(VetCliente::class, 'vet_clientes_id');
      }
}
