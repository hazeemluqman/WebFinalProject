@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Milestone Details</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5><strong>Milestone Name:</strong> {{ $milestone->milestone_name }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Grant Title:</strong> {{ $milestone->grant->title ?? 'N/A' }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Target Completion Date:</strong>
                    {{ \Carbon\Carbon::parse($milestone->target_completion_date)->format('d M Y') }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Status:</strong> {{ $milestone->status ?? 'Pending' }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Deliverable:</strong> {{ $milestone->deliverable ?? 'None' }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Remarks:</strong> {{ $milestone->remarks ?? 'No remarks' }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Date Updated:</strong>
                    {{ $milestone->date_updated ? \Carbon\Carbon::parse($milestone->date_updated)->format('d M Y') : 'Not updated' }}
                </h5>
            </div>
            <div class="mb-3">
                <h5><strong>Completed Date:</strong>
                    {{ $milestone->completed_date ? \Carbon\Carbon::parse($milestone->completed_date)->format('d M Y') : 'Not completed' }}
                </h5>
            </div>
        </div>



        <div class="card-footer">
            <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Back to Milestones List</a>
            <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning">Edit Milestone</a>
            <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this milestone?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection