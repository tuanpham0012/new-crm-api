<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends BaseModel
{
    use NodeTrait, SoftDeletes;
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
     * [
     *   field1,
     *   field2
     * ]
     *
     * @var string[]
     */
    protected $searchables = [
        'code' => 'code',
        'name' => 'name'
    ];

    /**
     * [
     *    columnKey => fieldName
     * ]
     *
     * @var string[]
     */
    protected $orderables = [];

    /**
     * [
     *    columnKey => filterFunction
     * ]
     *
     * @var string[]
     */
    protected $filterables = [];

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

    public function makeNewQuery(){
        return $this->query()->with(['parent', 'children'])->withDepth()->orderBy('_lft', 'asc');
    }
}
