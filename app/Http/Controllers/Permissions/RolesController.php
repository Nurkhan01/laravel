<?php

namespace App\Http\Controllers\Permissions;


use App\Http\Requests\Permissions\CreateRequest;
use App\Http\Requests\Permissions\UpdateRequest;
use App\Http\Resources\Permission\RoleResource;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesController extends BaseController
{
    public function createRoleAndPermission(CreateRequest $request)
    {
        if($data = $request->validated()){
            $responceData = $this->service->create($data);
            return $responceData == false ? response('Ошибка при добавлений роли', 500) : response('Успешно добавлено', 201);
        }
    }
    public function index(){
        return RoleResource::collection(Role::all());
    }
    public function updateRole(UpdateRequest $request, Role $role)
    {
        if($data = $request->validated())
        {
            $responceData = $this->service->update($role, $data);
            return $responceData == false ? response('Ошибка при изменений роли', 500) : response('Успешно изменен', 201);
        }
    }

}
