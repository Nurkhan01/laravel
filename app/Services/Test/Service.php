<?php

namespace App\Services\Test;

use App\Models\Test;

class Service
{
    public function store($data)
    {
        if (Test::create($data)) {
            return Test::all();
        }
    }

    public function update($test, $data)
    {
        if ($test->update($data)) {
            return $test->id;
        }
    }
}
