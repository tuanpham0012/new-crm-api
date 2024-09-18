<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Staff extends BaseModel
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'nationality_id',
        'gender',
        'status',
        'avatar',
        'last_login',
        'email_verified_at',
        'password',
        'role_id',
        'city_id',
        'district_id',
        'ward_id',
        'portal_id',
        'note',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
        'code',
        'name',
        'email',
        'phone'
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
        'status' => 'status',
        'department' => 'department'
    ];

    public function makeNewQuery()
    {
        return $this->query()->with([
            'departments', 'banks', 'city','district','ward',
        ]);
    }

    public function department($query, $filter, $filters)
    {
        $query->whereHas('departments', function ($query) use ($filter) {
            $query->where('department_id', $filter['data']);
        });
        return $query;
    }

    /**
     * Get all of the departments for the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_users', 'user_id', 'department_id');
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
     * Get the banks that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banks(): BelongsToMany
    {
        return $this->belongsToMany(Bank::class, 'bank_user', 'user_id', 'bank_id')->withPivot('bank_number', 'bank_username');
    }

    public function updateBanks($request)
    {
        $attribures = [];
        foreach ($request as $item) {
            $attribures[] = [
                'bank_id' => $item['bank_id'],
                'bank_number' => $item['bank_number'],
                'bank_username' => $item['bank_username'],
            ];
        }
        $this->banks()->sync($attribures);
    }

    public function updateDepartments($request)
    {
        $ids = [];
        $attribures = [];
        foreach ($request as $item) {
            $attribures[] = [
                'department_id' => $item['department_id']
            ];
        }
        $this->departments()->sync($attribures);
    }
}
