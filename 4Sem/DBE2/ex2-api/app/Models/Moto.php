<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motos';
    protected $fillable = ['modelo', 'marca', 'preco', 'ano'];
    public $timestamps = false;
}
