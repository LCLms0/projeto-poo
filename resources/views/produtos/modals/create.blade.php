<div class="modal fade" id="modalProduto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-secondary" style="background-color: #1e2125;">
            <div class="modal-header border-secondary">
                <h5 class="text-white fw-semibold">
                    <i class="bi bi-box-seam me-2 text-primary"></i> Adicionar Novo Produto
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-white text-start">
                    <div class="mb-3">
                        <label class="form-label">Nome do Produto</label>
                        <input type="text" name="nome" class="form-control text-white bg-dark border-secondary" placeholder="Ex: Pomada Modeladora Efeito Matte" value="{{ old('nome') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control text-white bg-dark border-secondary" placeholder="Ex: Barber Premium" value="{{ old('marca') }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preço de Venda (R$)</label>
                            <input type="number" name="preco_venda" step="0.01" class="form-control text-white bg-dark border-secondary" placeholder="0.00" value="{{ old('preco_venda') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantidade em Estoque</label>
                            <input type="number" name="quantidade_estoque" class="form-control text-white bg-dark border-secondary" placeholder="Ex: 15" value="{{ old('quantidade_estoque') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto do Produto</label>
                        <input type="file" name="foto" class="form-control text-white bg-dark border-secondary" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal" style="background-color: #343a40; border: none;">Cancelar</button>
                    <button type="submit" class="btn btn-login px-4 py-2">Salvar Produto</button>
                </div>
            </form>
        </div>
    </div>
</div>