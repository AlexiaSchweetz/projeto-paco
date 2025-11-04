<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=copyright" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="fullPage d-flex justify-content-around align-items-center">
        <div>
            <h3>Login in to your account</h3>
            <span>Por favor, preencha seus dados abaixo</span>
            <div class="mt-3 d-flex flex-column">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control border-secondary-subtle @error('email') is-invalid @enderror"
                    type="email"
                    class="form-control "
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus><br>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="password" class="form-label">Senha</label>
                <input class="form-control border-secondary-subtle"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="d-flex gap-3 mt-3">
                    <div class="form-check">
                        <input class="form-check-input border-secondary-subtle"
                            type="checkbox"
                            id="remember"
                            name="remember">
                        <label class="form-check-label" for="remember">
                            Lembrar minha senha
                        </label>
                    </div>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button class="btn btn-primary w-100 mt-3" id="login-btn">Entrar</button>
                <a href="{{ route('register') }}" class="text-decoration-none text-primary align-self-center mt-3">Novo aqui? Cadastre-se</a>
            </div>
            <span class="copyright"><span class="material-symbols-outlined">copyright</span>2024 Todos os direitos reservados</span>
        </div>
        <div class="carrossel">
            <div id="carouselLogin" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselLogin" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselLogin" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselLogin" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="cover"></div>
                        <img src="images/1fa07152a0d5f60e51f9bf1aa2062ae311610727.png" class="item-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>The simplest way to manage your workforce</h5>
                            <p>Enter your credentials to acess your account</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="cover"></div>
                        <img src="images/1fa07152a0d5f60e51f9bf1aa2062ae311610727.png" class="item-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>The simplest way to manage your workforce</h5>
                            <p>Enter your credentials to acess your account</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="cover"></div>
                        <img src="images/1fa07152a0d5f60e51f9bf1aa2062ae311610727.png" class="item-image" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>The simplest way to manage your workforce</h5>
                            <p>Enter your credentials to acess your account</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselLogin" data-bs-slide="next">
                    <span class="material-symbols-outlined">arrow_right_alt</span>
                </button>
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('js/login.js') }}"></script>

</html>