@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Milestone</h1>

    <form action="{{ route('milestones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="milestone_name" class="form-label">Milestone Name</label>
            <input type="text" id="milestone_name" name="milestone_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="grant_id" class="form-label">Select Grant</label>
            <select id="grant_id" name="grant_id" class="form-control" required>
                <option value="">Select a Grant</option>
                @foreach($grants as $grant)
                <option value="{{ $grant->id }}">{{ $grant->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="target_completion_date" class="form-label">Target Completion Date</label>
            <input type="date" id="target_completion_date" name="target_completion_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deliverable" class="form-label">Deliverable</label>
            <input type="text" id="deliverable" name="deliverable" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Milestone</button>
        <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection