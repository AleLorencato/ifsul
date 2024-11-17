<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarroCollection;
use App\Http\Resources\CarroResource;
use App\Models\Carro;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreCarroRequest;
use App\Http\Requests\UpdateCarroRequest;
use Exception;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CarroCollection(Carro::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarroRequest $request)
    {
        if ($request->validated()) {
            $carro = Carro::create($request->all());
            return new CarroResource($carro);
        } else {
            return response()->json(['error' => 'Erro na Validacao'], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Carro $carro)
    {
        return new CarroResource($carro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarroRequest $request, Carro $carro)
    {
        if ($carro->update($request->all())) {
            return new CarroResource($carro);
        } else {
            return response()->json(['error' => 'Erro na Validacao'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carro $carro)
    {
        try {
            $carro->delete();
            return response()->json(['success' => 'Carro deletado com sucesso'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao deletar o carro'], 422);
        }
    }
}
