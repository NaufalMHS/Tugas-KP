<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin'); ?>">
        <img src="assets/img/logo_lrs-01.png" alt="LRS" width="150px">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        administrator
    </div>


    <!-- Nav Item - Dashboard -->

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin'); ?>">
            <i class="fas fa-fw fa-terminal"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Surat
    </div>

    <!-- Nav Item - surat keluar -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratmasuk/tambahdata'); ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat Masuk</span></a>
    </li>

    <!-- Nav Item - surat keluar backdate -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratkeluar/tambahdata'); ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat Keluar Backdate</span></a>
    </li>

    <!-- Nav Item - surat masuk -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratkeluar/tambahdatanow'); ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat Keluar</span></a>
    </li>
    <!-- Nav Item - Tamplate surat -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jenissurat/tambahdata'); ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Jenis Surat</span></a>
    </li>
    <!-- Nav Item - Tamplate surat -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-paperclip"></i>
            <span>Tamplate Surat</span></a>
    </li> -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA
    </div>

    <!-- Nav Item - surat keluar -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratmasuk'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Data Surat Masuk</span></a>
    </li>

    <!-- Nav Item - surat masuk -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratkeluar'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Data Surat Keluar</span></a>
    </li>
    <!-- Nav Item - surat respon -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('suratrespon'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Data Surat Respon</span></a>
    </li>
    <!-- Nav Item - surat respon -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jenissurat'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Data Jenis Surat</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - surat keluar -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('suratmasuk/laporan'); ?>">Laporan Surat Masuk</a>
                <a class="collapse-item" href="<?php echo base_url('suratkeluar/laporan'); ?>">Laporan Surat Keluar</a>
                <a class="collapse-item" href="<?php echo base_url('suratrespon/laporan'); ?>">Laporan Surat Respon</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#approve" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Approve</span>
        </a>
        <div id="approve" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('suratkeluar/approved'); ?>">Surat Keluar</a>
                <a class="collapse-item" href="<?php echo base_url('suratrespon/approve'); ?>">Surat Respon</a>

            </div>
        </div>
    </li>


    <!-- Heading -->
    <div class="sidebar-heading">
        USER
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user'); ?>">
            <i class="fas fa-fw fa-robot"></i>
            <span>Profile</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->