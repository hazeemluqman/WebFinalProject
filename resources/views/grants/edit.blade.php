@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Edit Grant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('grants.update', $grant->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control"
                        value="{{ old('title', $grant->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="grant_amount" class="form-label">Grant Amount</label>
                    <input type="number" id="grant_amount" name="grant_amount" class="form-control"
                        value="{{ old('grant_amount', $grant->grant_amount) }}" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="grant_provider" class="form-label">Grant Provider</label>
                    <input type="text" id="grant_provider" name="grant_provider" class="form-control"
                        value="{{ old('grant_provider', $grant->grant_provider) }}" required>
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control"
                        value="{{ old('start_date', $grant->start_date) }}" required>
                </div>

                <div class="mb-3">
                    <label for="duration_months" class="form-label">Duration (Months)</label>
                    <input type="number" id="duration_months" name="duration_months" class="form-control"
                        value="{{ old('duration_months', $grant->duration_months) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control"
                        required>{{ old('description', $grant->description) }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="project_leader_id" class="form-label">Project Leader</label>
                    <select name="project_leader_id" id="project_leader_id" class="form-control" required>
                        <option value="">Select Project Leader</option>
                        @foreach ($academicians as $academician)
                        <option value="{{ $academician->id }}"
                            {{ old('project_leader_id') == $academician->id ? 'selected' : '' }}>
                            {{ $academician->name }} - {{ $academician->staff_number }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('grants.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection