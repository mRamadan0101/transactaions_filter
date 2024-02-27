<?php

namespace App\Repositories;

use App\Filters\DataProviderWFilter;
use App\Filters\DataProviderXFilter;
use App\Filters\DataProviderYFilter;
use App\Traits\Filterable;

class DataProviderRepository
{
    use Filterable;
    protected $title;
    protected $data = [];

    public function __construct(array $data, $title)
    {
        $this->title = $title;
        $this->data = collect($data);
    }

    public function getProviderName()
    {
        return $this->title;
    }

    public function getTransactions()
    {
        if (request()->has('provider') && request()->provider != $this->title) {
            return [];
        }

        switch ($this->title) {
            case 'DataProviderW':
                $filter = new DataProviderWFilter();
                $this->data = $this->filter($this->data, $filter);

                break;
            case 'DataProviderX':
                $filter = new DataProviderXFilter();
                $this->data = $this->filter($this->data, $filter);
                break;
            case 'DataProviderY':
                $filter = new DataProviderYFilter();
                $this->data = $this->filter($this->data, $filter);
                break;
            default:
                // code...
                break;
        }

        return $this->data;
    }
}
