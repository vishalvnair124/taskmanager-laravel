@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="form-wrapper">
    <h1 class="page-title">Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Save</button>
    </form>
</div>
@endsection