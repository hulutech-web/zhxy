<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'real_name' => $this->real_name,
                'avatar' => $this->avatar,
                'attendance_num' => $this->attendance_num,
                'CID' => $this->CID,
                'created_at' => $this->created_at,
        ];
    }
}
