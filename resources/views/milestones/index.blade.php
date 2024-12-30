@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home">Back</a>
    <h1>Milestone List</h1>
    <a href="{{ route('milestones.create') }}" class="btn btn-primary mb-3">Add Milestone</a>

    @if ($milestones->isEmpty())
    <p>No milestones found.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Grant Name</th>
                <th>Milestone Name</th>
                <th>Target Completion Date</th>
                <th>Status</th>
                <th>Deliverable</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
            <tr>
                <td>{{ $milestone->id }}</td>
                <td>
                    @if($milestone->grant)
                    {{ $milestone->grant->title }}
                    @else
                    <span class="text-muted">No Grant Assigned</span>
                    @endif
                </td>

                <td>{{ $milestone->milestone_name }}</td>
                <td>{{ $milestone->target_completion_date }}</td>
                <td>
                    @switch($milestone->status)
                    @case('Pending')
                    <span class="badge bg-warning">Pending</span>
                    @break
                    @case('In Progress')
                    <span class="badge bg-info">In Progress</span>
                    @break
                    @case('Completed')
                    <span class="badge bg-success">Completed</span>
                    @break
                    @default
                    <span class="badge bg-secondary">Unknown</span>
                    @endswitch
                </td>
                <td>{{ $milestone->deliverable }}</td>
                <td>{{ $milestone->remarks ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('milestones.destroy', $milestone) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-md"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @endif
</div>

@endsection