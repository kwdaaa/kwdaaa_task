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

<!--更新先はarticlesのidにしないと増える php artisan rote:listで確認①-->
<form action="/articles/{{ $article->id }}" method="post">
    @csrf
    <!-- resourceの場合PUTを指定してあげないとエラーが起きる php artisan rote:listで確認② -->
    @method('PUT')
    <!-- idはそのまま -->
    <input type="hidden" name="id" value="{{ $article->id }}">
    
    <p>
        タイトル<br>
        <input type="text" name="title" value="{{ $article->title }}">
    </p>
    <p>
        内容<br>
        <textarea  type="text" name="body">{{ $article->body }}</textarea>
    </p>

    <input type="submit" value="更新">
</form>