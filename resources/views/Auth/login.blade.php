<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* General styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f3f4f6;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Login container */
    .login-container {
        background: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        color: #333;
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
        color: #555;
    }

    .input-group input {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .input-group input:focus {
        outline: none;
        border-color: #4A90E2;
    }

    /* Button styles */
    .btn {
        width: 100%;
        padding: 0.8rem;
        background-color: #4A90E2;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #357ABD;
    }

    /* Extra text styles */
    .extra-text {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #555;
    }

    .extra-text a {
        color: #4A90E2;
        text-decoration: none;
    }

    .extra-text a:hover {
        text-decoration: underline;
    }

</style>
<body>
<div class="login-container">
    <h2>Welcome One Net</h2>
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
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
        <p class="extra-text">
            Don't have an account? <a href="/register">Sign up</a>
        </p>
    </form>

</div>
</body>
</html>
