<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .card {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .card h3 {
            margin-bottom: 20px;
        }
        .card .btn {
            width: 100%;
        }
        .card .form-group {
            margin-bottom: 15px;
        }
        .card .alert {
            margin-bottom: 15px;
        }
        .text-center a {
            text-decoration: none;
            color: #007bff;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h3 class="text-center">Email Verification</h3>
    <p class="text-muted text-center">Please enter the verification code sent to your email.</p>

    <!-- Success and Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Verification Form -->
    <form action="{{ route('verify.code') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Verification Code</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Enter code" required>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Verify Code</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
