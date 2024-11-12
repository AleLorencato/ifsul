<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\CarroCollection;
use App\Http\Resources\CarroResource;
use App\Http\Resources\CarroStoredResource;
use App\Models\Carro;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests\CarroStoreRequest;
use App\Http\Requests\CarroUpdateRequest;
use App\Http\Resources\CarroUpdateResource;
use Illuminate\Support\Facades\View;
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
    public function store(CarroStoreRequest $request)
    {
        try {
            return new CarroStoredResource(Carro::create($request->validated()));
        } catch (Exception $e) {
            return $this->errorHandler('Erro ao criar carro', $e, 500);
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
    public function update(CarroUpdateRequest $request, Carro $carro)
    {
        try {
            $carro->update($request->all());
            return new CarroUpdateResource($carro);
        } catch (Exception $e) {
            return $this->errorHandler('Erro ao atualizar carro', $e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carro $carro)
    {
        try {
            $carro->delete();
            return (new CarroResource($carro))->additional(['message' => 'Carro deletado com sucesso']);
        } catch (Exception $e) {
            return $this->errorHandler('Erro ao deletar carro', $e, 500);
        }
    }
}
