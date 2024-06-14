<?php

namespace App\Transformers;

use App\Models\Ward;
use League\Fractal\TransformerAbstract;

class WardTransfornmer extends TransformerAbstract
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
    public function transform(Ward $ward)
    {
        return [
            'id' => $ward->id,
            'name' => $ward->prefix . ' ' . $ward->name,
        ];
    }
}
