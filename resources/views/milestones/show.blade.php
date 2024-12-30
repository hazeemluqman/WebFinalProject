@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Milestone Details</h1>

    <div class="card">
        <div class="card-header">
            Milestone: {{ $milestone->milestone_name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $milestone->id }}</p>
            <p><strong>Grant Title:</strong> {{ $milestone->milestone_name ?? 'N/A' }}</p>
            <p><strong>Target Completion Date:</strong> {{ $milestone->target_completion_date }}</p>
            <p><strong>Status:</strong> {{ $milestone->status ?? 'Pending' }}</p>
            <p><strong>Deliverable:</strong> {{ $milestone->deliverable ?? 'None' }}</p>
            <p><strong>Remarks:</strong> {{ $milestone->remarks ?? 'No remarks' }}</p>
            <p><strong>Date Updated:</strong> {{ $milestone->date_updated ?? 'Not updated' }}</p>
            <p><strong>Completed Date:</strong> {{ $milestone->completed_date ?? 'Not completed' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit Milestone</a>
        </div>
    </div>
</div>
@endsection