<?php


namespace App\Http\Controllers\Test;


use App\Http\Requests\Test\StoreRequest;
use App\Models\Test;

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, Test $test)
    {
        $data = $request->validated();
        if($data){
            $this->service->update($test, $data);
        }
    }
}
