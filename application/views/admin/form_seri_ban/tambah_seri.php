<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data seri ban</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tabel_seri_ban'); ?>">Data Seri Ban</a></li>
                        <li class="breadcrumb-item active">Tambah Data Surat Tangki</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="width: 30%; margin-left: 35%;">
                        <div class="card-header">
                            Tambah Data Seri Ban
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Perhatian!</strong><br> <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>

                            <form action="<?= base_url('admin/proses_tambah_seri'); ?>" method="post" role="form" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="nopol" class="form-label">Nopol</label>
                                    <!-- <input type="text" name="nopol" class="form-control" id="nopol" placeholder="Masukkan Nopol" required> -->
                                    <select name="id_tangki" class="form-control" id="id_tangki">
                                        <option value="" selected>-- Pilih Nopol --</option>
                                        <?php foreach ($list_tangki as $s) { ?>
                                            <option value="<?= $s->id_tangki; ?>"><?= $s->nopol; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="date" class="form-label">Tanggal Beli</label>
                                    <input type="date" name="tanggal_beli" class="form-control" id="tanggal_beli" placeholder="Masukkan Tanggal Masa Beli" required>
                
                                <div class="form-group">
                                    <label for="tempat_beli" class="form-label">Tempat Beli</label>
                                    <input type="text" name="tempat_beli" class="form-control" id="tempat_beli" placeholder="Masukkan Tempat Pembelian" required>
                                </div>

                                <div class="form-group">
                                    <label for="no_seri_ban" class="form-label">Nomor Seri</label>
                                    <input type="text" name="no_seri_ban" class="form-control" id="no_seri_ban" placeholder="Masukkan Nomor Seri Ban" required>
                                </div>

                                <div class="form-group">
                                    <label for="ukuran_ban" class="form-label">Ukuran Ban</label>
                                    <input type="text" name="ukuran_ban" class="form-control" id="ukuran_ban" placeholder="Masukkan Ukuran Ban" required>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Tambahkan Keterangan" required>
                                </div>

                                <hr>
                                <div class="form-group" align="center">
                                    <a href="<?= base_url('admin/tabel_seri_ban'); ?>" type="button" class="btn btn-sm btn-danger" name="btn_kembali"><i class="fa fa-arrow-left mr-2"></i>Batal</a>
                                    <!-- <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-eraser mr-2"></i>Reset</button> -->
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check mr-2"></i>Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('admin/template/script') ?>

</body>

</html>