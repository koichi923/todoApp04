<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task; //追加

use Illuminate\Support\Facades\Validator; //追加

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // モデルのレコードを全部取得
        // 変数$tasksに入れる
        // 複数のレコードを取得するとき (ステータスが0)
        $tasks = Task::where('status', false)->get();

        // ビューファイルに、「tasks」という変数名で渡す
        return view('tasks.index', compact('tasks'));
    }

    // close一覧を実装
    public function close()
    {
        $tasks = Task::where('status', true)->paginate(5);

        // ビューファイルに、「tasks」という変数名で渡す
        return view('close', compact('tasks'));
    }
    
    // portfolio一覧を実装
    public function portfolio(){
        
        // 単純にviewファイルを表示するだけ
        return view('portfolio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーションを追加
        $rules = [
            'task_name' => 'required|max:100',
        ];

        $messages = ['required' => '必須項目です。', 'max' => '100文字以下にしてください。'];

        Validator::make($request->all(), $rules, $messages)->validate();


        //モデルをインスタンス化
        $task = new Task;

        //モデル->カラム名 = 値 で、データを割り当てる
        $task->name = $request->input('task_name');

        //データベースに保存
        $task->save();

        //リダイレクト
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        //GET tasks/{task}/edit
        // $idに一致するレコードを取得することができる
        $task = Task::find($id);
        return view('tasks.index', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // tasks/{task}
        // dd($request->status); //追記

        //「完了」ボタンを押したとき

        //該当のタスクを検索
        $task = Task::find($id);

        //モデル->カラム名 = 値 で、データを割り当てる
        $task->status = true; //true:完了、false:未完了

        //データベースに保存
        $task->save();

        //リダイレクト
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
