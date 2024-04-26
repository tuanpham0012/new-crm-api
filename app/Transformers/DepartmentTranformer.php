<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTranformer extends TransformerAbstract
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
    public function transform(Department $entry):array
    {
        return [
            'id' => $entry->id,
            'uuid' => $entry->uuid,
            'code' => $entry->code,
            'name' => $entry->name,
            'note' => $entry->note,
            '_lft' => $entry->_lft,
            '_rgt' => $entry->_rgt,
            'depth' => $entry->depth,
            'parent_id' => $entry->parent_id,
        ];
    }
}
