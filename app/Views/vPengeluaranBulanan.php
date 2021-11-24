<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-1">
                <i class="fas fa-shopping-cart me-3"></i>
                  Pengeluaran Bulan ini
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="/insertPengeluaranBulanan" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah data</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="container-fluid d-flex flex-row">
                    <table class="table" style="text-align:center">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal<th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>18/11/2021</td>
                              <td></td>
                              <td>Tepung</td>
                              <td>3</td>
                              <td>Rp 7500</td>
                              <td>Rp 22500</td>
                              <td>
                              <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                            </td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>21/11/2021</td>
                              <td></td>
                              <td>Baking Soda</td>
                              <td>2</td>
                              <td>Rp 5000</td>
                              <td>Rp 10000</td>
                              <td>
                              <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?= $this->endSection(); ?>