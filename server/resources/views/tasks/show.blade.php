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
<h1>タスク詳細</h1>

    <p> 
        【タイトル】<br>{{ $task->title }}
    </p>

    <p>
        【内容】<br>{{ $task->body }}
    </p>

    <div class="button">
    {{-- http://localhost/tasksへ --}}
    <button onclick="location.href='/tasks'">一覧へ戻る</button>
    
    {{-- http://localhost/tasks/{id}/editへ --}}
    <button onclick="location.href='/tasks/{{ $task->id }}/edit'">編集する</button>

    
    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        {{-- confirmでYESかNOかみたいなのが出る。 --}}
        {{-- OKだった場合false（とばない？いいえ！）、NOだった場合True（とばない？はい！） --}}
        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
    </form>
    <div>
</body>
</html>
