<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
        <!-- <i class="fas fa-laugh-wink"></i> -->
        <i class="fas fa-book-reader"></i>
    </div>
    <div class="sidebar-brand-text mx-2">Komikku</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">



<!-- Nav Item - Users -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('users')?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Dashboard -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('tbcomedy')?>">
        <i class="fas fa-chevron-circle-right"></i>
        <span>Comedy</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('tbaction') ?>">
        <i class="fas fa-chevron-circle-right"></i>
        <span>Action</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('tbhorror') ?>">
        <i class="fas fa-chevron-circle-right"></i>
        <span>Horror</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->