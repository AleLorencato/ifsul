<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carro extends Model
{
    protected $table = 'carros';
    protected $fillable = ['modelo', 'marca', 'preco', 'ano'];
    public $timestamps = false;
}
