<?php

namespace App\Helper;

use App\Enums\MenuPermissionEnum;
use App\Models\User;
use App\Enums\SystemPermissionEnum;

if (!function_exists('check_user_permission')) {
    function get_full_address($user): string
    {
        $address = $user->address . ' ' ?? ' ';
        if($user->ward){
            $address .= $user->ward->prefix . ' ' . $user->ward->name . ', ';
        }
        if($user->distinct){
            $address .= $user->distinct->name . ', ';
        }
        if($user->city){
            $address .= $user->city->name . '.';
        }
        return $address;
    }
}
