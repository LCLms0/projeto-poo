<div class="modal fade" id="modalEditarServico{{ $servico->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-secondary" style="background-color: #1e2125;">
            <div class="modal-header border-secondary">
                <h5 class="text-white fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-primary"></i> Editar Serviço
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="{{ route('servicos.update', $servico) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-white text-start">
                    <div class="mb-3">
                        <label class="form-label">Nome do Serviço</label>
                        <input type="text" name="nome" class="form-control text-white bg-dark border-secondary" value="{{ $servico->nome }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preço (R$)</label>
                        <input type="number" name="preco" step="0.01" class="form-control text-white bg-dark border-secondary" value="{{ $servico->preco }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control text-white bg-dark border-secondary" rows="3" required>{{ $servico->descricao }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alterar Foto (Deixe em branco para manter a atual)</label>
                        <input type="file" name="foto" class="form-control text-white bg-dark border-secondary" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal" style="background-color: #343a40; border: none;">Cancelar</button>
                    <button type="submit" class="btn btn-login px-4 py-2">Atualizar Dados</button>
                </div>
            </form>
        </div>
    </div>
</div>