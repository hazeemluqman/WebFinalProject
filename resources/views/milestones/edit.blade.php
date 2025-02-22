@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Milestone</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="milestone_name" class="form-label">Milestone Name</label>
            <input type="text" id="milestone_name" name="milestone_name" class="form-control"
                value="{{ old('milestone_name', $milestone->milestone_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="target_completion_date" class="form-label">Target Completion Date</label>
            <input type="date" id="target_completion_date" name="target_completion_date" class="form-control"
                value="{{ old('target_completion_date', $milestone->target_completion_date) }}" required>
        </div>


        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="">Select Status</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deliverable" class="form-label">Deliverable</label>
            <input type="text" id="deliverable" name="deliverable" class="form-control"
                value="{{ old('deliverable', $milestone->deliverable) }}">
        </div>

        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks"
                class="form-control">{{ old('remarks', $milestone->remarks) }}</textarea>
        </div>

        <!-- Add Grant Edit Field -->
        <div class="mb-3">
            <label for="grant_id" class="form-label">Select Grant</label>
            <select id="grant_id" name="grant_id" class="form-control" required>
                <option value="">Select a Grant</option>
                @foreach($grants as $grant)
                <option value="{{ $grant->id }}"
                    {{ old('grant_id', $milestone->grant_id) == $grant->id ? 'selected' : '' }}>
                    {{ $grant->title }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Add Date Updated field -->
        <div class="mb-3">
            <label for="date_updated" class="form-label">Date Updated</label>
            <input type="date" id="date_updated" name="date_updated" class="form-control"
                value="{{ old('date_updated', \Carbon\Carbon::parse($milestone->date_updated)->toDateString()) }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Update Milestone</button>
        <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection