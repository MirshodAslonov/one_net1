<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* Login container */
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
            background: linear-gradient(90deg, #03ffe2, #e52eb1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Input group styles */
        .input-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.05);
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid rgb(255, 255, 255);
            border-radius: 5px;
            font-size: 1rem;
            background: rgb(255, 255, 255);
            color: #06073e;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #03ffe2;
        }

        /* Button styles */
        .btn {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, #03ffe2, #e52eb1);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Extra text styles */
        .extra-text {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .extra-text a {
            color: #03ffe2;
            text-decoration: none;
        }

        .extra-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login to One Net</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
{{--    <p class="extra-text">Don't have an account? <a href="/register">Sign Up</a></p>--}}
</div>
</body>
</html>

