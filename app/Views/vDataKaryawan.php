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
                <i class="nav-icon fas fa-users me-3"></i>
                  Data Karyawan
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="/insertDataKaryawan" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah data</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="container-fluid">
                    <table id="dataTable" class="table" style="text-align:center">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          foreach($data as $row) : ?>
                            <tr>
                            <th scope="row">$i++</th>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['no_hp']?></td>
                            <td><?=$row['jabatan']?></td>
                            <td>
                              <a href="<?=base_url('/editDataKaryawan/').$row['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                              <a href="#" onclick="hapus('<?=base_url('/karyawan/delete').$row['id']?>')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                            </td>
                            </tr>
                            <?php endforeach ?>
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