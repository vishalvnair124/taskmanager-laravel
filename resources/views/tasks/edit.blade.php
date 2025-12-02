@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="form-wrapper">
    <h1 class="page-title">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-check">
                <input type="checkbox" name="is_completed" class="form-check-input"
                    {{ $task->is_completed ? 'checked' : '' }}>
                Mark as completed
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection