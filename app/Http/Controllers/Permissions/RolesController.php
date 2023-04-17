<?php

namespace App\Http\Controllers\Permissions;


use App\Http\Requests\Permissions\CreateRequest;

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
        return $this->service->index();
    }

}
