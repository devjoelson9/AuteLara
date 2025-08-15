<x-app-layout>
    <style>
        .home-section {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .home-section h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 15px;
        }
        .home-section p {
            color: #666;
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .home-cta a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .home-cta a:hover {
            background-color: #0056b3;
        }
        .home-cta a + a { 
            margin-left: 15px;
            background-color: #6c757d; 
        }
        .home-cta a + a:hover {
            background-color: #5a6268;
        }
    </style>

    <div class="home-section">
        <h1>Bem-vindo à Sua Aplicação!</h1>

        @if ($userName)
            <p>Olá, {{ $userName }}! É ótimo ter você de volta.</p>
            <div class="home-cta">
                <a href="{{ route('dashboard') }}">Ir para o Dashboard</a>
            </div>
        @else
            <p>Esta é a sua Home. Comece explorando ou criando uma conta.</p>
            <div class="home-cta">
                <a href="{{ route('login') }}">Entrar</a>
                <a href="{{ route('register') }}">Criar Conta</a>
            </div>
        @endif
    </div>
</x-app-layout>