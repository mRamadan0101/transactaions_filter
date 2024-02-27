<?php

namespace App\Filters;

class DataProviderWFilter extends Filters
{
    public const STATUS = [
        'paid' => 'done',
        'pending' => 'wait',
        'reject' => 'nope',
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
