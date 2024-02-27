<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderXResource extends JsonResource
{
    public const STATUS = [
    1 => 'paid',
    2 => 'pending',
    3 => 'reject',
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
            'provider' => 'DataProviderX',
            'id' => strval($this['transactionIdentification']),
            'amount' => floatval($this['transactionAmount']),
            'currency' => strval($this['Currency']),
            'phone' => strval($this['senderPhone']),
            'provider_status' => strval($this['transactionStatus']),
            'status_title' => strval(self::STATUS[$this['transactionStatus']]),
            'created_at' => strval($this['transactionDate']),
        ];
    }
}
