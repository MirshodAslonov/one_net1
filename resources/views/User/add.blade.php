<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            height: 100vh;
            /*display: flex;*/
            flex-direction: column;
            justify-content: flex-start;
        }

        /* Navbar Styling */
        .navbar {
            width: 100%;
            background-color: #2f266d;
            padding: 10px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .navbar ul {
            display: flex;
            list-style: none;
        }

        .navbar ul li {
            margin: 0 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
        }

        /* Toggle Switch Styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin-bottom: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Content Styling */
        .content {
            max-width: 800px;
            margin: 200px auto 0; /* Account for fixed navbar */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #632d00;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="datetime-local"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="password"]:focus,
        form input[type="datetime-local"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #218838;
        }

        /* Success Message Styling */
        .success-message {
            background-color: #28a745;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 4px;
            font-weight: bold;
        }

        /* Error Message Styling */
        .error-message {
            color: red;
            margin-bottom: 20px;
        }

        .error-message ul {
            list-style-type: none;
            padding: 0;
        }

        .error-message li {
            margin-bottom: 10px;
        }

        .btn-list {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-list:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <h1>One Net</h1>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('listBranch') }}">Branches</a></li>
        <li><a href="{{ route('listOrgan') }}">Organization</a></li>
        <li><a href="{{ route('listUser') }}">Users</a></li>
        <li><a href="{{ route('listClient') }}">Client</a></li>
        <li><a href="{{ route('listProblemClient') }}">Problems</a></li>
        <li><a href="{{ route('logout') }}">Log Out</a></li>
    </ul>
</div>

<!-- Content Section -->
<div class="content">
    <h1>Add New User</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.success-message').style.display = 'none';
            }, 3000);
        </script>
    @endif

<!-- Error Messages -->
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<!-- Add User Form -->
    <form action="{{ route('addUser') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter user name" value="{{ old('name') }}" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>

        <label for="password">Admin</label>
        <label for="is_admin" class="switch">
            <input type="checkbox" id="is_admin" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>

        <button type="submit">Add User</button>
    </form>

</div>

</body>
</html>
