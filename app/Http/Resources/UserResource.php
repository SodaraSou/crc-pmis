<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'kh_name' => $this->kh_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'profile_img' => $this->profile_img,
            'user_level' => $this->userLevel,
        ];
    }
}
