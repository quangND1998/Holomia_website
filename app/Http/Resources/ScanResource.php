<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ScanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $this
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'favicon' => $this->favicon,
            'model_code' => $this->model_code,
            'code' => $this->code,
            'slug' => $this->slug,
            'category_scan_id' => $this->category_scan_id,
            'active' => $this->active,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'logo' => $this->logo,
            'expired_date' => $this->expired_date,
            'user' => $this->user,
            'category_scan' => $this->category_scan,
            'is_expired' => $this->expired_date <= Carbon::now() ? true : false,
            'group_id' => $this->group_id,
            'group' => $this->group,


        ];
    }
}
