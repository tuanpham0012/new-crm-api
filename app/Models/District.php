<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends BaseModel
{
    protected $table = 'districts';

	protected $fillable = [
		'name',
        'city_id'
	];

	/**
     * Get the country that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Get all of the wards for the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }

}
