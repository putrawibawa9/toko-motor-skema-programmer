<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #7EACB5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus {
            border-color: #007bff;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .switch {
            margin-top: 20px;
            font-size: 14px;
        }
        .switch a {
            color: #007bff;
            text-decoration: none;
        }
        .switch a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Error Message Display -->
        <?php if(isset($_GET)): ?>
            <p class="error-message">Username / Password salah</p>
        <?php endif; ?>
        
        <!-- User Login Form -->
        <form id="loginForm" action="<?= BASEURL?>/authUser/signin" method="post">
            <h2>Login User</h2>
            <div class="form-group">
                <label for="loginEmail">Username:</label>
                <input name="username" type="text" id="loginEmail" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password:</label>
                <input name="password" type="password" id="loginPassword" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="switch">
                <p>Don't have an account? <a href="#" onclick="toggleForm()">Register</a></p>
                <a href="<?= BASEURL?>/auth/login">Admin</a>
            </div>
        </form>

        <!-- User Register Form -->
        <form action="<?= BASEURL?>/authUser/register" method="post" id="registerForm" style="display: none;">
            <h2>Register</h2>
            <div class="form-group">
                <label for="registerName">Username:</label>
                <input name="username" type="text" id="registerName" required>
            </div>
            <div class="form-group">
                <label for="registerPassword">Password:</label>
                <input name="password" type="password" id="registerPassword" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="switch">
                <p>Already have an account? <a href="#" onclick="toggleForm()">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        function toggleForm() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
            registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
