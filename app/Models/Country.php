<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends BaseModel
{
    protected $table = 'countries';
	protected $casts = [
		'status' => 'int',
	];
	protected $fillable = [
		'code',
        'name',
        'continent_id',
        'code_alpha2',
        'code_alpha3',
        'code_numeric',
        'fips',
        'capital',
        'flag',
        'map',
        'phone_code',
        'key',
        'area',
        'population',
        'tld',
        'currency_code',
        'currency_name',
        'postal_code_format',
        'postal_code_regex',
        'languages',
        'geoname_id',
        'neighbours',
        'equivalent_fips_code',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
	];

    /**
     * Get all of the cities for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}
