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
                                Form Edit Data Penjualan Bulanan
                            </h3>
                            <a href="/incomeBulanan" class="btn btn-danger float-right"><i class='fas fa-arrow-left mr-2'></i>BACK</a>
                            <div class="card-tools">
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="container-fluid d-flex">
                                    <form action="#" method="post">
                                    <input type="hidden" name="id" value="<?=$data['id']?>">
                                    <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control"  autofocus id="exampleInputEmail1" size="75%" value="<?=$data['tanggal']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kue</label>
                                            <input type="text" class="form-control" autofocus id="exampleInputEmail1" value="<?=$data['nama_barang']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$data['jumlah']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Harga</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?=$data['harga']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Total</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" value="<?=$data['total']?>">
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