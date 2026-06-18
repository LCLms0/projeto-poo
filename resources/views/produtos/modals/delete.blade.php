<div class="modal fade" id="modalDeletarProduto{{ $produto->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-secondary bg-dark text-white text-center p-3">
            <div class="modal-body">
                <i class="bi bi-exclamation-triangle text-danger mb-3" style="font-size: 3rem;"></i>
                <h5 class="fw-semibold text-white mb-2">Excluir Produto?</h5>
                <p class="text-white-50 small">Tem certeza que quer remover <strong class="text-primary">"{{ $produto->nome }}"</strong> do estoque? Essa ação é permanente.</p>
                
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="mt-4 d-flex justify-content-center gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal" style="background-color: #343a40; border: none;">Não</button>
                    <button type="submit" class="btn btn-danger btn-sm px-3">Sim, Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>