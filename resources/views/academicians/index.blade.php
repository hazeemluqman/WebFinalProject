@extends('layouts.master')

@section('content')
<div class="container mt-5 pt-5">
    <a href="/home">Back</a>
    <h1>Academician List</h1>
    @canany(['isAdmin', 'isAcademician'], App\Models\Grant::class)
    <a href="{{ route('academicians.create') }}" class="btn btn-primary mb-3 mt-3">Add Academician</a>
    @endcanany
    @if ($academicians->isEmpty())
    <p>No academicians found.</p>
    @else
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Staff Number</th>
                <th>Email</th>
                <th>College</th>
                <th>Department</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($academicians as $academician)
            <tr>
                <td>{{ $academician->id }}</td>
                <td>{{ $academician->name }}</td>
                <td>{{ $academician->staff_number }}</td>
                <td>{{ $academician->email  }}</td>
                <td>{{ $academician->college }}</td>
                <td>{{ $academician->department }}</td>
                <td>{{ $academician->position }}</td>
                <td>
                    <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-info">Show</a>
                    @canany(['isAdmin', 'isAcademician'], App\Models\Grant::class)
                    <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('academicians.destroy', $academician) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-md"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endcanany
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection