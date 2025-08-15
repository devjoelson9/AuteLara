<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu App</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;
        }
        button {
            background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;
        }
        button:hover { background-color: #45a049; }
        .error { color: red; font-size: 0.9em; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        @auth
            <a href="/dashboard">Dashboard</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </nav>

    <div class="container">
        @if (session('status'))
            <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>
</body>
</html>