<?php

namespace App\Transformers;

use App\Models\City;
use League\Fractal\TransformerAbstract;

class CityTransfornmer extends TransformerAbstract
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
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city-> name,
            'country_code' => $city->country_code,
            'zipcode' => $city->zipcode
        ];
    }
}
