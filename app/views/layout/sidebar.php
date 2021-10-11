<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading d-sm-none">Account</div>

                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon">
                        <i data-feather="bell"></i>
                    </div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>

                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon">
                        <i data-feather="mail"></i>
                    </div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>


                <div class="sidenav-menu-heading">Home</div>
                <a class="nav-link <?= ($data['title'] == 'Dashboard') ? 'active' : '' ?>" href="/home">
                    <div class="nav-link-icon">
                        <i data-feather="activity"></i>
                    </div>
                    Dashboard
                </a>

                <a class="nav-link <?= ($data['title'] == 'Data Buku') ? 'active' : '' ?>" href="<?= BASEURL ?>DataBukuController">
                    <div class="nav-link-icon">
                        <i data-feather="book-open"></i>
                    </div>
                    Data Buku
                </a>

                <a class="nav-link <?= ($data['title'] == 'Peminjaman Buku') ? 'active' : '' ?>" href="<?= BASEURL ?>DataBukuController">
                    <div class="nav-link-icon">
                        <i data-feather="book"></i>
                    </div>
                    Peminjaman Buku
                </a>

                <a class="nav-link <?= ($data['title'] == 'Daftar Anggota') ? 'active' : '' ?>" href="/home">
                    <div class="nav-link-icon">
                        <i data-feather="users"></i>
                    </div>
                    Daftar Anggota
                </a>

            </div>
        </div>

        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title"><?= $_SESSION['name'] ?></div>
            </div>
        </div>
    </nav>
</div>