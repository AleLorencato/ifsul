<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moto;

class MotoController extends Controller
{
    protected $moto;

    public function __construct(Moto $moto)
    {
        $this->moto = $moto;
    }

}
