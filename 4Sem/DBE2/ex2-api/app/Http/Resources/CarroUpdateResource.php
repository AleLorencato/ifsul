<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarroUpdateResource extends CarroResource
{
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, 'Carro atualizado com sucesso');
    }

    public function with($request)
    {
        return ['message' => 'Carro atualizado com sucesso'];
    }

}
