<?php

namespace App\Filters;

class DataProviderXFilter extends Filters
{
    public const STATUS = [
        'paid' => 1,
        'pending' => 2,
        'reject' => 3,
    ];

    public function statusCode($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('transactionStatus', self::STATUS[$value]);

            return $this->query;
        }
    }

    public function amounteMin($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('transactionAmount', '>=', $value);

            return $this->query;
        }
    }

    public function amounteMax($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('transactionAmount', '<=', $value);

            return $this->query;
        }
    }

    public function currency($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('Currency', $value);

            return $this->query;
        }
    }
}
