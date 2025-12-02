@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<div class="mb-3">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Add Task
    </a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row">
    @forelse ($tasks as $task)
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-2">
                    {{ $task->title }}
                </h5>

                <p class="text-muted">
                    {{ $task->description ?: 'No description' }}
                </p>

                <p class="small text-secondary">
                    Due: {{ $task->due_date ?: 'No due date' }}
                </p>

                <p class="small">
                    Status:
                    @if($task->is_completed)
                    <span class="badge bg-success">Completed</span>
                    @else
                    <span class="badge bg-warning">Pending</span>
                    @endif
                </p>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete task?')">
                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
    @empty
    <p>No tasks yet</p>
    @endforelse
</div>
@endsection