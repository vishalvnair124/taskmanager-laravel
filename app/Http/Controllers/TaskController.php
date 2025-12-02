<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display all tasks of logged-in user.
     */
    public function index()
    {
        $tasks = Auth::user()
            ->tasks()
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a new task.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date'    => ['nullable', 'date'],
        ]);

        Auth::user()->tasks()->create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update an existing task.
     */
    public function update(Request $request, $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date'    => ['nullable', 'date'],
            'is_completed' => ['nullable']
        ]);

        $validated['is_completed'] = $request->has('is_completed');

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    /**
     * Delete a task.
     */
    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
