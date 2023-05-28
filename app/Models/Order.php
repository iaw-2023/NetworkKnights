<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'id_client'
      // otros atributos fillable aquí
    ];

   public function client(){
     return $this->belongsTo(Client::class, 'id_client');
    }
}
