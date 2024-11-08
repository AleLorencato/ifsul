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

    public function show($id)
    {
        return view(
            'listarcarros',
            [
                'carros' => $this->carro->find($id),
                'motos' => $this->moto->find($id),
                'users' => $this->user->find($id)
            ]
        );
    }

    public function create(Request $request)
    {
        $this->carro->create($request->all());
        return redirect('carros');
    }

    public function edit($id)
    {
        $data = [
            'carro' => $this->carro->find($id),
        ];
        return view('editarcarros', $data);
    }

    public function update(Request $request, $id)
    {
        $result = $this->carro->find($id);
        $result->fill($request->all());
        $result->save();
        return redirect('carros');
    }
    public function destroy($id)
    {
        if (Carro::find($id)->delete()) {
            return redirect('carros');
        } else
            dd($id);
    }

}
