<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\StoreRequest;
use App\Models\Test;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if ($data){
            $this->service->store($data);
        }
    }
}
