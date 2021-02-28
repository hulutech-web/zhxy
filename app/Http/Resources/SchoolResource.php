<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => Auth::user(),
            'name' => $this->name,
            'domain' => $this->domain,
            'description' => $this->description,
            'logo' => $this->logo,
            'icp' => $this->icp,
            'tel' => $this->tel,
            'email' => $this->email,
            'students' => $this->students(),
            'created_at' => $this->created_at
        ];
    }
}
