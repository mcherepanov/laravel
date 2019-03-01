<?php

namespace App\Http\Controllers;

use Debugbar as Debug;
use Illuminate\Http\Request;
use \DB;
use Illuminate\Support\Facades\Route;

class QueueController extends Controller
{
    //
    public function action($action = false)
    {
        Debug::info($action);
        switch ($action) {
            case '1':
            case '2':
            case '3':
            case '4':
                DB::table('tasks')
                    ->where('id', $action)
                    ->increment('counter');
                DB::table('logs')
                    ->insert([
                        'task_id' => $action,
                        'status' => '0',
                        'created_at' => date('Y-m-d H:i:s', time())

                    ]);
                break;
        }
        $result = DB::table('tasks')->get();
        return view('queue', compact('action', 'result'));
    }
}
