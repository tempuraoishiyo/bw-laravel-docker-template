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

    //public function store()
  //{
    //dd('新規作成画面のルート実行！');

    
   //}
   public function create()
{
    $todos = Todo::all();
    return view('todo.create', ['todos' => $todos]);
}
   public function store(Request $request)
   {
     $inputs = $request->all();
     
     // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo(); 
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();
    
    return redirect()->route('todo.index'); // 追記
   }

}


