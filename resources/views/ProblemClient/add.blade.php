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

            .field + .field {
                margin-top: 15px;
            }



            .navbar ul li {
                margin: 10px 0;
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
            <h3 class="mb-0">Create Problem</h3>
            <p class="text-light"></p>
        </div>
        <div class="card-body p-5">
            <form  action="{{ route('addProblemClient') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="client_id" value="{{ $client['id'] }}">

                <div class="col-md-12 mb-4" style="
                                                    display: grid;
                                                    grid-template-columns: repeat(7, 1fr) auto;
                                                    gap: 15px;
                                                    border: 1px solid #ddd;
                                                    border-radius: 12px;
                                                    padding: 20px;
                                                    background: linear-gradient(120deg, #ffffff, #f0f9ff);
                                                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
                                                ">
                    <!-- ID -->
                    <div style="
                                                    text-align: center;
                                                    padding: 10px;
                                                    background-color: #f9fafb;
                                                    border-radius: 8px;
                                                    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                                ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">ID</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client->id }}
                        </div>
                    </div>

                    <!-- Name -->
                    <div style="
                                    text-align: center;
                                    padding: 10px;
                                    background-color: #f9fafb;
                                    border-radius: 8px;
                                    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">Name</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['name_organ'] }}
                        </div>
                    </div>

                    <!-- Mgmt IP -->
                    <div style="
                                        text-align: center;
                                        padding: 10px;
                                        background-color: #f9fafb;
                                        border-radius: 8px;
                                        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                    ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">Mgmt IP</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['mgmt_ip'] }}
                        </div>
                    </div>

                    <!-- Zayafka -->
                    <div style="
                                                    text-align: center;
                                                    padding: 10px;
                                                    background-color: #f9fafb;
                                                    border-radius: 8px;
                                                    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                                ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">Zayafka</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['zayafka'] }}
                        </div>
                    </div>

                    <!-- Client Name -->
                    <div style="
                                    text-align: center;
                                    padding: 10px;
                                    background-color: #f9fafb;
                                    border-radius: 8px;
                                    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">Client Name</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['client_name'] }}
                        </div>
                    </div>

                    <!-- ATC -->
                    <div style="
                                        text-align: center;
                                        padding: 10px;
                                        background-color: #f9fafb;
                                        border-radius: 8px;
                                        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                    ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">ATC</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['atc'] }}
                        </div>
                    </div>

                    <!-- Client Number -->
                    <div style="
                                        text-align: center;
                                        padding: 10px;
                                        background-color: #f9fafb;
                                        border-radius: 8px;
                                        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
                                    ">
                        <label class="form-label" style="font-weight: bold; color: #3b82f6;">Client Number</label>
                        <div style="font-size: 14px; color: #374151;">
                            {{ $client['client_number'] }}
                        </div>
                    </div>

                    <!-- Show -->
                    <div style="
                                    text-align: center;
                                    padding: 10px;
                                ">
                        <label class="form-label" style="
                                        font-weight: bold;
                                        color: #3b82f6;
                                        display: block;
                                    ">Show</label>
                        <a href="{{ route('getClient', $client->id) }}" style="
            display: inline-block;
            padding: 8px 12px;
            font-size: 13px;
            color: #ffffff;
            background-color: #3b82f6;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#2563eb'"
                           onmouseout="this.style.backgroundColor='#3b82f6'">
                            Edit
                        </a>
                    </div>
                </div>

                <div class="d-flex mb-4 gap-3">
                    <!-- Comment -->
                    <div class="col-md-6">
                        <label for="problem" class="form-label">Problem : </label>
                        <span class="font-weight-bold text-primary">
                            {{ auth()->user()->name ?? '___Unknown User' }}
                        </span>
                        <textarea id="problem" name="problem" rows="3" class="form-control" style="height: 400px; resize: none" placeholder="Enter problem"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="answer" class="form-label">Answer : </label>
                        <span class="font-weight-bold text-primary">
                            {{ $values['answer_user']['name'] ?? '___Unknown User' }}
                        </span>
                        <textarea id="answer" name="answer" rows="3" class="form-control" style="height: 400px; resize: none" placeholder="Enter answer"></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Image Upload Container 1 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 1</label>
                        <div class="image-upload">
                            <label for="problem_image1">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image1" name="images[problem_image1]" class="d-none" accept="image/*">
                            <div id="preview1" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 2 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 2</label>
                        <div class="image-upload">
                            <label for="problem_image2">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image2" name="images[problem_image2]" class="d-none" accept="image/*">
                            <div id="preview2" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 3 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 3</label>
                        <div class="image-upload">
                            <label for="problem_image3">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image3" name="images[problem_image3]" class="d-none" accept="image/*">
                            <div id="preview3" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 4 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 4</label>
                        <div class="image-upload">
                            <label for="problem_image4">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image4" name="images[problem_image4]" class="d-none" accept="image/*">
                            <div id="preview4" class="mt-3"></div>
                        </div>
                    </div>

                    <!-- Image Upload Container 5 -->
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 5</label>
                        <div class="image-upload">
                            <label for="problem_image5">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image5" name="images[problem_image5]" class="d-none" accept="image/*">
                            <div id="preview5" class="mt-3"></div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="form-label">Area 6</label>
                        <div class="image-upload">
                            <label for="problem_image6">
                                <i class="bi bi-cloud-upload fs-2 text-primary"></i>
                            </label>
                            <input type="file" id="problem_image6" name="images[problem_image6]" class="d-none" accept="image/*">
                            <div id="preview6" class="mt-3"></div>
                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary btn-lg rounded shadow">Create Problem</button>
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
            const previewId = this.id.replace('problem_image', 'preview'); // Match the preview container ID
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
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

