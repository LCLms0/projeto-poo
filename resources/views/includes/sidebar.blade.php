<div class="col-md-3 col-lg-2 bg-dark text-white montserrat border-end border-2 border-primary d-flex flex-column justify-content-between pb-4">
    <div class="nav flex-column nav-pills mt-0">

        <div>
            <img class="w-100 p-3" src="{{ asset('img/logo.png') }}" alt="logo">
        </div>

        <a class="nav-link text-white btn-sidebar mb-4" href="{{ route('dashboard') }}">
            <i class="bi bi-house-door-fill me-2"></i> Início
        </a>

        <a class="nav-link text-white btn-sidebar mb-4" href="#">
            <i class="bi bi-people-fill me-2"></i> Clientes
        </a>

        <a class="nav-link text-white btn-sidebar mb-4" href="{{ route('barbeiros.index') }}">
            <i class="bi bi-scissors me-2"></i> Barbeiros
        </a>

        <a class="nav-link text-white btn-sidebar mb-4" href="{{ route('servicos.index') }}">
            <i class="bi bi-card-checklist me-2"></i> Serviços
        </a>

    </div>

    <div class="px-2">
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            <button type="submit" class="nav-link text-white btn-logout rounded px-3 py-2 w-100 d-flex align-items-center border-0 text-start" style="cursor: pointer;">
                <i class="bi bi-box-arrow-right me-2"></i> Sair
            </button>
        </form>
    </div>
</div>