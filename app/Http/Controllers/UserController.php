<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRoleResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController
{
    public function GetUserRoles()
    {
        $query = DB::table('users')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->leftJoin('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
            ->leftJoin('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->select('users.id as user_id', 'users.name as user_name',
                'roles.id as role_id', 'roles.name as role_name',
                'permissions.id as permissions_id', 'permissions.name as permissions_name')
            ->get();
        return $query ? UserRoleResource::collection($query) : response('ошибка в запросе', 500);
    }
}
