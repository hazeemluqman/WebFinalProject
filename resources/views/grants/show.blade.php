@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Grant Details</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5><strong>Title:</strong> {{ $grant->title }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Grant Amount: RM</strong> {{ $grant->grant_amount }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Grant Provider:</strong> {{ $grant->grant_provider }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Start Date:</strong> {{ $grant->start_date }}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Duration (Months):</strong> {{ $grant->duration_months }}</h5>
            </div>

            <!-- Displaying Grant Members -->
            <div class="mt-4">
                <h5><strong>Grant Members:</strong></h5>
                @if($grant->academicians->isEmpty())
                <p>No members found for this grant.</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grant->academicians as $academician)
                        <tr>
                            <td>{{ $academician->name }}</td>
                            <td>{{ $academician->email }}</td>
                            <td>{{ $academician->pivot->role }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Displaying Grant Milestones -->
            <div class="mt-4">
                <h5><strong>Milestones:</strong></h5>
                @if($grant->milestones->isEmpty())
                <p>No milestones found for this grant.</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Target Completion Date</th>
                            <th>Deliverables</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Updated On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grant->milestones as $milestone)
                        <tr>
                            <td>{{ $milestone->milestone_name }}</td>
                            <td>{{ $milestone->target_completion_date }}</td>
                            <td>{{ $milestone->deliverable }}</td>
                            <td>{{ $milestone->status }}</td>
                            <td>{{ $milestone->remarks }}</td>
                            <td>{{ $milestone->date_updated }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <!-- Action Buttons -->
            <a href="{{ route('grants.index') }}" class="btn btn-secondary">Back to Grants List</a>
            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this grant?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection