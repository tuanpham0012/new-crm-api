<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends BaseModel
{
    protected $table = 'cities';
	protected $fillable = [
		'country_code',
        'name',
        'lat',
        'lng',
        'zipcode',
        'code',
        'country_id',
	];
	/**
     * Get the country that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get all of the districts for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany(District::class, 'city_id');
    }
}
