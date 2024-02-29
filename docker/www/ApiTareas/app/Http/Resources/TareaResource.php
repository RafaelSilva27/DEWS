<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => 'Titulo: ' . $this->titulo,
            'descripcion' => 'Desc: ' . $this->descripcion,
            'etiqueta' => $this->etiqueta->pluck('nombre')
        ];
    }
}
