<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request) {
        return [
          'firstName' => $this->firstName,
          'lastName' => $this->lastName,
          'streetAddress' => $this->streetAddress,
          'zipcode' => $this->zipcode,
          'city' => $this->city,
          'country' => $this->country,
          'state' => $this->state,
          'deleted_at' => $this->deleted_at,
          'account' => $this->whenLoaded('account')
        ];
    }
}
