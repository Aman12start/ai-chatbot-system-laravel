<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InfiCode AI</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">

    <style>

        body {
            background: linear-gradient(135deg, #0f0f0f, #050505);
            height: 100vh;
            color: white;
            font-family: 'Orbitron', sans-serif;
        }

        .center-box {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-neon {
            background: #111;
            border-radius: 15px;
            padding: 50px;
            box-shadow:
                0 0 10px #00f0ff,
                0 0 20px #00f0ff,
                0 0 40px #00f0ff;
            text-align: center;
        }

        .logo {
            font-size: 48px;
            color: #00f0ff;
            text-shadow:
                0 0 5px #00f0ff,
                0 0 10px #00f0ff,
                0 0 20px #00f0ff;
            margin-bottom: 20px;
        }

        .btn-neon {
            background: transparent;
            color: #00f0ff;
            border: 2px solid #00f0ff;
            box-shadow: 0 0 10px #00f0ff;
            transition: 0.3s;
        }

        .btn-neon:hover {
            background: #00f0ff;
            color: black;
            box-shadow:
                0 0 20px #00f0ff,
                0 0 40px #00f0ff;
        }

    </style>

</head>

<body>

<div class="center-box">

    <div class="card-neon">

        <div class="logo">
            InfiCode AI
        </div>

        <p class="mb-4">
            Next Generation AI Chat Platform
        </p>

        <div class="d-grid gap-3">

            <a href="{{ route('login') }}" class="btn btn-neon btn-lg">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-neon btn-lg">
                Sign Up
            </a>

        </div>

    </div>

</div>

</body>
</html>
