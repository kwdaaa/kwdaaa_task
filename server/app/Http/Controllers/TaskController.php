<?php

namespace App\Http\Controllers;

// Taskクラス(モデル)を読み込む
use App\Task;

// TaskRequest.phpを読み込む
use App\Http\Requests\TaskRequest;

// TaskRequest.phpを読み込むので、既存で入っていた以下コードは消す。
// use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 01:一覧画面
    public function index()
    {
        // Taskクラス(モデル)テーブル情報全件取得
        $tasks = Task::all();

        // tasksティレクトリーの中のindex.blade.phpページを指定し、キー「task」にバリュー「$tasks」を渡す。
        return view('tasks.index', ['tasks' => $tasks]);
    }

    // 02-1:登録画面
    // public function create()
    // {
    //     return view('tasks.create');
    // }


    // 02-2:登録機能
    public function store(TaskRequest $request)
    {
        // Taskクラス(モデル)を$taskにインスタンス化
        $task = new Task;

        // 値の用意
        // $request->titleに入ってきた値を$task->titleに入れ直す。
        $task->title = $request->title;

        // $request->bodyに入ってきた値を$task->bodyに入れ直す。
        $task->body = $request->body;

        // インスタンスに値を設定して保存
        $task->save();

        // 登録したらindexに戻る
        return redirect('/tasks');
    }


    // 03:詳細画面
    public function show($id)
    {
        // 取得したidの情報を$task変数にいれる。
        $task = Task::find($id);

        // tasksティレクトリーの中のshow.blade.phpページを指定し、キー「task」にバリュー「$task」を渡す。
        return view('tasks.show', ['task' => $task]);
    }


    // 04-1:編集画面
    public function edit($id)
    {
        // 取得したidの情報を$task変数にいれる。
        $task = Task::find($id);

        // tasksティレクトリーの中のedit.blade.phpページを指定し、キー「task」にバリュー「$task」を渡す。
        return view('tasks.edit', ['task' => $task]);
    }


    
    // 04-2:編集機能
    // ここはidで探して持ってくる以外はstoreと同じ
    public function update(TaskRequest $request, $id)
    {
        // 取得したidの情報を$task変数にいれる。
        $task = Task::find($id);

        // 値の用意
        // $request->titleに入ってきた値を$task->titleに入れ直す。
        $task->title = $request->title;

        // $request->bodyに入ってきた値を$task->bodyに入れ直す。
        $task->body = $request->body;

        // taskのtimestampsは設定されてないからfalse
        $task->timestamps = false;

        // インスタンスに値を設定して保存
        $task->save();

        // 登録したらindexに戻る
        return redirect('/tasks');
    }


    // 05:削除機能
    public function destroy($id)
    {
        // 取得したidの情報を$task変数にいれる。
        $task = Task::find($id);

        // $task変数に入った情報を消す。
        $task->delete();

        // redirectで出力先の指定。http://localhost/tasksにとぶ。
        return redirect('/tasks');
    }
}
