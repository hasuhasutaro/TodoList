@extends('layouts.app')
@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th>タスク</th><th>状態</th>
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
                @else
                <td>達成</td>
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