<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

abstract class Filters
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Collection
     */
    protected $query;

    /**
     * Filters constructor.
     */
    public function __construct()
    {
        $this->request = request();
    }

    /**
     * Applies filters to the Collection.
     *
     * @return Collection
     */
    public function apply(Collection $data)
    {
        $this->query = $data;

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                call_user_func([$this, $filter], $value);
            }
        }
        return $this->query;
    }

    /**
     * Gets the filters from the request inputs.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->except(get_class_methods(self::class));
    }
}
