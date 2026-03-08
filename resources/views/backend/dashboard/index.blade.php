@extends('backend.dashboard.layouts.layout')
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mb-4">Welcome to Your Dashboard</h1>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="mb-4 d-flex gap-3">
            <!-- Create Registration Link -->
            <a href="{{ route('create.registration.token') }}" class="btn btn-link">
                Create Registration Link
            </a>
        </div>

        <!-- Dashboard Cards -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage registered users.</p>
                        <a href="#" class="btn btn-primary">View Users</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">Check system reports and analytics.</p>
                        <a href="#" class="btn btn-primary">View Reports</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Settings</h5>
                        <p class="card-text">Update system preferences.</p>
                        <a href="#" class="btn btn-primary">Go to Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
