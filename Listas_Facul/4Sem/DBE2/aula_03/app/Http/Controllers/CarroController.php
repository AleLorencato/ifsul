<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carro;
use App\Models\moto;
use App\Models\User;

class CarroController extends Controller
{

    protected $carro;

    protected $moto;

    protected $user;

    public function __construct(Carro $carro, User $user, Moto $moto)
    {
        $this->carro = $carro;
        $this->user = $user;
        $this->moto = $moto;
    }

    public function index()
    {
        return view(
            'listarcarros',
            [
                'carros' => $this->carro->all(),
                'motos' => $this->moto->all(),
                'users' => $this->user->all()
            ]
        );
    }
}
