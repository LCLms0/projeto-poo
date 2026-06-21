<div class="modal fade" id="modalBarbeiro" tabindex="-1" aria-labelledby="modalBarbeiroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white" style="background-color: #1e2125; border: 1px solid rgba(255,255,255,0.1);">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title montserrat" id="modalBarbeiroLabel">
                    <i class="bi bi-person-plus me-2 text-primary"></i>Adicionar Novo Barbeiro
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-shadow="none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('barbeiros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Barbeiro *</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required placeholder="Ex: Rodrigo Silva">
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone / WhatsApp</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(11) 99999-9999">
                    </div>

                    <div class="mb-3">
                        <label for="especialidade" class="form-label">Especialidade Principal</label>
                        <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ old('especialidade') }}" placeholder="Ex: Degradê, Barba Terapia, Pivot Point">
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografia / Resumo</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Conte um pouco sobre as habilidades do profissional...">{{ old('bio') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto de Perfil</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-login px-4">Salvar Barbeiro</button>
                </div>
            </form>
        </div>
    </div>
</div>