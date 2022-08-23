<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @can('index nasabah')
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('nasabah') }}"
                            aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Nasabah</span>
                        </a>
                    </li>
                @endcan

                @can('index pembiayaan')
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pembiayaan') }}"
                            aria-expanded="false">
                            <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                            <span class="hide-menu">Pembiayaan</span>
                        </a>
                    </li>
                @endcan

                @can('index pembayaran')
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pembayaran') }}"
                            aria-expanded="false">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <span class="hide-menu">Pembayaran</span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}"
                        aria-expanded="false">
                        <i class="fa-solid fa-user-group" aria-hidden="true"></i>
                        <span class="hide-menu">Manajemen Akun</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="sidebar-link waves-effect waves-dark sidebar-link border-0 d-block"
                            aria-expanded="false"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </form>

                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
