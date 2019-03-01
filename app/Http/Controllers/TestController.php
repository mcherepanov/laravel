<?php

namespace App\Http\Controllers;

use Debugbar as Debug;
use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class TestController extends Controller
{
    //
    public function user($id = 'пустой id', $category = null)
    {
        /*if ($category == null) echo "Указана пустая категория";
        else echo "А вот теперь правильно, категория = " . $category;
        echo "а это id = " . $id;*/
        Debug::info('category=' . $category, 'id=' . $id);
        $users =
            DB::table('migrations')
                ->orderBy('id', 'desc')
                ->get();
        dump($users);
        $users->map( function ($item){
            $item->batch = 0;
        });
        dump($users);
        //DB::table('users')->insert(['name' => 'Mike', 'password' => 'mike@pass.in', 'email' => 'mike@yandex.ru']);

        //dd($users);

        //return view('user', compact('id'))->withCategory($category);
    }
}
