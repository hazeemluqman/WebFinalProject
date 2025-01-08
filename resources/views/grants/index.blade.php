@extends('layouts.master')

@section('content')
<div class="container mt-5 pt-5">
    <a href="/home">Back</a>
    <h1>Grant List</h1>
    @canany(['isAdmin', 'isStaff', 'isAcademician'], App\Models\Grant::class)
    <a href="{{ route('grants.create') }}" class="btn btn-primary mb-3 mt-3">Add Grant</a>
    @endcanany
    @if ($grants->isEmpty())
    <p>No grants found.</p>
    @else
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Grant Amount</th>
                <th>Grant Provider</th>
                <th>Start Date</th>
                <th>Duration (Months)</th>
                <th>Description</th>
                <th>Project Leader</th>
                <th>Members</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grants as $grant)
            <tr>
                <td>{{ $grant->id }}</td>
                <td>{{ $grant->title }}</td>
                <td>{{ $grant->grant_amount }}</td>
                <td>{{ $grant->grant_provider }}</td>
                <td>{{ $grant->start_date }}</td>
                <td>{{ $grant->duration_months }}</td>
                <td>{{ $grant->description }}</td>
                <td>{{ $grant->leader()->name }}</td>
                <td>
                    <ul>
                        @foreach($grant->academicians as $academician)
                        @if($academician->pivot->role == 'Member')
                        <li>{{ $academician->name }}</li>
                        @endif
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-primary">Edit</a>
                    @can('isAdmin', App\Models\Grant::class)
                    <form action="{{ route('grants.destroy', $grant) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-md"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection