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
        nav { margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; } 
        nav .nav-links a { margin-right: 15px; text-decoration: none; color: #007bff; }
        nav .user-actions { display: flex; align-items: center; }
        nav .user-actions form { margin: 0; } 
        nav .user-actions button {
            background-color: #dc3545; 
            padding: 8px 12px;
            font-size: 0.9em;
            margin-left: 10px;
        }
        nav .user-actions button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            @auth {{-- Só mostra o Dashboard se estiver logado --}}
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endauth
        </div>
        <div class="user-actions">
            @auth {{-- Mostra o nome do usuário e o botão de logout se estiver logado --}}
                <span>Olá, {{ Auth::user()->name }}!</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf {{-- Necessário para rotas POST no Laravel --}}
                    <button type="submit">Sair</button>
                </form>
            
            @endauth
        </div>
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