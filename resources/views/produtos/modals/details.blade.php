<div class="modal fade" id="modalDetalhesProduto{{ $produto->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-secondary" style="background-color: #1e2125;">
            <div class="modal-header border-secondary">
                <h5 class="text-white fw-semibold">
                    <i class="bi bi-eye me-2 text-primary"></i> Detalhes do Produto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            
            <div class="modal-body text-white text-start">
                
                <div class="mb-3">
                    @if($produto->foto)
                        <div class="rounded overflow-hidden border border-secondary" style="max-height: 240px; background-color: rgba(0, 0, 0, 0.2);">
                            <img src="{{ asset('storage/' . $produto->foto) }}" class="w-100 h-100" style="object-fit: cover; max-height: 240px;" alt="{{ $produto->nome }}">
                        </div>
                    @else
                        <div class="rounded border border-secondary d-flex align-items-center justify-content-center text-white-50" style="height: 200px; background-color: rgba(0, 0, 0, 0.2);">
                            <i class="bi bi-image fs-1"></i>
                        </div>
                    @endif
                </div>

                <div class="mb-3 pb-2 border-bottom border-secondary-subtle">
                    <span class="label-detalhe">Nome do Produto:</span>
                    <p class="fs-5 fw-semibold text-white mb-0">{{ $produto->nome }}</p>
                </div>

                <div class="row mb-3 pb-2 border-bottom border-secondary-subtle">
                    <div class="col-6 border-end border-secondary-subtle">
                        <span class="label-detalhe">Marca:</span>
                        <p class="fs-6 fw-semibold text-white mb-0">{{ $produto->marca }}</p>
                    </div>
                    <div class="col-6 ps-3">
                        <span class="label-detalhe">Preço de Venda:</span>
                        <p class="fs-6 fw-semibold text-primary mb-0">R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</p>
                    </div>
                </div>

                <div class="mb-2">
                    <span class="label-detalhe">Estoque Atual:</span>
                    <span class="badge {{ $produto->quantidade_estoque > 5 ? 'bg-success' : 'bg-danger' }} fs-6 px-3 py-2 mt-1">
                        {{ $produto->quantidade_estoque }} unidades
                    </span>
                </div>

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="background-color: #343a40; border: none;">Fechar</button>
            </div>
        </div>
    </div>
</div>