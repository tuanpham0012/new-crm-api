<?php

namespace App\Transformers;

use App\Models\CustomerContact;
use League\Fractal\TransformerAbstract;

class CustomerContactTransformer extends TransformerAbstract
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
    public function transform(CustomerContact $data)
    {
        return [
            'id' => $data->id,
            'value' => $data->value,
            'type' => $data->type,
            'type2' => $data->type2,
            'type_label' => CustomerContact::CONTACT_TYPE_LABLE[$data->type],
            'type2_label' => CustomerContact::TYPE_LABLE[$data->type2],
        ];
    }
}
