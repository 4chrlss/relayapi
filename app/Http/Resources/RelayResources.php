<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelayResources extends JsonResource
{
    /**
     
Transform the resource into an array.*
@return array<string, mixed>*/
// public function toArray(Request $request): array{//return parent::toArray($request);
//     return ['relay' => $this->relay,'relay_status' => $this->relay_status,];}
// }

public function toArray(Request $request)
{
    return [
        'id' => $this->id,
        'relay' => $this->relay,
        'relay_status' => $this->relay_status,
    ];
}

}