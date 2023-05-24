<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name'
        // otros atributos fillable aquí
    ];

    public $incrementing = true;

    public function client(){
        return $this->belongsTo(Client::class, 'id_client');
       }
}