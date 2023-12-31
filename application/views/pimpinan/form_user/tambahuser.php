<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/users'); ?>">Data User</a></li>
                        <li class="breadcrumb-item active">Tambah Data User</li>
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
                            Tambah Data User
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/proses_tambahuser'); ?>" method="post" role="form">
                                <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                    <div class="alert alert-success alert-dismissible">
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

                                <div class="form-group">
                                    <label for="username" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Silahkan isi Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Silahkan isi Username" required>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Silahkan isi Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="form-group ">
                                    <label for="role" class="form-label">Level</label>
                                    <select name="level" id="" class="form-control" style="width: 50%;" required>
                                        <option value="" selected="" disabled>-- Pilih Level User --</option>
                                        <option value="0">User Admin</option>
                                        <option value="1">User Pimpinan</option>
                                        <option value="2">User Koordinator Perbaikan</option>
                                       
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group" align="center">
                                    <a href="<?= base_url('admin/users'); ?>" type="button" class="btn btn-sm btn-danger" onclick="" name="btn_kembali"><i class="fa fa-arrow-left mr-2"></i>Batal</a>
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