<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Dashboard Simples</title>
   
    <style>
        /* Importa a fonte 'Roboto' do Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

    /* Estilos Globais e Reset Básico */
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7f6; /* Cor de fundo suave */
        color: #333;
        display: flex; /* Para layout de cabeçalho, conteúdo e rodapé */
        flex-direction: column;
        min-height: 100vh; /* Ocupa a altura total da viewport */
    }

    a {
        text-decoration: none;
        color: inherit; /* Herda a cor do pai */
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* --- Cabeçalho --- */
    .header {
        background-color: #2c3e50; /* Azul escuro */
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        margin: 0;
        font-size: 1.8em;
        font-weight: 700;
    }

    .user-info span {
        font-size: 1em;
        font-weight: 300;
    }

    /* --- Container Principal (Sidebar + Conteúdo) --- */
    .container {
        display: flex;
        flex: 1; /* Faz o container crescer e ocupar o espaço restante */
    }

    /* --- Barra Lateral (Sidebar) --- */
    .sidebar {
        width: 250px;
        background-color: #34495e; /* Azul um pouco mais claro que o cabeçalho */
        color: white;
        padding-top: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        display: flex; /* Para alinhar o conteúdo verticalmente */
        flex-direction: column;
    }

    .sidebar nav ul li {
        margin-bottom: 10px;
    }

    .sidebar nav ul li a {
        display: block;
        padding: 12px 20px;
        font-size: 1.1em;
        color: #ecf0f1; /* Cor de texto claro */
        transition: background-color 0.3s ease;
    }

    .sidebar nav ul li a:hover,
    .sidebar nav ul li a.active {
        background-color: #2980b9; /* Azul vibrante no hover/ativo */
        border-left: 5px solid #3498db; /* Borda à esquerda para indicar ativo */
        padding-left: 15px; /* Ajusta o padding para compensar a borda */
    }

    /* --- Conteúdo Principal (Main Content) --- */
    .main-content {
        flex: 1; /* Ocupa todo o espaço restante horizontalmente */
        padding: 30px;
        background-color: #fefefe;
    }

    .main-content h2 {
        font-size: 2em;
        color: #2c3e50;
        margin-bottom: 25px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }

    /* --- Grid de Métricas (Cards) --- */
    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Layout responsivo */
        gap: 25px; /* Espaçamento entre os cards */
        margin-bottom: 40px;
    }

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 25px;
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px); /* Efeito de elevação no hover */
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .card h3 {
        font-size: 1.2em;
        color: #7f8c8d; /* Cinza médio */
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 400;
    }

    .metric-value {
        font-size: 3.5em; /* Tamanho grande para o valor */
        font-weight: 700;
        color: #3498db; /* Azul principal */
        margin-bottom: 10px;
    }

    /* Tendências (setas e cores) */
    .metric-trend {
        font-size: 0.9em;
        font-weight: 700;
    }
    .metric-trend.success { color: #27ae60; } /* Verde para positivo */
    .metric-trend.danger { color: #e74c3c; }  /* Vermelho para negativo */
    .metric-trend.warning { color: #f39c12; } /* Laranja para alerta */


    /* --- Atividade Recente --- */
    .recent-activity {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 25px;
    }

    .recent-activity ul li {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        font-size: 0.95em;
        color: #555;
    }

    .recent-activity ul li:last-child {
        border-bottom: none; /* Remove a borda do último item */
    }

    .recent-activity ul li strong {
        color: #2c3e50;
    }

    /* --- Rodapé --- */
    .footer {
        background-color: #2c3e50;
        color: white;
        text-align: center;
        padding: 15px;
        font-size: 0.9em;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    /* --- Media Queries para Responsividade --- */
    @media (max-width: 768px) {
        .container {
            flex-direction: column; /* Coloca sidebar abaixo do conteúdo */
        }

        .sidebar {
            width: 100%;
            height: auto;
            padding-top: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar nav ul {
            display: flex; /* Transforma o menu lateral em horizontal */
            justify-content: space-around;
            padding: 10px 0;
        }

        .sidebar nav ul li {
            margin-bottom: 0;
        }

        .sidebar nav ul li a {
            border-left: none;
            border-bottom: 3px solid transparent; /* Borda inferior para ativo no mobile */
            padding: 10px 15px;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            border-left: none;
            border-bottom-color: #3498db;
            padding-left: 15px;
        }

        .main-content {
            padding: 20px;
        }

        .metrics-grid {
            grid-template-columns: 1fr; /* Um card por linha em telas pequenas */
        }
    }
    </style>
</head>
<body>
    <header class="header">
        <h1>Dashboard Administrativo</h1>
        <div class="user-info">
            <span>Olá, Administrador!</span>
        </div>
    </header>

    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="#" class="active">Visão Geral</a></li>
                    <li><a href="#">Usuários</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Configurações</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <h2>Métricas Principais</h2>
            <div class="metrics-grid">
                <div class="card">
                    <h3>Usuários Registrados</h3>
                    <p class="metric-value">1.250</p>
                    <span class="metric-trend success">↑ 15%</span> nos últimos 30 dias
                </div>

                <div class="card">
                    <h3>Vendas Totais</h3>
                    <p class="metric-value">R$ 54.321</p>
                    <span class="metric-trend danger">↓ 5%</span> esta semana
                </div>

                <div class="card">
                    <h3>Produtos em Estoque</h3>
                    <p class="metric-value">87</p>
                    <span class="metric-trend warning">! Baixo estoque</span>
                </div>

                <div class="card">
                    <h3>Visitas Diárias</h3>
                    <p class="metric-value">3.456</p>
                    <span class="metric-trend success">↑ 20%</span> ontem
                </div>
            </div>

            <section class="recent-activity">
                <h2>Atividade Recente</h2>
                <ul>
                    <li>**Usuário Novo:** João Silva se registrou (2 min atrás)</li>
                    <li>**Venda:** Produto X vendido para Maria Souza (15 min atrás)</li>
                    <li>**Atualização:** Item "Caneta Azul" atualizado no estoque (1 hora atrás)</li>
                </ul>
            </section>
        </main>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Meu Dashboard. Todos os direitos reservados.</p>
    </footer>
</body>
</html>