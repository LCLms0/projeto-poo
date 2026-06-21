<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbeiros | Barber Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row vh-100">
            
            @include('includes.sidebar')    
            
            <div class="col-md-9 col-lg-10 p-4 bg-dark">
                <div class="p-4 rounded-3 mb-4 d-flex flex-column" style="background-color: #1e2125;">
                    
                    <h1 class="text-white montserrat">
                        <i class="bi bi-scissors me-2"></i> Barbeiros
                    </h1>
                    <h2 class="fs-5 text-white mb-4">
                        Gerencie a equipe de barbeiros, informações de contato e suas respectivas especialidades.
                    </h2>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                        <button class="btn-login px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalBarbeiro">
                            Adicionar Barbeiro
                        </button>

                        <div class="position-relative" style="width: 100%; max-width: 350px;">
                            <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                <i class="bi bi-search text-primary"></i>
                            </span>
                            <input type="text" id="pesquisaBarbeiro" class="form-control ps-5" placeholder="Buscar barbeiro pelo nome...">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert-danger-custom d-flex flex-column mb-4" role="alert">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.1rem;"></i>
                                <strong class="montserrat">Por favor, corrija os erros abaixo:</strong>
                            </div>
                            <ul class="mb-0 ps-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('sucesso'))
                        <div class="alert-success-custom d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2" style="font-size: 1.1rem;"></i>
                            <div>{{ session('sucesso') }}</div>
                        </div>
                    @endif
    
                    <div class="card-exibir w-100 mt-2">
                        @if($barbeiros->isEmpty())
                            <p class="text-white-50 text-muted text-center my-4">Nenhum barbeiro cadastrado ainda.</p>
                        @else
                            <div class="container-scroll-servicos">
                                <div class="grid-servicos">
                                    @foreach ($barbeiros as $barbeiro)
                                        
                                        <div class="card-servico-custom" data-bs-toggle="modal" data-bs-target="#modalDetalhesBarbeiro{{ $barbeiro->id }}">
                                            @if(!empty($barbeiro->foto))
                                                <img src="{{ asset('storage/' . $barbeiro->foto) }}" class="card-servico-img" alt="{{ $barbeiro->nome }}">
                                            @else
                                                <div class="card-servico-img bg-secondary d-flex align-items-center justify-content-center text-white-50" style="height: 160px;">
                                                    <i class="bi bi-person-bounding-box fs-1"></i>
                                                </div>
                                            @endif
                                            
                                            <div class="card-servico-corpo">
                                                <h3 class="text-white fs-5 mb-1 montserrat">{{ $barbeiro->nome }}</h3>
                                                
                                                <div class="text-primary small mb-2 fw-semibold">
                                                    <i class="bi bi-scissors me-1"></i> Esp: {{ !empty($barbeiro->especialidade) ? $barbeiro->especialidade : 'Geral' }}
                                                </div>
                                                
                                                <p class="descricao-cortada text-white-50">
                                                    {{ $barbeiro->bio ?? 'Sem biografia disponível.' }}
                                                </p>
                                                
                                                <div class="mt-auto d-flex justify-content-between align-items-center" onclick="event.stopPropagation();">
                                                    <span class="text-muted small">
                                                        <i class="bi bi-telephone me-1"></i> {{ $barbeiro->telefone ?? 'Sem telefone' }}
                                                    </span>
                                                    
                                                    <div>
                                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#modalEditarBarbeiro{{ $barbeiro->id }}" title="Editar">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-lixeira-dark" data-bs-toggle="modal" data-bs-target="#modalDeletarBarbeiro{{ $barbeiro->id }}" title="Deletar">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @include('barbeiros.modals.details')
                                        @include('barbeiros.modals.edit')
                                        @include('barbeiros.modals.delete')

                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div> 
            </div>   
        </div>            
    </div>

    @include('barbeiros.modals.create')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputPesquisa = document.getElementById('pesquisaBarbeiro');
        if (inputPesquisa) {
            inputPesquisa.addEventListener('input', function() {
                const termo = this.value.toLowerCase().trim();
                const cards = document.querySelectorAll('.card-servico-custom');

                cards.forEach(card => {
                    const nomeBarbeiro = card.querySelector('h3').textContent.toLowerCase();
                    if (nomeBarbeiro.includes(termo)) {
                        card.style.setProperty("display", "flex", "important"); 
                    } else {
                        card.style.setProperty("display", "none", "important");
                    }
                });
            });
        }

        @if ($errors->any())
            @if (session()->has('modal_error_id'))
                var modalEditar = new bootstrap.Modal(document.getElementById('modalEditarBarbeiro' + '{{ session('modal_error_id') }}'));
                modalEditar.show();
            @else
                var modalCriar = new bootstrap.Modal(document.getElementById('modalBarbeiro'));
                modalCriar.show();
            @endif
        @endif
    });
    </script>
</body>
</html>