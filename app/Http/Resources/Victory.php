<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Victory extends JsonResource
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
            'id'         => $this->id,
            'game_date'  => $this->game_date,
            'byu_score'  => $this->byu_score,
            'utah_score' => $this->utah_score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
