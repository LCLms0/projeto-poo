<div class="modal fade" id="modalDetalhesBarbeiro{{ $barbeiro->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white" style="background-color: #1e2125; border: 1px solid rgba(255,255,255,0.1);">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title montserrat">
                    <i class="bi bi-person-badge me-2 text-primary"></i>Perfil do Profissional
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                @if(!empty($barbeiro->foto))
                    <img src="{{ asset('storage/' . $barbeiro->foto) }}" class="rounded-circle mb-3 border border-primary p-1" style="width: 120px; height: 120px; object-fit: cover;" alt="{{ $barbeiro->nome }}">
                @else
                    <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center text-white-50 mb-3" style="width: 120px; height: 120px;">
                        <i class="bi bi-person fs-1"></i>
                    </div>
                @endif

                <h4 class="montserrat text-white mb-1">{{ $barbeiro->nome }}</h4>
                <p class="text-primary fw-semibold mb-4">{{ $barbeiro->especialidade ?? 'Profissional Geral' }}</p>

                <div class="text-start bg-dark p-3 rounded border border-secondary mb-2">
                    <span class="label-detalhe">Contato telefônico</span>
                    <p class="text-white mb-3 fw-medium"><i class="bi bi-whatsapp text-success me-2"></i>{{ $barbeiro->telefone ?? 'Não informado' }}</p>

                    <span class="label-detalhe">Biografia Profissional</span>
                    <p class="text-white-50 mb-0 small" style="white-space: pre-line;">{{ $barbeiro->bio ?? 'Nenhuma descrição informada.' }}</p>
                </div>
            </div>
            <div class="modal-footer border-top border-secondary">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar Visualização</button>
            </div>
        </div>
    </div>
</div>