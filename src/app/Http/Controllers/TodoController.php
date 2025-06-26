<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo; //追加

class TodoController extends Controller
{
     public function index()
    {
        $todo = new Todo(); //追加
        $todos = $todo->all(); //追加

        return view('todo.index',['todos' => $todos]); // 修正
    }
}


