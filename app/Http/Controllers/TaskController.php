<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
    
        // タスク一覧を取得
        $tasks = Task::all();
        
        // タスク一覧ビューでそれを表示
        return view('tasks.index', [
            'task_list' => $tasks,
        ]);
        
    }

    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $tasks = new Task;

        // タスク作成ビューを表示
        return view('tasks.create', [
            'tasks' => $tasks,
        ]);
    }

    // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
    
        //バリデーション
        $request->validate([
            'status'=> 'required|max:10',
            'content' => 'required',
            ]);
        
        // タスクを作成
  
        $tasks = new Task;
        $tasks->content = $request->content;
        $tasks->status = $request->status;
        $tasks->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // getでtasks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);

        // タスク詳細ビューでそれを表示
        return view('tasks.show', [
            'tasks' => $tasks,
        ]);
    }

    // getでtasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);

        // タスク編集ビューでそれを表示
        return view('tasks.edit', [
            'tasks' => $tasks,
        ]);
    }

    // putまたはpatchでtasks/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'status' => 'required|max:10',   // 追加
            'content' => 'required',
            ]);
        
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);
        // タスクを更新
        $tasks->status = $request->status;    // 追加
        $tasks->content = $request->content;
        $tasks->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでtasks/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);
        // タスクを削除
        $tasks->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}