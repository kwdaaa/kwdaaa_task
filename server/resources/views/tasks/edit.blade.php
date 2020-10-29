<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- link:css + tab で雛形表示 --}}
    {{-- assetを書くことで、publicフォルダの中身ですよという指示になる。 --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<body>
<h1>投稿タスク編集</h1>

{{-- エラーを表示するためのコード --}}
{{-- @if (!count($errors)) でもOK！--}}
@if (count($errors) > 0)
    <div>
        <p><b>【エラー内容】</b></p>
        <ul>
            {{-- ->all()をつけることで連想配列のValueだけ取得...? --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--更新先はtasksのidにしないと増える php artisan rote:listで確認①-->
<form action="/tasks/{{ $task->id }}" method="post">
    @csrf
    <!-- resourceの場合PUTを指定してあげないとエラーが起きる php artisan rote:listで確認② -->
    @method('PUT')
    <!-- idはそのまま -->
    <input type="hidden" name="id" value="{{ $task->id }}">
    
    <p>
        タイトル<br>
        <input type="text" name="title" value="{{ $task->title }}">
    </p>
    <p>
        内容<br>
        <textarea  type="text" name="body">{{ $task->body }}</textarea>
    </p>

    <div class="button">
        <input type="submit" value="更新">
        {{-- http://localhost/tasks/{id}へ --}}
        <button onclick="location.href='/tasks/{{ $task->id }}'">詳細に戻る</button>
    </div>
</form>
</body>
</html>
