<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organs List</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            /*display: flex;*/
            /*justify-content: center;*/
            /*align-items: center;*/
            /*height: 100vh;*/
            color: #333;
            overflow-x: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        /*@keyframes fadeIn {*/
        /*    from {*/
        /*        opacity: 0;*/
        /*        transform: translateY(20px);*/
        /*    }*/
        /*    to {*/
        /*        opacity: 1;*/
        /*        transform: translateY(0);*/
        /*    }*/
        /*}*/

        /* Navbar Styles */
        .navbar {
            width: 100%;
            background-color: #2f266d;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            height: 60px;

        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
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
            padding: 5px 15px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
        }


        .container {
            background: #534ee2;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 5px 5px;
            width: 97%;
            margin: 0 auto;
            /*margin-top: 5px;*/
            margin-top: 80px;
            animation: slideUp 0.8s ease-in-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .btn-add {
            display: inline-block;
            background-color: #006b93;
            color: white;
            padding: 20px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            /*margin-bottom: 20px;*/
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-add:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 20px;
            text-align: center;
            font-weight: bold;
        }

        table th {
            background-color: #0055b1;
            color: white;
            font-weight: bold;
        }
        .th_padding th {
            padding-bottom: 0px;
        }
        .th_padding td {
            padding: 0;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e6f7ff;
        }
        .btn-update {
            background-color: #352a78;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-delete {
            background-color: #66000b;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-update:hover {
            background-color: #352a78;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<div class="navbar">
    <h1>One Net</h1>
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('listBranch') }}">Branches</a></li>
        <li><a href="{{ route('listOrgan') }}">Organization</a></li>
        <li><a href="{{ route('listUser') }}">User</a></li>
        <li><a href="{{ route('listClient') }}">Client</a></li>
        <li><a href="{{ route('logout') }}">Log Out</a></li>

    </ul>
</div>

<div class="container">
    <div class="header-row">
        <h1>Organs List</h1>
        <a href="{{ route('addOrganPage') }}" class="btn-add">Add New Organ</a>
    </div>

    @if (session('success'))
        <div id="successMessage" class="success-message">
            {{ session('success') }}
        </div>

        <script>
            // Hide the success message after 3 seconds
            setTimeout(function () {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        </script>
    @endif

    @if ($list->isEmpty())
        <p style="color: #555; font-size: 1.2rem; margin-top: 20px;">No organs available.</p>
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
                        <a href="{{ route('getOrgan', $organ->id) }}" class="btn-update">Update</a>

                        <!-- Delete Button -->
                        <form action="{{ route('deleteOrgan', $organ->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this organ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    function toggleMenu() {
        const menu = document.querySelector('.navbar ul');
        menu.classList.toggle('show');
    }
</script>
</body>
</html>

