<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
      <img src="/assets/images/logo_cake.png" alt="Logo" class="img-circle elevation-2">
      </div>
        <div class="info">
            <a href="/" class="text-light">My Sweeties Cake</a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/images/admin.jpg" class="img-circle profile_picture" alt="User Image">
        </div>
        <div class="info">
          <span class="text-light">Hallo, Admin!!</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Penjualan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              </li>
              <li class="nav-item">
                <a href="<?=base_url('/incomeHarian')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('/incomeBulanan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Bulanan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Data Pengeluaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?=base_url('/outcomeHarian')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran Harian</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?=base_url('/outcomeBulanan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran Bulanan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="<?=base_url('/pendataanKaryawan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="<?=base_url('/pendataanPengguna')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>