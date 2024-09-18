<?php

namespace App\Transformers;

use App\Models\File;
use League\Fractal\TransformerAbstract;

class FileTransfomer extends TransformerAbstract
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
    public function transform(File $entry)
    {
        return [
            'id' => $entry->id,
            'fileable_id' => $entry->fileable_id,
            'fileable_type' => $entry->fileable_type,
            'url' => $entry->url($entry->url),
            'type' => $entry->type,
        ];
    }
}
