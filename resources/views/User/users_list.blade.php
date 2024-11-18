<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-4">
    <!-- Header with Add User Button and Search Form -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Users List</h1>
        <a href="{{ route('addUserLink') }}" class="btn btn-success">Add User</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('userSearch') }}" method="POST" class="mb-4">
        @csrf <!-- Add CSRF token -->
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search users..." aria-label="Search users" required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <!-- Users Table -->
    @if (count($users) > 0)
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
</div>
</body>
</html>

