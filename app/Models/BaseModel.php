<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class BaseModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    public function findUuid($uuid)
    {
        return $this->where('uuid', $uuid)->first();
    }

    public function updateForUuid($uuid, $data)
    {
        return $this->where('uuid', $uuid)->update($data);
    }
}
