<?php

namespace App\Transformers;

use App\Models\Bank;
use League\Fractal\TransformerAbstract;

class BankTransformer extends TransformerAbstract
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
    public function transform(Bank $bank)
    {
        return [
            'id' => $bank->id,
            'name' => $bank->name,
            'def_name' => $bank->def_name,
            'note' => $bank->def_name,
            'status' => $bank->status,
        ];
    }
}
