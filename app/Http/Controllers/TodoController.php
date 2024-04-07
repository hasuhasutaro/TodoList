<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::paginate(20);
        $data = [
            'todos' => $todos,
        ];

        // dd($data);
        return view('todos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todo = new Todo();
        $data = [
            'todo' => $todo,
        ];
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'content' => 'required',
        ]);

        $todo = new Todo();
        $todo -> state = 0;
        $todo -> content = $validated["content"];
        $todo -> save();

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Todo $todo)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $data = [
            'todo' => $todo,
        ];
        return view('todos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validated = $request -> validate([
            'state' => 'required',
        ]);

        $todo -> state = $validated['state'];

        if ($todo -> state == 0) {
            $todo -> started_at = null;
            $todo -> completed_at = null;
        } else if ($todo -> state == 1) {
            $todo -> started_at = Carbon::now();
            $todo -> completed_at = null;
        } else {
            $todo -> completed_at = Carbon::now();
        }
        $todo -> save();

        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo -> delete();
        return redirect(route('todos.index'));
    }
}
