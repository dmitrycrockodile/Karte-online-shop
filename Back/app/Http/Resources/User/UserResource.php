<?php

namespace App\Http\Resources\User;

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
         'email' => $this->email,
         'name' => $this->name,
         'surname' => $this->surname,
         'patronymic' => $this->patronymic,
         'age' => $this->age,
         'address' => $this->address,
         'sex' => $this->sex_title,
         'postal_code' => $this->postal_code,
         'city' => $this->city,
         'country' => $this->country,
         'date_of_birth' => $this->date_of_birth,
         'phone_number' => $this->phone_number,
         'is_subscribed' => !!$this->is_subscribed,
         'email_verified_at' => $this->email_verified_at,
      ];
   }
}
