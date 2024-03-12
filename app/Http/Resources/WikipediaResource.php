<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class WikipediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'categorias' => $this->categorias,
            'contenido' => $this->contenido,
            'created_at' => $this->created_at->toDateString()
        ];
    }
}
