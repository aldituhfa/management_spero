<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Spero</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fc;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Logo */
        .logo-wrapper img {
            width: 180px;
            margin-bottom: 30px;
        }

        /* Card Login */
        .login-card {
            background: #ffffff;
            width: 400px;
            padding: 40px 35px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .login-card h2 {
            text-align: center;
            font-size: 1.6rem;
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 0.95rem;
            color: #555;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: 0.2s ease;
        }

        .form-group input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #0d6efd;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s ease;
        }

        .login-btn:hover {
            background: #0b5ed7;
        }
    </style>
</head>
<body>

    <!-- Logo -->
    <div class="logo-wrapper">
        <img src="{{ asset('images/Spero Logo.jpg') }}" alt="Logo">
    </div>

    <!-- Card Login -->
    <div class="login-card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login to your account</h2>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">Sign in</button>
        </form>
    </div>

</body>
</html>
