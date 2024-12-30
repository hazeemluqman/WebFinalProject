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
                <h5><strong>Start Date:</strong> {{ ($grant->start_date)}}</h5>
            </div>
            <div class="mb-3">
                <h5><strong>Duration (Months):</strong> {{ $grant->duration_months }}</h5>
            </div>

            <!-- If you want to display the project leader or other details, you can do so here -->

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