<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Centering the content in the middle of the viewport */
        body, html {
            height: 100%;
            margin: 0;
            /*display: flex;*/
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
        }
        .is-danger {
            border-color: red !important;
            background-color: #fdd;
        }

        .is-success {
            border-color: green !important;
            background-color: #dfd;
        }

        /* Text styles for result messages */
        .text-danger {
            color: red;
        }

        .text-success {
            color: green;
        }
        .container-fluid {
            max-width: 1400px; /* Updated width for a smaller, but not too small form */
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .card {
            border-radius: 50px;
        }

        /* Plus icon and styling */
        #fileDropArea i {
            font-size: 25px; /* Larger icon size */
            color: #6c6a6a;
        }

        #image-preview img {
            width: 250px; /* Same width as the upload box */
            height: 120px; /* Same height as the upload box */
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        /* Full-size image modal */
        .modal-content {
            background-color: #f8f9fa;
            border-radius: 0;
            border: none;
            height: 100%;
        }

        .modal-body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            height: 100%;
        }

        .modal-body img {
            max-width: 90vw;
            max-height: 90vh;
            object-fit: contain;
            margin: 0 auto;
            display: block;
        }

        /* Delete button style */
        #image-preview button {
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Card and form adjustments */
        .card-header {
            background-color: #002256;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .card-body {
            padding: 60px;
        }

        .btn-primary {
            padding: 12px 25px;
        }
        .image-upload label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 200px;
            height: 100px;
            background-color: #f8f9fa; /* Light background */
            border: 5px dashed #007bff; /* Dashed border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s, transform 0.2s;
        }

        .image-upload label:hover {
            background-color: #e2e6ea; /* Slightly darker on hover */
            transform: scale(1.05); /* Slight zoom on hover */
        }

        .image-upload input[type="file"] {
            display: none; /* Hide default file input */
        }

        #preview1, #preview2, #preview3, #preview4, #preview5 {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

        /* Mobile-Friendly Navbar */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                align-items: flex-start;
                background-color: #00346f;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                display: none;
            }

            .navbar ul.show {
                display: flex;
            }

            .navbar ul li {
                margin: 10px 0;
            }

            .menu-toggle {
                display: block;
                background-color: #0056b3;
                color: white;
                padding: 10px;
                border-radius: 50%;
                cursor: pointer;
                font-size: 1.2rem;
            }
        }
        #preview1 img, #preview2 img, #preview3 img, #preview4 img, #preview5 img {
            width: 200px; /* Larger preview */
            height: 100px; /* Maintain aspect ratio */
            object-fit: cover; /* Fit image proportionally */
            border-radius: 5px; /* Rounded corners */
            margin-top: 5px;
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
        <li><a href="{{ route('listProblemClient') }}">Problems</a></li>
        <li><a href="{{ route('logout') }}">Log Out</a></li>

    </ul>
</div>z

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
<div class="container-fluid mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header">
            <h3 class="mb-0">Add  New  Hosts</h3>
            <p class="text-light"></p>
        </div>
        <div class="card-body p-5">
            <form  action="{{ route('addClient') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">

                    <!-- Branch -->
                    <div class="col-md-3 mb-4">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select id="branch_id" name="branch_id" class="form-select" data-live-search="true" required>
                            <option value="" selected disabled>Choose a branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Organization -->
                    <div class="col-md-3 mb-4">
                        <label for="organ_id" class="form-label">Organization</label>
                        <select id="organ_id" name="organ_id" class="form-select" required>
                            <option value="" selected disabled>Choose an organization</option>
                            @foreach ($organs as $organ)
                                <option value="{{ $organ->id }}">{{ $organ->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Host Name -->
                    <div class="col-md-6 mb-4">
                        <label for="name_organ" class="form-label">Host Name</label>
                        <input type="text" id="name_organ" name="name_organ" class="form-control" placeholder="Enter host name" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Management IP -->
                    <div class="col-md-2 mb-4">
                        <label for="mgmt_ip" class="form-label" style="font-weight: bold;">Management IP</label>
                        <div class="d-flex">
                            <input type="text" id="mgmt_ip" name="mgmt_ip" class="form-control" placeholder="0.0.0.0"
                                   required>
                            <button type="button" id="check-mgmt-ip" style="height: auto; border: none; background: none;">
                                <i class="fa fa-check-circle" style="font-size: 20px; color: rgba(106,107,108,0.54);"></i>
                            </button>
                        </div>
                        <div id="mgmt-ip-check-result" class="mt-2"></div>
                    </div>

                    <!-- IP -->
                    <div class="col-md-2 mb-4">
                        <label for="ip" class="form-label">IP Address</label>
                        <input type="text" id="ip" name="ip" class="form-control" placeholder="0.0.0.0/0" >
                    </div>

                    <!-- VLAN -->
                    <div class="col-md-2 mb-4">
                        <label for="vlan" class="form-label">VLAN</label>
                        <input type="number" id="vlan" name="vlan" class="form-control" placeholder="Enter Vlan" >
                    </div>

                    <!-- VLAN 2 IP -->
                    <div class="col-md-2 mb-4">
                        <label for="vlan_ip" class="form-label">VLAN 2 IP</label>
                        <input type="text" id="vlan_ip" name="vlan_ip" class="form-control" placeholder="Enter VLAN 2 IP" >
                    </div>

                    <!-- Request -->
                    <div class="col-md-2 mb-4">
                        <label for="zayafka" class="form-label">Zayafka</label>
                        <input type="text" id="zayafka" name="zayafka" class="form-control" placeholder="Enter Zayafka" required>
                    </div>

                    <!-- STP Request -->
                    <div class="col-md-2 mb-4">
                        <label for="stp_zayafka" class="form-label">STP Zayafka</label>
                        <input type="text" id="stp_zayafka" name="stp_zayafka" class="form-control" placeholder="Enter STP zayafka" >
                    </div>

                </div>

                <div class="row">
                    <!-- ATC -->
                    <div class="col-md-2 mb-4">
                        <label for="atc" class="form-label">ATC</label>
                        <input type="text" id="atc" name="atc" class="form-control" placeholder="Enter ATC" required>
                    </div>

                    <!-- Port -->
                    <div class="col-md-8 mb-4">
                        <label for="port" class="form-label">Port</label>
                        <input type="text" id="port" name="port" class="form-control" placeholder="Enter port" >
                    </div>

                    <!-- Speed -->
                    <div class="col-md-2 mb-4">
                        <label for="speed" class="form-label">Speed</label>
                        <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter speed" >
                    </div>

                </div>

                <div class="row">

                    <!-- Client Name -->
                    <div class="col-md-4 mb-4">
                        <label for="client_name" class="form-label">Client Name</label>
                        <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Enter client name" >
                    </div>

                    <!-- Client Number -->
                    <div class="col-md-4 mb-4">
                        <label for="client_number" class="form-label">Client Number</label>
                        <input type="text" id="client_number" name="client_number" class="form-control" placeholder="+998 " >
                    </div>
                </div>

                <div class="row">

                    <!-- Date Connected -->
                    <div class="col-md-4 mb-4">
                        <label for="date_connect" class="form-label">Date Connected</label>
                        <input type="date" id="date_connect" name="date_connect" class="form-control" >
                    </div>

                    <!-- Location -->
                    <div class="col-md-4 mb-4">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" name="location" class="form-control" placeholder="Enter location" >
                    </div>
                </div>

                <div class="row">
                    <!-- Comment -->
                    <div class="col-md-10 mb-4">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea id="comment" name="comment" rows="3" class="form-control" placeholder="Enter comment"></textarea>
                    </div>

                </div>

                <div class="row">
                    <!-- Image Upload Container 1 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">AKT Device</label>
                        <div class="image-upload">
                            <label for="image1">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="image1" name="images[image1]" class="d-none" accept="image/*">
                            <div id="preview1" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 2 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">AKT Speed</label>
                        <div class="image-upload">
                            <label for="image2">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="image2" name="images[image2]" class="d-none" accept="image/*">
                            <div id="preview2" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 3 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">AKT Speed</label>
                        <div class="image-upload">
                            <label for="image3">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="image3" name="images[image3]" class="d-none" accept="image/*">
                            <div id="preview3" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 4 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Device</label>
                        <div class="image-upload">
                            <label for="image4">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="image4" name="images[image4]" class="d-none" accept="image/*">
                            <div id="preview4" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 5 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Device</label>
                        <div class="image-upload">
                            <label for="image5">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="image5" name="images[image5]" class="d-none" accept="image/*">
                            <div id="preview5" class="mt-3"></div>
                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg rounded shadow">Save Host</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Full-size Image Modal -->
<div class="modal fade" id="fullImageModal" tabindex="-1" aria-labelledby="fullImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="full-size-image" src="" alt="Full-size image">
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.querySelectorAll('input[type="file"]').forEach((input) => {
        input.addEventListener('change', function () {
            const previewId = this.id.replace('image', 'preview'); // Match the preview container ID
            const previewContainer = document.getElementById(previewId);
            previewContainer.innerHTML = ''; // Clear existing preview content

            Array.from(this.files).forEach((file) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const wrapper = document.createElement('div');
                        wrapper.style.position = 'relative'; // Allow positioning of delete button
                        wrapper.style.display = 'inline-block'; // Align previews in a row
                        wrapper.style.marginRight = '10px';

                        const img = document.createElement('img');
                        img.src = e.target.result; // Display the image
                        img.alt = file.name; // Set alt text for accessibility
                        img.style.width = '200px'; // Set a fixed width
                        img.style.height = '120px'; // Set a fixed height
                        img.style.objectFit = 'cover'; // Ensure the image fits within the bounds
                        img.style.borderRadius = '5px'; // Rounded corners
                        img.classList.add('preview-image'); // Add class for modal interaction

                        // Create a delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.innerHTML = '&times;'; // '×' symbol
                        deleteButton.style.position = 'absolute';
                        deleteButton.style.top = '5px';
                        deleteButton.style.right = '5px';
                        deleteButton.style.backgroundColor = 'red';
                        deleteButton.style.color = 'white';
                        deleteButton.style.border = 'none';
                        deleteButton.style.borderRadius = '50%';
                        deleteButton.style.width = '25px';
                        deleteButton.style.height = '25px';
                        deleteButton.style.cursor = 'pointer';
                        deleteButton.title = 'Delete image';

                        // Attach delete functionality
                        deleteButton.addEventListener('click', () => {
                            previewContainer.removeChild(wrapper); // Remove the preview
                            input.value = ''; // Clear the file input
                        });

                        // Append image and delete button to wrapper
                        wrapper.appendChild(img);
                        wrapper.appendChild(deleteButton);
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file); // Convert file to a data URL
                } else {
                    // Display an error if the file is not an image
                    const error = document.createElement('p');
                    error.textContent = `File "${file.name}" is not a valid image.`;
                    previewContainer.appendChild(error);
                }
            });
        });
    });


    // Add event listener to handle clicks on preview images
    document.body.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('preview-image')) {
            const fullImageModal = document.getElementById('fullImageModal');
            const fullSizeImage = document.getElementById('full-size-image');
            fullSizeImage.src = e.target.src; // Set the modal image source
            const modal = new bootstrap.Modal(fullImageModal); // Initialize and show the modal
            modal.show();
        }
    });
    document.getElementById('check-mgmt-ip').addEventListener('click', function () {
        const mgmtIpInput = document.getElementById('mgmt_ip');
        const resultContainer = document.getElementById('mgmt-ip-check-result');
        const mgmtIp = mgmtIpInput.value.trim();

        // Clear previous messages and reset input field styles
        resultContainer.textContent = '';
        mgmtIpInput.classList.remove('is-danger', 'is-success');

        // Validate input
        if (!mgmtIp) {
            resultContainer.textContent = 'Please enter a Management IP.';
            resultContainer.classList.add('text-danger');
            return;
        }

        // Show loading text
        // resultContainer.textContent = 'Checking...';

        // Make API request
        fetch(`{{ route('checkMgIp', '') }}/${encodeURIComponent(mgmtIp)}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for Laravel
            },
            body: JSON.stringify({ mgmt_ip: mgmtIp }), // Send the IP as JSON payload
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then((data) => {
                // Check the response and update the UI
                if (data.exists) {
                    resultContainer.classList.remove('text-success');
                    resultContainer.classList.add('text-danger');
                    mgmtIpInput.classList.add('is-danger'); // Highlight input field in red
                } else {
                    resultContainer.classList.remove('text-danger');
                    resultContainer.classList.add('text-success');
                    mgmtIpInput.classList.add('is-success'); // Highlight input field in green
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                resultContainer.textContent = 'An error occurred while checking. Please try again.';
                resultContainer.classList.remove('text-success');
                resultContainer.classList.add('text-danger');
            });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
