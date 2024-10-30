<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class moto extends Model
{
    protected $table = 'motos';
    protected $fillable = ['modelo', 'marca', 'preco', 'ano'];
    public $timestamps = false;
}
