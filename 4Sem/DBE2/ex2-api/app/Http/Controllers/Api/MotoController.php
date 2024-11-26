<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMotoRequest;
use App\Http\Requests\UpdateMotoRequest;
use App\Http\Resources\MotoCollection;
use App\Http\Resources\MotoResource;
use App\Models\Moto;
use Exception;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MotoCollection(Moto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMotoRequest $request)
    {
        if ($request->validated()) {
            $moto = Moto::create($request->all());
            return new MotoResource($moto);
        } else {
            return response()->json(['error' => 'Erro na Validacao'], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Moto $moto)
    {
        return new MotoResource($moto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotoRequest $request, Moto $moto)
    {
        if ($moto->update($request->all())) {
            return new MotoResource($moto);
        } else {
            return response()->json(['error' => 'Erro na Validacao'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moto $moto)
    {
        try {
            $moto->delete();
            return response()->json(['success' => 'Moto deletada com sucesso'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao deletar moto'], 500);
        }
    }
}
