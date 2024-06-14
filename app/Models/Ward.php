<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends BaseModel
{
    protected $table = 'wards';

	protected $fillable = [
		'name',
        'prefix',
        'district_id',
        'created_by',
        'updated_by',
        'deleted_by'
	];

	/**
     * Get the country that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
