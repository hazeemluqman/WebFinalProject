@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Add New Grant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('grants.store') }}" method="POST">
                @csrf

                <!-- Title Field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Grant Amount Field -->
                <div class="mb-3">
                    <label for="grant_amount" class="form-label">Grant Amount</label>
                    <input type="number" id="grant_amount" name="grant_amount" class="form-control"
                        value="{{ old('grant_amount') }}" step="0.01" required>
                    @error('grant_amount')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Grant Provider Field -->
                <div class="mb-3">
                    <label for="grant_provider" class="form-label">Grant Provider</label>
                    <input type="text" id="grant_provider" name="grant_provider" class="form-control"
                        value="{{ old('grant_provider') }}" required>
                    @error('grant_provider')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Start Date Field -->
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control"
                        value="{{ old('start_date') }}" required>
                    @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Duration (Months) Field -->
                <div class="mb-3">
                    <label for="duration_months" class="form-label">Duration (Months)</label>
                    <input type="number" id="duration_months" name="duration_months" class="form-control"
                        value="{{ old('duration_months') }}" required>
                    @error('duration_months')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Project Leader Field -->
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
                    @error('project_leader_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Project Members Field -->
                <div class="form-group">
                    <label for="members">Project Members</label>
                    <div id="members">
                        @foreach($academicians as $academician)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="members[]"
                                value="{{ $academician->id }}" id="member{{ $academician->id }}">
                            <label class="form-check-label" for="member{{ $academician->id }}">
                                {{ $academician->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>



                <!-- Submit and Cancel Buttons -->
                <button type="submit" class="btn btn-success">Add Grant</button>
                <a href="{{ route('grants.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection