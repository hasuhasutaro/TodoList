@extends('layouts.app')
@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th>タスク</th><th>状態</th><th>着手/達成日</th><th>着手から達成までの時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td><a href="{{ route('todos.edit', $todo) }}">{{ $todo -> content }}</a></td>

                @if ($todo -> state == 0)
                    <td>未着手</td>
                @elseif($todo -> state == 1)
                    <td>着手</td>
                    <td>{{ Carbon\Carbon::parse($todo -> started_at) -> format('Y年m月d日 H:i:s')}}</td>
                @else
                    <td>達成</td>
                    <td>{{ Carbon\Carbon::parse($todo -> completed_at) -> format('Y年m月d日 H:i:s')}}</td>
                    <td>{{ Carbon\Carbon::parse($todo->completed_at)->diff(Carbon\Carbon::parse($todo->started_at))->format('%Y年%m月%d日 %H:%I:%S') }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div>
    <a href="{{ route('todos.create') }}">タスクを追加</a>
</div>
@endsection