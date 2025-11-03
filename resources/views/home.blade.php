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
    <div class="d-flex flex-column my-5 py-5 align-items-center vh-100 gap-5">
        <div class="d-flex flex-column justify-content-evenly align-items-center gap-5">
            <div class="d-flex flex-column justify-content-evenly align-items-center">
                <h3>Pensando em <b>viajar ou investir?</b></h3>
                <span>Simule quanto e em qual moeda você precisa converter.</span>
            </div>
            <div class="d-flex flex-column justify-content-evenly align-items-center gap-3">
                <form class="d-flex justify-content-between align-items-center gap-3">
                    <div class="form-item">
                        <label class="form-label">Quantia</label>
                        <input class="form-control form-control-lg border border-0" type="number">
                    </div>
                    <div class="form-item">
                        <label class="form-label">Moeda</label>
                        <select class="form-select form-select-lg border border-0" name="valorInicial" id="valorInicial">
                            <option value="1">One</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-flex align-items-center rounded-circle">
                        <span class="material-symbols-outlined">
                            sync_alt
                        </span>
                    </button>
                    <div class="form-item">
                        <label class="form-label">Valor</label>
                        <input class="form-control form-control-lg border border-0" type="number">
                    </div>
                    <div class="form-item">
                        <label class="form-label">Moeda</label>
                        <select class="form-select form-select-lg border border-0" name="valorConvertido" id="valorConvertido">
                            <option value="1">One</option>
                        </select>
                    </div>
                </form>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span>EUR/USD</span><br>
                        <span><span class="material-symbols-outlined">
                                trending_up
                            </span>000,00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex flex-column gap-3">
            <span class="align-self-start"><b>Histórico de conversões</b></span>
            <div class="row">
                <div class="col text-start">
                    <b>USD</b> $100
                </div>
                <div class="col text-center">
                    PARA
                </div>
                <div class="col text-end">
                    <b>EUR</b> €0,86
                </div>
            </div>
        </div>
    </div>
</body>

</html>