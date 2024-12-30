@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Academician Details</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->name }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Staff Number:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->staff_number }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Email:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->email }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>College:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->college }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Department:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->department }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Position:</strong>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $academician->position }}</p>
                </div>
            </div>

            <a href="{{ route('academicians.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection