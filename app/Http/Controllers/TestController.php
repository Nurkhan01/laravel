<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TestController extends Controller
{
    public function index()
    {

        $flights = Test::where('title', 'Dota2')->get();

        $flights = $flights->reject(function ($flight) {
            return $flight->cancelled;
        });
        dump($flights);
        dd($flights);
//        $test = Test::find(1);
//        $str = 'string';
//        dump($test->title); // Helper который не остонавливает работу скрипта
//        echo "hello";
//        dd($str); // Helper который остонавливает работу скрипта
    }
}
