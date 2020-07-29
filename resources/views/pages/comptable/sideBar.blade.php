<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
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
                            <a class="nav-link" href="{{ route('comptable.index') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscription.create') }}">
                                <i class="ni ni-archive-2 text-green"></i>
                                <span class="nav-link-text">Inscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reinscription.create') }}">
                                <i class="ni ni-chart-pie-35 text-info"></i>
                                <span class="nav-link-text">Réinscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('payement.create') }}">
                                <i class="ni ni-money-coins text-red"></i>
                                <span class="nav-link-text">Payement</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eleve.create') }}">
                                <i class="ni ni-hat-3 text-green"></i>
                                <span class="nav-link-text">Nos classes</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
        </div>
    </div>
</nav>
