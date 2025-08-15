<x-app-layout>
    <style>
        /* Estilos específicos do dashboard, se precisar de algo além do layout base */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .dashboard-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .dashboard-card h3 {
            margin-top: 0;
            color: #333;
            font-size: 1.2em;
        }
        .dashboard-card p.metric {
            font-size: 2.5em;
            font-weight: bold;
            color: #007bff; /* Azul primário para os valores */
            margin: 10px 0;
        }
        .dashboard-section {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .dashboard-section h3 {
            margin-top: 0;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .dashboard-section ul {
            list-style: none;
            padding: 0;
        }
        .dashboard-section ul li {
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }
        .dashboard-section ul li:last-child {
            border-bottom: none;
        }
        .dashboard-section ul li strong {
            color: #007bff;
        }
    </style>

    <h2>Dashboard</h2>

    <p>olá <b>{{ Auth::user()->name }}</b> Bem-vindo ao seu painel de controle!</p>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>Total de Usuários Registrados</h3>
            <p class="metric">{{ $totalUsers }}</p> 
            <p style="font-size: 0.9em; color: #666;">Dados atualizados em {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        <div class="dashboard-card">
            <h3>Outra Métrica</h3>

            
            <p class="metric">42</p>
            <p style="font-size: 0.9em; color: #666;">Exemplo de dado</p>
        </div>
    </div>

    @isset($latestUsers)
        <div class="dashboard-section">
            <h3>Últimos Usuários Registrados</h3>
            <ul>
                @forelse ($latestUsers as $user)
                    <li>
                        <strong>{{ $user->name }}</strong> ({{ $user->email }}) - Registrado em: {{ $user->created_at->format('d/m/Y H:i') }}
                    </li>
                @empty
                    <li>Nenhum usuário recente para exibir.</li>
                @endforelse
            </ul>
        </div>
    @endisset

    <div class="dashboard-section">
        <h3>Ações Rápidas</h3>
        <p>Aqui você pode adicionar links ou botões para as funcionalidades mais importantes do seu sistema.</p>
        <button onclick="alert('Funcionalidade ainda não implementada!');">Gerenciar Conteúdo</button>
        <button style="background-color: #dc3545;" onclick="alert('Funcionalidade ainda não implementada!');">Relatórios</button>
    </div>

</x-app-layout>