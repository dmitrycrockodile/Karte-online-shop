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
         'postalCode' => $this->postal_code,
         'city' => $this->city,
         'country' => $this->country,
         'birthday' => $this->date_of_birth,
         'phone' => $this->phone_number,
         'phoneCode' => $this->phone_number_country,
      ];
   }
}
