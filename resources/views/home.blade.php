@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Research Grant Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iRMC Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/academicians">Academicians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/grants">Grants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/milestones">Milestones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to the Research Grant Management Dashboard</h1>

        <div class="row justify-content-center">
            @can('isAdmin' , App\Models\Grant::class)
            <!-- Card for Academicians -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Academicians</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Academicians</h5>
                        <p class="card-text">View and manage all academicians in the system.</p>
                        <a href="/academicians" class="btn btn-light">View Academicians</a>
                    </div>
                </div>
            </div>
            @endcan

            @canany(['isAdmin', 'isStaff'], App\Models\Grant::class)
            <!-- Card for Grants -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Grants</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Grants</h5>
                        <p class="card-text">View and manage all research grants.</p>

                        <a href="/grants" class="btn btn-light">View Grants</a>

                    </div>
                </div>
            </div>
            @endcanany

            @canany(['isAdmin', 'isAcademician'], App\Models\Grant::class)
            <!-- Card for Milestones -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Milestones</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Milestones</h5>
                        <p class="card-text">Track and update project milestones.</p>
                        <a href="/milestones" class="btn btn-light">View Milestones</a>
                    </div>
                </div>
            </div>
        </div>
        @endcanany

        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-muted mt-4">© 2024 UNITEN Innovation and Research Management Center</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection