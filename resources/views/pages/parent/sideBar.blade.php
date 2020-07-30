<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center">
                <a class="navbar-brand" href="#">
                    <h2>Sama Ecole</h2>
                </a>
                <div class=" ml-auto ">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('parent.index') }}">
                                    <i class="ni ni-shop text-primary"></i>
                                    <span class="nav-link-text">Tableau de bord</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('parentEleve.index') }}">
                                    <i class="ni ni-shop text-primary"></i>
                                    <span class="nav-link-text">Mes enfants</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-bell-55 text-primary"></i>
                                    <span class="nav-link-text">Notifications</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-money-coins text-primary"></i>
                                    <span class="nav-link-text">Mensualité</span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </nav>
