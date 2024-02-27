<?php

namespace App\Filters;

class DataProviderYFilter extends Filters
{
    public const STATUS = [
        'paid' => 100,
        'pending' => 200,
        'reject' => 300,
    ];

    public function statusCode($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('status', self::STATUS[$value]);

            return $this->query;
        }
    }

    public function amounteMin($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('amount', '>=', $value);

            return $this->query;
        }
    }

    public function amounteMax($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('amount', '<=', $value);

            return $this->query;
        }
    }

    public function currency($value)
    {
        if (!empty($value)) {
            $this->query = $this->query->where('currency', $value);

            return $this->query;
        }
    }
}
