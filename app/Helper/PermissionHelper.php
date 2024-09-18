<?php

namespace App\Helper;

use App\Enums\SystemPermissionEnum;
use App\Models\User;

class PermissionHelper{
    public static function checkUserPermission($permissionId, $projectId = null) :bool
    {
        /** @var User */
        $user = auth()->user();
        if(!$user){
            return false;
        }

        if(in_array(SystemPermissionEnum::SYSTEM_ADMIN, $user->permissions)){
            return true;
        }

        if($projectId){
            $user = $user->load('projectPermissions');
            $checkUser = $user->projectPermissions->where('project_id', $projectId)->where('system_function_id', $permissionId)->first();
            if($checkUser){
                return true;
            }
            return false;
        }

        return in_array(SystemPermissionEnum::SYSTEM_ADMIN, $user->permissions) || in_array($permissionId, $user->permissions);
    }
}
