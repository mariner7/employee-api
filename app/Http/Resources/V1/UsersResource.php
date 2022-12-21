<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $role = $this->is_admin == 1 ? "Admin" : "Employee";
        $status = $this->is_active == 1 ? "Active" : "Inactive";
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'role' => $role,
            'status' => $status,
            'documents' => DocumentsResource::collection($this->whenLoaded('documents'))
        ];
    }
}
