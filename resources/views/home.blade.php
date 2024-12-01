<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Home Page</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            overflow: hidden;
        }

        .welcome-text {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
            background: linear-gradient(90deg, #03ffe2, #e52eb1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeIn 2s ease;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            display: flex;
            gap: 30px;
            padding: 20px;
        }

        .card {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 200px;
            height: 150px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        .card h3 {
            font-size: 1.5rem;
            margin: 30px 0 10px;
        }

        .card p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-25deg);
            transition: left 0.5s ease;
        }

        .card:hover::before {
            left: 100%;
        }

        .button {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            color: #2575fc;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }

        .button:hover {
            background: #2575fc;
            color: white;
        }
    </style>
</head>
<body>
<!-- Welcome Text -->
<h1 class="welcome-text">Welcome to One Net {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>

<!-- Cards -->
<div class="container">
    @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
        <div class="card">
            <h3>Branch</h3>
            <p>Manage your branches </p>
            <a href="/branch/list" class="button">Go</a>
        </div>
        <div class="card">
            <h3>Organization</h3>
            <p>Access organization data.</p>
            <a href="/organ/list" class="button">Go</a>
        </div>
        <div class="card">
            <h3>User</h3>
            <p>View and manage clients.</p>
            <a href="/user/list" class="button">Go</a>
        </div>
    @endif
    <div class="card">
        <h3>Client</h3>
        <p>View and manage clients.</p>
        <a href="/client/list" class="button">Go</a>
    </div>
        <div class="card">
            <h3>Problems</h3>
            <p>View and manage clients.</p>
            <a href="/problem/client/list" class="button">Go</a>
        </div>
</div>
</body>
</html>



