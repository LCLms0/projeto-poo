<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Control Barber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">        
        <div class="row vh-100">
            
            <div class="col-12 col-md-7 border-end border-primary fundo-esquerdo-imagem">   
            </div>

            <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center bg-dark p-4">
                
                <div class="caixa-login w-100 d-flex flex-column align-items-center" style="max-width: 400px;">
                    
                    <div class="text-center mb-3">
                        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="logo" style="max-width: 160px;">
                    </div>

                    <h1 class="text-white text-center fs-2 mb-4 roboto-mono">Login</h1>

                    <form action="{{ route('login.enviar') }}" method="POST" class="w-100">
                        @csrf 
                        
                        @if($errors->has('login_erro'))
                        <div class="alert alert-danger-custom d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>
                                {{ $errors->first('login_erro') }}
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                            <label for="email">E-mail:</label>
                        </div>
                        
                        <div class="form-floating mb-4 position-relative">
                            <input type="password" class="form-control pe-5" id="password" name="password" placeholder="Senha" required>
                            <label for="password">Senha:</label>
                            <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-secondary" style="cursor: pointer; z-index: 10;" id="togglePassword">
                                <i class="bi bi-eye" id="iconeOlho"></i>
                            </span>
                        </div>
                        
                        <button type="submit" class="btn-login text-uppercase w-100 py-3 mt-2">
                            Acessar Painel
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const iconeOlho = document.querySelector('#iconeOlho');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            iconeOlho.classList.toggle('bi-eye');
            iconeOlho.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>