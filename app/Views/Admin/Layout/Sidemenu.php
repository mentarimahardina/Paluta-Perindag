<?= $this->include('Admin/Layout/Header') ?>
<style>
    .nav-sidebar>.nav-item.menu-open>.nav-link {
        background-color: rgb(0, 123, 255, .1) !important;
    }

    .nav-treeview>.nav-item>.nav-link.active {
        background-color: rgb(0, 123, 255, 1) !important;
        color: #fff !important;

    }
</style>

<aside class="<?php if ($page == 'Aktivitas') {
    echo 'main-sidebar';

    // echo   'sidebar-mini sidebar-collapse main-sidebar';
} else {
    echo 'main-sidebar';
} ?>  sidebar-dark-primary elevation-4">
    <a href="/dashboard" class="brand-link">
        <img src="Assets/settings/<?= $setting_logo ?>" alt="AdminLTE Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Control Panel</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">
                        <i class="nav-icon fas fa-rocket"></i>
                        <p> Lihat Situs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/instansi') ?>"
                        class="nav-link <?php if ($page == 'Instansi') { ?> active<?php } ?>">
                        <i class="far fa-building nav-icon"></i>
                        <p>Data Instansi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/staff') ?>"
                        class="nav-link <?php if ($page == 'Staff') { ?> active<?php } ?>">
                        <i class="far fa-user nav-icon"></i>
                        <p>Staff</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/unit') ?>"
                        class="nav-link <?php if ($page == 'Unit') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-plug"></i>
                        <p>Unit Usaha</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/produk') ?>"
                        class="nav-link <?php if ($page == 'Produk') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-gopuram"></i>
                        <p>Produk </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/events') ?>"
                        class="nav-link <?php if ($page == 'Event') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Event</p>
                    </a>
                </li>   
                <li class="nav-item">
                    <a href="<?= base_url('/news') ?>"
                        class="nav-link <?php if ($page == 'Berita') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('/slider') ?>"
                        class="nav-link <?php if ($page == 'Slider') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/pesan') ?>"
                        class="nav-link <?php if ($page == 'Kirim Pesan') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Poling & Pesan</p>
                    </a>
                </li>

                <?php if ($type == 'super_user') { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/pengguna') ?>"
                            class="nav-link <?php if ($page == 'Pengguna') { ?> active<?php } ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/logs') ?>"
                            class="nav-link <?php if ($page == 'Aktivitas') { ?> active<?php } ?>">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Aktivitas</p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url('/pengaturan') ?>"
                        class="nav-link <?php if ($page == 'Pengaturan') { ?> active<?php } ?>">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>Pemeliharaan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<div class="content-wrapper" style="min-height: 78vh;">
    <section class="content">
        <div class="container-fluid">