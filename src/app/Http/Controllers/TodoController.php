<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo; //追加

class TodoController extends Controller
{
     private $todo; // 追記

     // ここから
    public function __construct(Todo $todo)
    {
       $this->todo = $todo; // 追記
    }
    // ここまで
     public function index()
    {
   
        // 以下に変更
        $todos = $this->todo->all();

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

     $this->todo->fill($inputs); // 変更
     $this->todo->save(); // 変更
    
    return redirect()->route('todo.index'); // 追記
   }

   // 以下のshow()を追加
   public function show($id)
   {
       // 以下に変更
    $todo = $this->todo->find($id);
      
      return view('todo.show', ['todo' => $todo]); // 追記
   }

}


