@extends('layouts.app')
@section('content')
<form action="{{ route('todos.store') }}" method="post">
    @csrf
    <fieldset>
        <legend>Todoを追加</legend>
        <input type="text" name="content" required>
    </fieldset>
    <button type="submit">追加する</button>
    <a href="{{ route('todos.index') }}">キャンセル</a>
</form>
@endsection