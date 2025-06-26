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

    //public function create()
//  {
    //dd('新規作成画面のルート実行！');

    
//   }
   public function create()
{
    $todos = Todo::all();
    return view('todo.create', ['todos' => $todos]);
}

}


