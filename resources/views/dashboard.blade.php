<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Conversões</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Conversor de Moedas</h1>

        <!-- Seletor de moedas -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="moedaOrigem">Moeda de Origem</label>
                <select id="moedaOrigem" class="form-select"></select>
            </div>
            <div class="col-md-4">
                <label for="moedaDestino">Moeda de Destino</label>
                <select id="moedaDestino" class="form-select"></select>
            </div>
            <div class="col-md-4">
                <label for="valor">Valor</label>
                <input type="number" id="valor" class="form-control" placeholder="Ex: 100" step="0.01">
            </div>
        </div>

        <!-- Botões de ação -->
        <div class="mb-4">
            <button id="converterBtn" class="btn btn-primary">Converter</button>
            <button id="salvarBtn" class="btn btn-success">Salvar Conversão</button>
        </div>

        <div id="resultadoConversao" class="mb-4"></div>

        <!-- Tabela de histórico -->
        <h2>Histórico</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Par</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody id="tabelaHistorico"></tbody>
        </table>

        <!-- Paginação -->
        <nav>
            <ul class="pagination" id="paginacao"></ul>
        </nav>
    </div>
    <form action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit">Sair</button>
    </form>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>