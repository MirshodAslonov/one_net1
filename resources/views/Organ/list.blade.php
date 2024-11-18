<!-- resources/views/branch/list.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organs List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .btn-add {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<h1>Organs List</h1>

<!-- Button to go to the Add Branch page -->
<a href="{{ route('addOrganPage') }}" class="btn-add">Add New Organ</a>


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
@if ($list->isEmpty())
    <p>No organs available.</p>
@else
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $organ)
            <tr>
                <td>{{ $organ->id }}</td>
                <td>{{ $organ->name }}</td>
                <td>
                    <!-- Update Button -->
                    <a href="{{ route('getOrgan', $organ->id) }}" class="button">Update</a>

                    <!-- Delete Button (form submission for POST request) -->
                    <form action="{{ route('deleteOrgan', $organ->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this organ?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
