@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Academician</h1>

    <form action="{{ route('academicians.update', $academician) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $academician->name) }}"
                required>
        </div>

        <!-- Staff Number Field -->
        <div class="mb-3">
            <label for="staff_number" class="form-label">Staff Number</label>
            <input type="text" id="staff_number" name="staff_number" class="form-control"
                value="{{ old('staff_number', $academician->staff_number) }}" required>
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                value="{{ old('email', $academician->email) }}" required>
        </div>

        <!-- College Field -->
        <div class="mb-3">
            <label for="college" class="form-label">College</label>
            <input type="text" id="college" name="college" class="form-control"
                value="{{ old('college', $academician->college) }}" required>
        </div>

        <!-- Department Field -->
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" id="department" name="department" class="form-control"
                value="{{ old('department', $academician->department) }}" required>
        </div>

        <!-- Position Field -->
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" id="position" name="position" class="form-control"
                value="{{ old('position', $academician->position) }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>

        <!-- Cancel Button -->
        <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection