<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 100%;
            max-width: 350px;
        }
        input {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus {
            border-color: #4caf50;
        }
        input[type="submit"] {
            background: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background: #43a047;
        }
        h2 {
            margin-bottom: 20px;
        }
        .redirect-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .redirect-link a {
            color: #4caf50;
            text-decoration: none;
        }
        .redirect-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Welcome Back!</h2>
     @include('components.alerts')

    <form action="{{ route('logincheck') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
         <div class="redirect-link">
    </div>
    </form>


</html>
