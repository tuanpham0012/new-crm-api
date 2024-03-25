<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends BaseModel
{
    use NodeTrait;
    protected $table = 'departments';

    protected $fillable = [
        'uuid',
        'code',
        'name',
        'note',
        'status',
        '_lft',
        '_rgt',
        'parent_id'
    ];

    /**
     * Get the children that owns the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    /**
     * Get all of the parent for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    public function getData(){
        return $this->query()->with(['parent', 'children'])->withDepth();
    }
}
