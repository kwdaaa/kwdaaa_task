<h1>タスク一覧</h1>

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

@foreach ($tasks as $task)
    <form action="/tasks" method="post">
        @csrf
        <!-- // リンク先をidで取得し名前で出力 -->
        <p><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></p>
    </form>

    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        {{-- confirmでYESかNOかみたいなのが出る。 --}}
        {{-- OKだった場合false（とばない？いいえ！）、NOだった場合True（とばない？はい！） --}}
        <a type="submit" onclick="if(!confirm('削除しますか？')){return false};"><button>削除する</button></a>
    </form>
@endforeach

<hr>

<h1>新規タスク投稿</h1>

<form action="/tasks" method="post">
    {{-- @csrfこれがないとうまくデータの保存ができない --}}
    @csrf
    {{-- {{ old('title') }}を書くことで、エラーが起きたときに、書いた値が表示される。 --}}
    <p>
        タイトル<br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>
    <p>
        内容<br>
        <textarea  type="text" name="body">{{ old('body') }}</textarea>
    </p>
    <input type="submit" value="Create Task">
</form>



