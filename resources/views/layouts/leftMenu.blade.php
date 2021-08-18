<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4"
    style="background-color: #2a3f54 !important;">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="images/favitierras.png" alt="Tierras Blancas" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Tierras Blancas</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/test.jpg" height="160px" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <a class="d-block">{{ Auth::user()->puesto }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" id="search-side" type="search" placeholder="Buscar"
                    aria-label="Search">
                <style>
                    #search-side {
                        background-color: #183552;
                        border: 1px solid #56606a;
                        color: #fff;
                    }

                    #sidebar-search-btn {
                        background-color: #183552;
                        border: 1px solid #56606a;
                        color: #fff;
                    }

                </style>
                <div class="input-group-append">
                    <button id="sidebar-search-btn" class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Veterinaria --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-paw"></i>
                        <p>
                            Veterinaria
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="macliente" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ingreso Cliente/Mascota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lvetcliente" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="vetmascota" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Mascotas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="vetmedico" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ingreso Medico</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="calendario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calendario</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
