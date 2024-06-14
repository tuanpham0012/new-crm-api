<?php

namespace App\Transformers;

use App\Models\District;
use League\Fractal\TransformerAbstract;

class DistrictTransfornmer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(District $district)
    {
        return [
            'id' => $district->id,
            'name' => $district->name,
        ];
    }
}
