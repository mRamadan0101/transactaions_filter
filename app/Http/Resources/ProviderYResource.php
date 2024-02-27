<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderYResource extends JsonResource
{
    public const STATUS = [
    100 => 'paid',
    200 => 'pending',
    300 => 'reject',
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
            'provider' => 'DataProviderY',
            'id' => strval($this['id']),
            'amount' => floatval($this['amount']),
            'currency' => strval($this['currency']),
            'phone' => strval($this['phone']),
            'provider_status' => strval($this['status']),
            'status_title' => strval(self::STATUS[$this['status']]),
            'created_at' => strval($this['created_at']),
        ];
    }
}
