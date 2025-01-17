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

    public function index()
    {
        return view(
            'listarmotos',
            [
                'motos' => $this->moto->all(),
            ]
        );
    }

    public function show($id)
    {
        return view(
            'listarmoto',
            [
                'moto' => $this->moto->findOrFail($id),
            ]
        );
    }

    public function create(Request $request)
    {
        $this->moto->create($request->all());
        return redirect('motos');
    }

    public function edit($id)
    {
        $data = [
            'moto' => $this->moto->findOrFail($id),
        ];
        return view('editarmotos', $data);
    }

    public function update(Request $request, $id)
    {
        $moto = $this->moto->findOrFail($id);
        $moto->fill($request->all());
        $moto->save();
        return redirect('motos');
    }

    public function destroy($id)
    {
        if (Moto::findOrFail($id)->delete()) {
            return redirect('motos');
        } else {
            dd($id);
        }
    }
}