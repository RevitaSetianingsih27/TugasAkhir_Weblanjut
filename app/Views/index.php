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
                <h3 class="card-title">
                <i class="fas fa-chart-line me-3"></i>
                  Overview
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="container-fluid d-flex flex-row">
                    <!-- Status Box (Overview) -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>150</h3>
                          <p>Kue Terjual Bulan ini</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?=base_url('/incomeBulanan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>Rp.300000</h3>
                          <p>Pengeluaran Bulan ini</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-cash"></i>
                        </div>
                        <a href="<?=base_url('/outcomeBulanan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>500</h3>
                          <p>Pengguna Terdaftar</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="<?=base_url('/outcomeBulanan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-secondary">
                        <div class="inner">
                          <h3>20</h3>
                          <p>Karyawan Bekerja</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="<?=base_url('/outcomeBulanan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div><!-- end Stat Box -->
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