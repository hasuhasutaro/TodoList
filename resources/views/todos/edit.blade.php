@extends('layouts.app')
@section('content')
<form action="{{ route('todos.update', $todo) }}" method="post">
    @csrf
    @method('patch')
    <fieldset>
        <legend>Todoを編集</legend>
        <input name="content" type="text" required value="{{ old('content', $todo -> content ?? '') }}">

        <select name="state">
            <option value="0" @if($todo -> state == 0) selected @endif>未着手</option>
            <option value="1" @if($todo -> state == 1) selected @endif>着手</option>
            <option value="2" @if($todo -> state == 2) selected @endif>達成</option> 
        </select>
    </fieldset>
    <button type="submit">変更する</button>
</form>
<form action="{{ route('todos.destroy', $todo) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">削除する</button>
</form>
@endsection