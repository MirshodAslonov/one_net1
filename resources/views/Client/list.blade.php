<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
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

        .btn-update:hover {
            background-color: #352a78;
        }

        .filter-input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-select {
            width: 20%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .filter-input:focus {
            border-color: #0055b1;
            outline: none;
            box-shadow: 0 4px 8px rgba(0, 85, 177, 0.2);
        }

        .filter-input::placeholder {
            color: #aaa;
            font-style: italic;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
        }
        .table-container {
            /*max-height: 768px;*/
            overflow-y: auto;
            /*border: 1px solid #ccc; !* Optional: Add border for a better appearance *!*/
            border-radius: 17px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        /* General Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2f266d;
            color: white;
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .navbar ul {
            display: flex;
            list-style: none;
        }

        .navbar ul li {
            margin: 0 10px;
            position: relative;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #0056b3;
        }

        /* User Profile Avatar */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #ddd;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Dropdown Menu */
        .user-profile .dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            min-width: 150px;
            padding: 10px;
            text-align: center;
            z-index: 1001;
        }

        .user-profile .dropdown p {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .user-profile .dropdown a {
            text-decoration: none;
            color: #4a90e2;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 20px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .user-profile .dropdown a:hover {
            background-color: #f0f4f8;
        }

        /* Show Dropdown when Active */
        .user-profile.active .dropdown {
            display: block;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <h1>One Net</h1>
    <ul>
        <li><a href="/">Home</a></li>
        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
            <li><a href="{{ route('listBranch') }}">Branches</a></li>
            <li><a href="{{ route('listOrgan') }}">Organization</a></li>
            <li><a href="{{ route('listUser') }}">User</a></li>
        @endif
        <li><a href="{{ route('listClient') }}">Client</a></li>
        <li class="user-profile">
            <div class="avatar" onclick="toggleDropdown()">
                <img src="http://one_net1.loc/storage/avataaars.svg" alt="User Avatar">
            </div>
            <div class="dropdown">
                <p>{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                <a href="{{ route('logout') }}">Log Out</a>
            </div>
        </li>
    </ul>
</div>


<div class="container">
    <div class="header-row">
        <h1>Clients List</h1>
        <!-- Branch -->

        <select id="branch_id" name="branch_id" class="form-select" data-live-search="true">
            <option value="" selected>Choose a branch</option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
        <!-- Organization -->

            <select id="organ_id" name="organ_id" class="form-select" >
                <option value="" selected >Choose an organization</option>
                @foreach ($organs as $organ)
                    <option value="{{ $organ->id }}">{{ $organ->name }}</option>
                @endforeach
            </select>
        <a href="{{ route('exelDownload') }}" id="downloadExcelBtn" class="btn-add">Download Excel</a>
        <a href="{{ route('addClientPage') }}" class="btn-add">Add New Client</a>
    </div>

    @if (session('success'))
        <div id="successMessage" class="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        </script>
    @endif

    @if ($list->isEmpty())
        <p style="color: #555; font-size: 1.2rem; margin-top: 20px;">No clients available.</p>
    @else
        <div class="table-container">
            <table>
                <thead >
                <tr class="th_padding" >
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mgmt IP</th>
                    <th>IP</th>
                    <th>VLAN</th>
                    <th>Zayafka</th>
                    <th>ATC</th>
                    <th>Client Name</th>
                    <th>Client Number</th>
                    <th>Actions</th>
                </tr>
                <tr class="th_padding" >
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(0)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(1)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search  " onkeyup="filterTable(2)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(3)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(4)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(5)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search " onkeyup="filterTable(6)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search  " onkeyup="filterTable(7)" class="filter-input"></th>
                    <th><input type="text" placeholder="Search  " onkeyup="filterTable(8)" class="filter-input"></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($list as $client)
                    <tr data-branch-id="{{ $client->branch_id }}" data-organ-id="{{ $client->organ_id }}">
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name_organ }}</td>
                        <td>{{ $client->mgmt_ip }}</td>
                        <td>{{ $client->ip }}</td>
                        <td>{{ $client->vlan }}</td>
                        <td>{{ $client->zayafka }}</td>
                        <td>{{ $client->atc }}</td>
                        <td>{{ $client->client_name }}</td>
                        <td>{{ $client->client_number }}</td>
                        <td>
                            <a href="{{ route('getClient', $client->id) }}" class="btn-update">Edit</a>
                            <form action="{{ route('deleteClient', $client->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('POST')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filters = document.querySelectorAll(".filter-input");
        const branchFilter = document.getElementById("branch_id");
        const organFilter = document.getElementById("organ_id");
        const downloadExcelBtn = document.getElementById("downloadExcelBtn");

        function filterTable() {
            const rows = document.querySelectorAll("tbody tr");

            // Get filter values
            const filterValues = Array.from(filters).map(filter => filter.value.toUpperCase());
            const branchValue = branchFilter.value || "";
            const organValue = organFilter.value || "";

            rows.forEach(row => {
                const cells = row.getElementsByTagName("td");

                // Check text filters
                const matchesTextFilters = Array.from(filters).every((filter, index) => {
                    if (filter.value.trim() === "") return true; // Skip empty filters
                    const cell = cells[index];
                    const cellText = cell ? (cell.textContent || cell.innerText).toUpperCase() : "";
                    return cellText.indexOf(filterValues[index]) > -1;
                });

                // Check branch and organ filters
                const branchId = row.getAttribute("data-branch-id");
                const organId = row.getAttribute("data-organ-id");

                const matchesBranch = branchValue === "" || branchValue === branchId;
                const matchesOrgan = organValue === "" || organValue === organId;

                // Show or hide row based on all filters
                row.style.display = matchesTextFilters && matchesBranch && matchesOrgan ? "" : "none";
            });
        }

        // Update the download button to include filtered client IDs or all IDs if no filter is applied
        function updateDownloadLink() {
            const rows = document.querySelectorAll("tbody tr");
            const visibleRows = Array.from(rows).filter(row => {
                return row.style.display !== "none";
            });

            let clientIds;

            if (visibleRows.length === rows.length || visibleRows.length === 0) {
                // No filters applied or all rows are visible: Include all client IDs
                clientIds = Array.from(rows).map(row => row.querySelector("td:first-child").innerText);
            } else {
                // Some filters applied: Include only visible client IDs
                clientIds = visibleRows.map(row => row.querySelector("td:first-child").innerText);
            }

            // Append client IDs as a query parameter
            const baseUrl = "{{ route('exelDownload') }}";
            const urlWithParams = `${baseUrl}?client_ids=${encodeURIComponent(clientIds.join(','))}`;
            downloadExcelBtn.setAttribute("href", urlWithParams);
        }

        // Add event listeners to filters
        filters.forEach(filter => filter.addEventListener("keyup", () => {
            filterTable();
            updateDownloadLink();
        }));
        branchFilter.addEventListener("change", () => {
            filterTable();
            updateDownloadLink();
        });
        organFilter.addEventListener("change", () => {
            filterTable();
            updateDownloadLink();
        });

        // Initialize download link on page load
        updateDownloadLink();
    });
        function toggleDropdown() {
        const userProfile = document.querySelector('.user-profile');
        userProfile.classList.toggle('active');
    }

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
        const userProfile = document.querySelector('.user-profile');
        if (!userProfile.contains(event.target)) {
        userProfile.classList.remove('active');
    }
    });

</script>


</body>
</html>

