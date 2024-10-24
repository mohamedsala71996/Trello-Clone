<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkspaceResource extends JsonResource
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
            'users' => UserResource::collection($this->whenLoaded('users')), // Include boards
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            'boards_of_the_workspace' => BoardResource::collection($this->whenLoaded('boards')), // Include boards
        ];
    }
}
