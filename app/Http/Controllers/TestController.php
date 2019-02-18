<?php

namespace App\Http\Controllers;

use Debugbar as Debug;
use Illuminate\Http\Request;


class TestController extends Controller
{
    //
    public function user($id = 'пустой id',$category = null)
    {
        /*if ($category == null) echo "Указана пустая категория";
        else echo "А вот теперь правильно, категория = " . $category;
        echo "а это id = " . $id;*/
        Debug::info('category='.$category, 'id='. $id);
        return view('user', compact('id'))->withCategory($category);
    }
}
