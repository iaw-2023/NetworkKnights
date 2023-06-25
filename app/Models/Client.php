<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'id',
        'email',
        'name',
        'surname',
        'address',
        'password'
    ];

    public $incrementing = true;

    public function client(){
        return $this->belongsTo(Client::class, 'id_client');
       }
}