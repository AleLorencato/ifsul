<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarroStoredResource extends CarroResource
{
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201, 'Carro criado com sucesso');
    }

    public function with($request)
    {
        return ['message' => 'Carro criado com sucesso'];
    }

}
