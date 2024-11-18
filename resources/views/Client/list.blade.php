<!-- resources/views/branch/list.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
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
<h1>Client List</h1>

<!-- Button to go to the Add Branch page -->
<a href="{{ route('addClientPage') }}" class="btn-add">Add New Client</a>

@if ($list->isEmpty())
    <p>No branches available.</p>
@else
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mgmt IP</th>
            <th>VLAN</th>
            <th>IP</th>
            <th>Port</th>
            <th>Zayafka</th>
            <th>Client Number</th>
            <th>Client Name</th>
            <th>Speed</th>
            <th>Date Connect</th>
            <th>STP Zayafka</th>
            <th>VLAN IP</th>
            <th>ATC</th>
            <th>Location</th>
            <th>Branch ID</th>
            <th>Organ ID</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name_organ }}</td>
                <td>{{ $client->mgmt_ip }}</td>
                <td>{{ $client->vlan }}</td>
                <td>{{ $client->ip }}</td>
                <td>{{ $client->port }}</td>
                <td>{{ $client->zayafka }}</td>
                <td>{{ $client->client_number }}</td>
                <td>{{ $client->client_name }}</td>
                <td>{{ $client->speed }}</td>
                <td>{{ $client->date_connect }}</td>
                <td>{{ $client->stp_zayafka }}</td>
                <td>{{ $client->vlan_ip }}</td>
                <td>{{ $client->atc }}</td>
                <td>{{ $client->location }}</td>
                <td>{{ $client->branch_id }}</td>
                <td>{{ $client->organ_id }}</td>
                <td>{{ $client->created_at }}</td>
                <td>{{ $client->updated_at }}</td>
                <td>
                    <!-- Update Button -->
                    <a href="{{ route('getClient', $client->id) }}" class="button">Update</a>

                    <!-- Delete Button (form submission for POST request) -->
                    <form action="{{ route('deleteClient', $client->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this client?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
