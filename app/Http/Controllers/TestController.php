<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Test;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TestController extends Controller
{
    public function index()
    {
////        $test = Test::find(2);
//        $str = 'string';
////        dump($test->title); // Helper который не остонавливает работу скрипта и выводит данные
//        dd($str); // Helper который остонавливает работу скрипта и выводит данные

//        $test = Test::all();
//        dd($test);
//        $category = Category::find(2);
//        dd($category->tests);
//        $test = Test::find(1);
//        dd($test->tags);
        $tag = Tag::find(1);
        dd($tag->tests);
    }

    // action create по документации должен просто вернуть страницу а не добавлять в бд данные, для добавление нужно использовать action store
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

        foreach ($testArr as $test) {
            Test::create($test);
        }

        dd('created successfully');
    }

    public function updateTest()
    {
        $test = Test::find(2);
        $test->update([
            'title' => 'Cs 1.6'
        ]);
        dd('updated successfully');
    }

    public function delete()
    {
        $test = Test::find(2);
        $test->delete();
        dd('deleted');
    }

    public function restoreTest()
    {
        $test = Test::withTrashed()->find(2);
        $test->restore();
        dd('data has been restored');
    }

    public function firstOrCreate()
    {
        $anotherTest = [
            'title' => 'LOL',
            'content' => 'Tinker is the best hero in Dota2 but not in this game',
            'image' => 'picture',
            'likes' => 25,
            'is_published' => 0
        ];
        $test = Test::firstOrCreate(['title' => 'LOL',
        ], $anotherTest);
        dump($test->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherTest = [
            'title' => 'Cs 1.6',
            'content' => 'AWP is the best weapon in this game like in modern Cs Go',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fcounterstrike.fandom.com%2Fru%2Fwiki%2FAWP_%2528CS%3AGO%2529&psig=AOvVaw0eIv-XDdNpfpTz1l4Gk510&ust=1673421196228000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCIDAvPG5vPwCFQAAAAAdAAAAABAE',
            'likes' => 5,
            'is_published' => 1
        ];
        $test = Test::updateOrCreate(['title' => 'Cs 1.6',
        ], $anotherTest);
        dd($test->content);
    }

    // action для добавление в данных  в таблицу test
    public function store()
    {
        $data = \request()->validate([
            'title' => 'String',
            'content' => 'String',
            'image' => 'String',
            'likes' => 'Integer',
        ]);
        if (Test::create($data)) {
            return Test::all();
        }
    }

    // Простой пример
//    public function show($id)
//    {
//        $test = Test::findorFail($id);
//        dd($test->title);
//    }

    // Фича laravel на action show
    public function show(Test $test)
    {
        return $test;
    }

    public function edit(Test $test)
    {
        dd($test->title);
    }

    // update
    public function update(Test $test)
    {
        $data = \request()->validate([
            'title' => 'String',
            'content' => 'String',
            'image' => 'String',
            'likes' => 'Integer',
        ]);
        if ($test->update($data)) {
            return $test->id;
        }
    }

    // destroy
    public function destroy(Test $test)
    {
        $test->delete();
        return Test::all();
    }
}
