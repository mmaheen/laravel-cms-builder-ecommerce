<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card wrapper for nice UI -->
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('register', ['token' => $record->token]) }}" method="POST">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>

                            <!-- Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already have an account? <a href="{{ route('login') }}">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
