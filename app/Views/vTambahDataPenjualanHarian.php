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
                        <div class="card-header ">
                            <h3 class="card-title mt-2">
                                Form Input Data Penjualan Hari ini
                            </h3>
                            <a href="/incomeHarian" class="btn btn-danger float-right"><i class='fas fa-arrow-left mr-2'></i>BACK</a>
                            <div class="card-tools">
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="container-fluid d-flex">
                                    <form class="w-100"action="/saveJualH" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kue</label>
                                            <input type="text" name="nama" class="form-control" autofocus id="exampleInputEmail1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" id="jumlah" >
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <label for="exampleInputPassword1" class="form-label">Harga</label>
                                            <div class="d-flex flex-row">
                                                <span class="mx-3">Rp.</span><input type="number" name="harga" class="form-control" id="harga" >
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Total</label>
                                            <div class="d-flex flex-row">
                                                <span class="mx-3">Rp.</span><input type="number" name="total" class="form-control" id="total" disabled>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"> Submit</i></button>
                                    </form>
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