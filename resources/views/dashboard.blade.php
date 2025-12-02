@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row g-3">

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="text-muted">Total Tasks</h6>
            <h3>{{ $total }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="text-muted">Completed</h6>
            <h3 class="text-success">{{ $completed }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="text-muted">Pending</h6>
            <h3 class="text-warning">{{ $pending }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="text-muted">Overdue</h6>
            <h3 class="text-danger">{{ $overdue }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="text-muted">Due Today</h6>
            <h3>{{ $today }}</h3>
        </div>
    </div>

</div>

<div class="mt-4">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Create Task
    </a>
</div>

@endsection
