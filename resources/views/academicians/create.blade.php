@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Create New Academician</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('academicians.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="staff_number" class="form-label">Staff Number</label>
                    <input type="text" id="staff_number" name="staff_number" class="form-control"
                        value="{{ old('staff_number') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="college" class="form-label">College</label>
                    <input type="text" id="college" name="college" class="form-control" value="{{ old('college') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" id="department" name="department" class="form-control"
                        value="{{ old('department') }}" required>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" id="position" name="position" class="form-control" value="{{ old('position') }}"
                        required>
                </div>

                <button type="submit" class="btn btn-success">Create Academician</button>
                <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection