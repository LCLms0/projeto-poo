<div class="modal fade" id="modalDetalhesServico{{ $servico->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-secondary" style="background-color: #1e2125;">
            <div class="modal-header border-secondary">
                <h5 class="text-white fw-semibold">
                    <i class="bi bi-eye me-2 text-primary"></i> Detalhes do Serviço
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            
            <div class="modal-body text-white text-start">
                
                <div class="mb-3">
                    @if($servico->foto)
                        <div class="rounded overflow-hidden border border-secondary" style="max-height: 240px; background-color: rgba(0, 0, 0, 0.2);">
                            <img src="{{ asset('storage/' . $servico->foto) }}" class="w-100 h-100" style="object-fit: cover; max-height: 240px;" alt="{{ $servico->nome }}">
                        </div>
                    @else
                        <div class="rounded border border-secondary d-flex align-items-center justify-content-center text-white-50" style="height: 200px; background-color: rgba(0, 0, 0, 0.2);">
                            <i class="bi bi-image fs-1"></i>
                        </div>
                    @endif
                </div>

                <div class="mb-3 pb-2 border-bottom border-secondary-subtle">
                    <span class="label-detalhe text-muted small">Nome do Serviço:</span>
                    <p class="fs-5 fw-semibold text-white mb-0">{{ $servico->nome }}</p>
                </div>

                <div class="mb-3 pb-2 border-bottom border-secondary-subtle">
                    <span class="label-detalhe text-muted small">Preço do Serviço:</span>
                    <p class="fs-5 fw-semibold text-primary mb-0">R$ {{ number_format($servico->preco, 2, ',', '.') }}</p>
                </div>

                <div class="mb-2">
                    <span class="label-detalhe text-muted small">Descrição / Detalhes:</span>
                    <p class="text-white-50 small mt-1 mb-0" style="text-align: justify;">
                        {{ $servico->descricao ?? 'Nenhuma descrição informada para este serviço.' }}
                    </p>
                </div>

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="background-color: #343a40; border: none;">Fechar</button>
            </div>
        </div>
    </div>
</div>