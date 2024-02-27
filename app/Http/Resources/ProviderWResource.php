<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderWResource extends JsonResource
{
    public const STATUS = [
     'done' => 'paid',
     'wait' => 'pending',
     'nope' => 'reject',
    ];

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'provider' => 'DataProviderW',
            'id' => intval($this['id']),
            'amount' => floatval($this['amount']),
            'currency' => strval($this['currency']),
            'phone' => strval($this['phone']),
            'provider_status' => strval($this['status']),
            'status_title' => strval(self::STATUS[$this['status']]),
            'created_at' => strval($this['created_at']),
        ];
    }
}
