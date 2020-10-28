<h1>タスク詳細</h1>

    <p> 
        【タイトル】<br>{{ $task->title }}
    </p>

    <p>
        【内容】<br>{{ $task->body }}
    </p>

    {{-- http://localhost/tasksへ --}}
    <a href="/tasks"><button>一覧へ戻る</button></a>
    
    {{-- http://localhost/{id}へ --}}
    <a href="/tasks/{{ $task->id }}/edit"><button>編集する</button></a>

    
    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        {{-- confirmでYESかNOかみたいなのが出る。 --}}
        {{-- OKだった場合false（とばない？いいえ！）、NOだった場合True（とばない？はい！） --}}
        <a type="submit" onclick="if(!confirm('削除しますか？')){return false};"><button>削除する</button></a>
    </form>