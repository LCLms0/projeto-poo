<div class="modal fade" id="modalEditarProduto{{ $produto->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-secondary" style="background-color: #1e2125;">
            <div class="modal-header border-secondary">
                <h5 class="text-white fw-semibold">
                    <i class="bi bi-pencil-square me-2 text-primary"></i> Editar Produto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="{{ route('produtos.update', $produto) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-white text-start">
                    <div class="mb-3">
                        <label class="form-label">Nome do Produto</label>
                        <input type="text" name="nome" class="form-control text-white bg-dark border-secondary" value="{{ $produto->nome }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control text-white bg-dark border-secondary" value="{{ $produto->marca }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço (R$)</label>
                            <input type="number" name="preco_venda" step="0.01" class="form-control text-white bg-dark border-secondary" value="{{ $produto->preco_venda }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantidade</label>
                            <input type="number" name="quantidade_estoque" class="form-control text-white bg-dark border-secondary" value="{{ $produto->quantidade_estoque }}" required>
                        </div>
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