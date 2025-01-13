<aside id="sidebar">
    <div class="d-flex justify-content-between p-4 border-bottom border-success-subtle">
        <div class="sidebar-logo">
            <a href="index.php"><img src="../../../public/assets/images/jombang-logo.png" alt="Logo" class="img-fluid" style="max-height: 40px;"> <span class="ml-2">Dukcapil Care Kab. Jombang</span></a>
        </div>
        <button class="toggle-btn border-0">
            <i id="icon" class="fa-solid fa-bars-staggered"></i>
        </button>
    </div>
    <ul class="sidebar-nav">

        <li class="sidebar-item">
            <a href="?" class="sidebar-link">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="?url=profil" class="sidebar-link">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="?" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#masterData" aria-expanded="false" aria-controls="masterData">
                <i class="fa-solid fa-server"></i>
                <span>Master Data</span>
            </a>
            <ul id="masterData" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="?url=data-petugas" class="sidebar-link">Data Petugas</a>
                </li>
                <li class="sidebar-item">
                    <a href="?url=data-penduduk" class="sidebar-link">Data Penduduk</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="?" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#pengaduan" aria-expanded="false" aria-controls="pengaduan">
                <i class="fa-solid fa-headset"></i>
                <span>Pengaduan</span>
            </a>
            <ul id="pengaduan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="?url=pengaduan-masuk" class="sidebar-link">Pengaduan Masuk</a>
                </li>
                <li class="sidebar-item">
                    <a href="?url=pengaduan-selesai" class="sidebar-link">Pengaduan Selesai</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer border-top border-success-subtle py-2">
        <a href="../logout.php" class="sidebar-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>