<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input[type="text"], form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #218838;
        }

        .btn-list {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
        }
        .btn-list:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Edit Organ</h1>

@if (session('success'))
    <div id="successMessage" style="background-color: #28a745; color: white; padding: 10px; margin-bottom: 20px; text-align: center; border-radius: 4px;">
        {{ session('success') }}
    </div>

    <script>
        // Hide the success message after 3 seconds
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 1600);
    </script>
@endif

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('updateOrgan', $organ->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Organ Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $organ->name) }}" required>

    <button type="submit">Update Organ</button>
</form>

<!-- Button to show branch list -->
<a href="{{ route('listOrgan') }}">
    <button class="btn-list">Show Organ List</button>
</a>

</body>
</html>
