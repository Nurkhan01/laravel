<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Filters\TestFilter;
use App\Http\Requests\Test\FilterRequest;
use App\Models\Test;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TestFilter::class, ['queryParams' => array_filter($data)]);
//        $filter = new TestFilter(['queryParams' => array_filter($data)]);
        $tests = Test::filter($filter)->paginate(10);
        dd($tests);
    }
}
