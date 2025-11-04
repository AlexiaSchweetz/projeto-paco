<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=copyright" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="d-flex flex-column my-5 p-5 align-items-center vh-100 gap-5">
        <div class="d-flex flex-column justify-content-evenly align-items-center gap-5">
            <div class="d-flex flex-column justify-content-evenly align-items-center">
                <h3>Pensando em <b>viajar ou investir?</b></h3>
                <span>Simule quanto e em qual moeda você precisa converter.</span>
            </div>
            <div class="d-flex flex-column justify-content-evenly align-items-center gap-3">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <div class="form-item">
                        <label class="form-label">Quantia</label>
                        <input class="form-control form-control-lg border border-0" id="valor" placeholder="0" type="number">
                    </div>
                    <div class="form-item">
                        <label for="moedaOrigem" class="form-label">Moeda</label>
                        <select class="form-select form-select-lg border border-0" id="moedaOrigem"></select>
                    </div>
                    <button type="submit" id="converterBtn" class="btn btn-outline-primary d-flex align-items-center rounded-circle">
                        <span class="material-symbols-outlined">
                            sync_alt
                        </span>
                    </button>
                    <div class="form-item">
                        <label class="form-label">Valor</label>
                        <input class="form-control form-control-lg border border-0" 
                            placeholder="0" id="resultadoConversao" 
                            type="number" 
                            style="background-color: transparent" 
                            disabled>
                    </div>
                    <div class="form-item">
                        <label for="moedaDestino" class="form-label">Moeda</label>
                        <select class="form-select form-select-lg border border-0" id="moedaDestino"></select>
                    </div>
                </div>
                <div class="d-flex justify-content-around align-items-center w-100">
                    <div>
                        <span class="d-title">EUR/USD</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-success">
                                trending_up
                            </span>000,00</span>
                    </div>
                    <div>
                        <span class="d-title">ETH/USD</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-success">
                                trending_up
                            </span>000,00</span>
                    </div>
                    <div>
                        <span class="d-title">USD/BTC</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-danger">
                                trending_down
                            </span>000,00</span>
                    </div>
                    <div>
                        <span class="d-title">USD/BTC</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-danger">
                                trending_down
                            </span>000,00</span>
                    </div>
                    <div>
                        <span class="d-title">BTC/EUR</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-success">
                                trending_up
                            </span>000,00</span>
                    </div>
                    <div>
                        <span class="d-title">USD/BTC</span><br>
                        <span class="d-flex"><span class="material-symbols-outlined text-danger">
                                trending_down
                            </span>000,00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex flex-column gap-3 p-0" style="max-width: 600px">
            <span class="align-self-start"><b>Histórico de conversões</b></span>
            <table class="table">
            <tbody id="tabelaHistorico"></tbody>
        </table>
        </div>
        <form class="align-self-start" action="{{ route('logout') }}" method="GET">
            @csrf
            <button class="btn btn-primary" type="submit">Sair</button>
        </form>
    </div>
</body>

<script src="{{ asset('js/home.js') }}"></script>

</html>