<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransfornmer extends TransformerAbstract
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
    public function transform(Country $country)
    {
        return [
            'id' => $country->id,
            'name' => $country->name
        ];
    }
}
