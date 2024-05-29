<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

trait TableTrait
{
/**
     * @var integer
     */
    // protected $perPage = 10;

    /**
     * @var string[]
     */
    protected $orderDirMap = [
        'asc' => 'asc',
        'desc' => 'desc',
    ];

    /**
     * [
     *   field1,
     *   field2
     * ]
     *
     * @var string[]
     */
    protected $searchables = [];

    /**
     * [
     *    columnKey => fieldName
     * ]
     *
     * @var string[]
     */
    protected $orderables = [];

    /**
     * [
     *    columnKey => filterFunction
     * ]
     *
     * @var string[]
     */
    protected $filterables = [];

    /**
     * @var boolean
     */
    protected $isPaginate = true;

    /**
     * @var Builder|\Illuminate\Database\Query\Builder
     */
    protected $query;

    /**
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    protected function currentQuery()
    {
        if (!$this->query) {
            return $this->makeNewQuery();
        }

        return $this->query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function makeNewQuery(){
        return $this->newQuery();
    }

    /**
     * Get data
     *
     * @param $isPaginate
     * @return Collection|LengthAwarePaginator
     */
    public function data($option = []): Collection|LengthAwarePaginator
    {
        [$search, $orders, $filters, $perPage, $paginate] = $this->convertRequest(request());
        $perPage = $perPage ?? $this->perPage;
        $query = $this->buildQuery($search, $orders, $filters);
        // dd($paginate);
        if ($paginate == '0') {
            return $query->get();
        }
        return $query->paginate(intval($perPage));
    }

    /**
     * Build Query
     *
     * @param $search
     * @param $orders
     * @param $filters
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function buildQuery($search, $orders, $filters)
    {
        $query = $this->currentQuery();
        $this->applySearchToQuery($search, $query);
        $this->applyFilterToQuery($filters, $query);
        $this->applyOrderToQuery($orders, $query);

        return $query;
    }

    /**
     * @param $search
     * @param Builder $query
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    protected function applySearchToQuery($search, Builder $query)
    {
        if (empty($search) || !is_string($search) || !count($this->searchables)) {
            return $query;
        }
        $content = '%' . trim($search) . '%';
        $query->where(function ($q) use ($content) {
            foreach ($this->searchables as $searchable) {
                $q->orWhere($searchable, 'like', $content);
            }
        });

        return $query;
    }

    /**
     * @param array $filters
     * @param Builder|\Illuminate\Database\Query\Builder $query
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    protected function applyFilterToQuery($filters, $query)
    {
        if (!is_array($filters)) {
            return $query;
        }

        foreach ($filters as $filter) {
            $issetFilter = !empty($filter['key']) && isset($filter['data']) && isset($this->filterables[$filter['key']]);
            if ($issetFilter && $filter['data'] !== null && $filter['data'] !== '') {
                $funName = $this->filterables[$filter['key']];
                if (method_exists($this, $funName)) {
                    $this->{$funName}($query, $filter, $filters);
                } else {
                    $this->defaultFilter($query, $filter, $filters);
                }
            }
        }

        return $query;
    }

    /**
     * @param Builder|\Illuminate\Database\Query\Builder $query
     * @param $filter
     * @param $filters
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    protected function defaultFilter($query, $filter, $filters)
    {
        $query->where($this->filterables[$filter['key']], $filter['data']);

        return $query;
    }

    /**
     * @param $orders
     * @param Builder|\Illuminate\Database\Query\Builder $query
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    protected function applyOrderToQuery($orders, $query)
    {
        if (!is_array($orders)) {
            return $query;
        }

        foreach ($orders as $order) {
            if (!empty($order['key']) && !empty($order['dir'])) {
                $dir = Str::lower($order['dir']);
                if (!empty($this->orderDirMap[$dir]) && !empty($this->orderables[$order['key']])) {
                    $query->orderBy($this->orderables[$order['key']], $this->orderDirMap[$dir]);
                }
            }
        }

        return $query;
    }

    /**
     * Get Filterables
     *
     * @return array
     */
    public function getFilterables()
    {
        return $this->filterables;
    }

    /**
     * Convert Request
     *
     * @param $request
     * @return array
     */
    protected function convertRequest($request): array
    {
        return [
            $request->get('search'),
            $request->get('orders'),
            $request->get('filters'),
            $request->get('per_page'),
            $request->get('paginate'),
        ];
    }
}
