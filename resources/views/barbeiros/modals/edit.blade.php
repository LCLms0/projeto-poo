<div class="modal fade" id="modalEditarBarbeiro{{ $barbeiro->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white" style="background-color: #1e2125; border: 1px solid rgba(255,255,255,0.1);">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title montserrat">
                    <i class="bi bi-pencil-square me-2 text-primary"></i>Editar Profissional
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('barbeiros.update', $barbeiro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome do Barbeiro *</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome', $barbeiro->nome) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone / WhatsApp</label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone', $barbeiro->telefone) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Especialidade Principal</label>
                        <input type="text" class="form-control" name="especialidade" value="{{ old('especialidade', $barbeiro->especialidade) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biografia / Resumo</label>
                        <textarea class="form-control" name="bio" rows="3">{{ old('bio', $barbeiro->bio) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Atualizar Foto de Perfil</label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                        @if(!empty($barbeiro->foto))
                            <div class="mt-2 small text-muted">Já existe uma imagem salva para este barbeiro.</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-login px-4">Atualizar Dados</button>
                </div>
            </form>
        </div>
    </div>
</div>