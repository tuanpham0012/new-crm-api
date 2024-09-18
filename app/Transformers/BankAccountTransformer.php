<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class BankAccountTransformer extends TransformerAbstract
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
    public function transform($bank)
    {
        return [
            'bank_id' => $bank->id,
            'name' => $bank->name,
            'def_name' => $bank->def_name,
            'bank_number' => $bank->pivot?->bank_number,
            'bank_username' => $bank->pivot?->bank_username
        ];
    }
}
