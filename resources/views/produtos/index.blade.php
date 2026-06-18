<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | Barber Control</title>
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
                        <i class="bi bi-box-seam me-2"></i> Produtos
                    </h1>
                    <h2 class="fs-5 text-white mb-4">
                        Gerencie o estoque de produtos da barbearia, marcas, preços de venda e quantidades.
                    </h2>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                        <button class="btn-login px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalProduto">
                            Adicionar Produto
                        </button>

                        <div class="position-relative" style="width: 100%; max-width: 350px;">
                            <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                                <i class="bi bi-search text-primary"></i>
                            </span>
                            <input type="text" id="pesquisaProduto" class="form-control ps-5" placeholder="Buscar produto pelo nome...">
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
                        @if($produtos->isEmpty())
                            <p class="text-white-50 text-muted text-center my-4">Nenhum produto cadastrado ainda.</p>
                        @else
                            <div class="container-scroll-servicos">
                                <div class="grid-servicos">
                                    @foreach ($produtos as $produto)
                                        
                                        <div class="card-servico-custom" data-bs-toggle="modal" data-bs-target="#modalDetalhesProduto{{ $produto->id }}">
                                            @if($produto->foto)
                                                <img src="{{ asset('storage/' . $produto->foto) }}" class="card-servico-img" alt="{{ $produto->nome }}">
                                            @else
                                                <div class="card-servico-img bg-secondary d-flex align-items-center justify-content-center text-white-50" style="height: 160px;">
                                                    <i class="bi bi-image fs-1"></i>
                                                </div>
                                            @endif
                                            
                                            <div class="card-servico-corpo">
                                                <h3 class="text-white fs-5 mb-1 montserrat">{{ $produto->nome }}</h3>
                                                
                                                <div class="text-primary small mb-2 fw-semibold">
                                                    <i class="bi bi-tags me-1"></i> Marca: {{ $produto->marca }}
                                                </div>
                                                
                                                <p class="descricao-cortada text-white-50">
                                                    Preço: R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}
                                                </p>
                                                
                                                <div class="mt-auto d-flex justify-content-between align-items-center" onclick="event.stopPropagation();">
                                                    <span class="text-muted small">
                                                        <i class="bi bi-box me-1"></i> Qtd: 
                                                        <span class="badge {{ $produto->quantidade_estoque > 5 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $produto->quantidade_estoque }} un
                                                        </span>
                                                    </span>
                                                    
                                                    <div>
                                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#modalEditarProduto{{ $produto->id }}" title="Editar">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-lixeira-dark" data-bs-toggle="modal" data-bs-target="#modalDeletarProduto{{ $produto->id }}" title="Deletar">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @include('produtos.modals.details')
                                        @include('produtos.modals.edit')
                                        @include('produtos.modals.delete')

                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div> 
            </div>   
        </div>            
    </div>

    @include('produtos.modals.create')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputPesquisa = document.getElementById('pesquisaProduto');
        if (inputPesquisa) {
            inputPesquisa.addEventListener('input', function() {
                const termo = this.value.toLowerCase().trim();
                const cards = document.querySelectorAll('.card-servico-custom');

                cards.forEach(card => {
                    const nomeProduto = card.querySelector('h3').textContent.toLowerCase();
                    if (nomeProduto.includes(termo)) {
                        card.style.setProperty("display", "flex", "important"); 
                    } else {
                        card.style.setProperty("display", "none", "important");
                    }
                });
            });
        }

        @if ($errors->any())
            @if (session()->has('modal_error_id'))
                var modalEditar = new bootstrap.Modal(document.getElementById('modalEditarProduto' + '{{ session('modal_error_id') }}'));
                modalEditar.show();
            @else
                var modalCriar = new bootstrap.Modal(document.getElementById('modalProduto'));
                modalCriar.show();
            @endif
        @endif
    });
    </script>
</body>
</html>