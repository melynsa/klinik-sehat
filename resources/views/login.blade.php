<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .register-link {
            margin-top: 15px;
            text-align: center;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="Enter your username" required>
    </div>
    <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter your password" required>
    </div>
    <button class="login-button" onclick="redirectToHome()">Login</button>
    <p class="register-link">Belum punya akun? <a href="{{ url('http://127.0.0.1:8000/register') }}">Daftar di sini</a></p>
</div>

<script>
    function redirectToHome() {
        // Here you can add validation if needed
        window.location.href = 'http://127.0.0.1:8000/home';
    }
</script>

</body>
</html>
