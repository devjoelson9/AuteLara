<x-app-layout>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Lembrar-me</label>
        </div>

        <button type="submit">Login</button>
    </form>
    <p>Não tem uma conta? <a href="{{ route('register') }}">Registre-se aqui</a>.</p>
</x-app-layout>