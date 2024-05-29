<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform($user)
    {
        return [
            'id' => $user->id,
            'uuid' => $user->uuid,
            'code' => $user->code,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'nationality_id' => $user->nationality_id,
            'gender' => $user->gender,
            'status' => $user->status,
            'avatar' => $user->avatar,
            'last_login' => $user->last_login,
            'email_verified_at' => $user->email_verified_at,
            'password' => $user->password,
            'role_id' => $user->role_id,
            'note' => $user->note,
        ];
    }
}
