<?php

namespace App\Traits;

use App\Filters\Filters;
use Illuminate\Support\Collection;

trait Filterable
{
    /**
     * Filters the class by its filter.
     *
     * @return mixed
     */
    public function filter(Collection $data, Filters $filters)
    {
        
        return $filters->apply($data);
    }
}
