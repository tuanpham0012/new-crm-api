<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends BaseModel
{

    const CUSTOMER_TYPE = [
        'Khách hàng',
        'Nhà Cung Cấp',
        'Đối tác',
        'Khác',
    ];

    protected $table = 'customers';

    protected $fillable = [
        'uuid',
        'code',
        'first_name',
        'last_name',
        'avatar_id',
        'address',
        'gender',
        'birthday',
        'type',
        'tax_code',
        'bank_id',
        'bank_number',
        'bank_username',
        'user_id',
        'observer_id',
        'city_id',
        'district_id',
        'ward_id',
        'customer_source_id',
        'portal_id',
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
        'first_name',
        'last_name',
        'tax_code',
        'contacts.value'
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
    protected $filterables = [
        'type' => 'type',
        'user_id' => 'user_id',
        'observer_id' => 'observer_id',
    ];

    public function makeNewQuery()
    {
        return $this->query()->with(
            ['contacts', 'products', 'source', 'city', 'district', 'ward', 'emails', 'phones', 'messages', 'user', 'observer', 'bank', 'files']
        )->latest('id');
    }


    /**
     * Get all of the contacts for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(CustomerContact::class);
    }

    /**
     * Get all of the products for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'customer_product', 'customer_id', 'product_id');
    }

    /**
     * Get the city that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the district that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the ward that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    /**
     * Get the ward that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(CustomerSource::class, 'customer_source_id');
    }

    /**
     * Get all of the contacts for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails(): HasMany
    {
        return $this->hasMany(CustomerContact::class)->where('type', CustomerContact::CONTACT_TYPE['email']);
    }

    /**
     * Get all of the contacts for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones(): HasMany
    {
        return $this->hasMany(CustomerContact::class)->where('type', CustomerContact::CONTACT_TYPE['phone']);
    }

    /**
     * Get all of the contacts for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(CustomerContact::class)->where('type', CustomerContact::CONTACT_TYPE['message']);
    }

    /**
     * Get the user that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the observer that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function observer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'observer_id');
    }

    /**
     * Get the observer that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /**
     * Get the post's image.
     */
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
