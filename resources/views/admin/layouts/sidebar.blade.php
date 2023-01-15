<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

    <div class="position-sticky pt-3">


        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin/">
                    <i class="bi bi-house-door-fill"></i>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pesanan') ? 'active' : '' }}" href="/admin/pesanan">
                    <i class="bi bi-people-fill"></i>
                    Penghuni
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/kamar') ? 'active' : '' }}" href="/admin/kamar">
                    <i class="bi bi-bookmark-check-fill"></i>
                    Kamar
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pembayaran') ? 'active' : '' }}" href="/admin/pembayaran">
                    <i class="bi bi-credit-card-fill"></i>
                    Pembayaran </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/laporan') ? 'active' : '' }}" href="/admin/laporan">
                    <i class="bi bi-wallet-fill"></i>
                    Laporan
                </a>
            </li>
        </ul>
        <hr class="my-4">
        <div class="row ms-3">
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                <div class="image">
                    <img src="/foto_profil/pp.jpg" class="img-circle elevation-2" width="20px" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block ms-2">{{Auth::user()->name}}</a>
                </div>
            </div>
            <div class="row">
                <a href="/logout" class="btn btn-danger col-8"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
            </div>
        </div>
    </div>
</nav>