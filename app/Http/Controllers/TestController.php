<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TestController extends Controller
{
    public function index()
    {
        $test = Test::find(2);
        $str = 'string';
        dump($test->title); // Helper который не остонавливает работу скрипта и выводит данные
        echo "hello";
        dd($str); // Helper который остонавливает работу скрипта и выводит данные
    }

    public function create()
    {
        $testArr = [
            [
                'title' => 'Dota2',
                'content' => 'Tinker is the best hero in this game',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.dota2.com%2Fhero%2Ftinker%3Fl%3Drussian&psig=AOvVaw0m2jRCrw0X36ogIy89MtGo&ust=1673421109256000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKCW_8e5vPwCFQAAAAAdAAAAABAE',
                'likes' => 20,
                'is_published' => 1],
            [
                'title' => 'Cs Go',
                'content' => 'AWP is the best weapon in this game',
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcounterstrike.fandom.com%2Fru%2Fwiki%2FAWP_%2528CS%3AGO%2529&psig=AOvVaw0eIv-XDdNpfpTz1l4Gk510&ust=1673421196228000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCIDAvPG5vPwCFQAAAAAdAAAAABAE',
                'likes' => 10,
                'is_published' => 1
            ],
        ];

        foreach ($testArr as $test){
            Test::create($test);
        }

        dd('created successfully');
    }

    public function update(){
        $test = Test::find(2);
        $test->update([
            'title' => 'Cs 1.6'
        ]);
        dd('updated successfully');
    }

    public function delete(){
        $test = Test::find(2);
        $test->delete();
        dd('deleted');
    }

    public function restoreTest(){
        $test = Test::withTrashed()->find(2);
        $test->restore();
        dd('data has been restored');
    }
}
