<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tangki</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Tangki</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div id="loading">
            <img src="<?= base_url(); ?>assets/style/loading.gif" alt="loading" width="50%">
        </div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            KLIK Tombol <b>DETAIL</b> untuk melihat gambar truk tangki
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?= base_url('admin/tambah_tangki'); ?>" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</a>

                            <table id="example1" class="table table-bordered table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width :10px">No.</th>
                                        <th>Nopol</th>
                                        <th>Tahun Dibuat</th>
                                        <th>Volume Tangki</th>
                                        <th style="width:58px">Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (is_array($tangki)) { ?>
                                        <?php foreach ($tangki as $t) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $t->nopol ?></td>
                                                <td><?= $t->tahun_dibuat ?></td>
                                                <td><?= number_format($t->volume_tangki) ?>&nbsp;Liter</td>
                                                <td><a href="<?= base_url('admin/edit_tangki/' . $t->id_tangki); ?>" type="button" class="btn btn-sm btn-success" name="btn_edit" title="EDIT"><i class="fa fa-edit" title="EDIT"></i></a>&nbsp;
                                                <a href="<?= base_url('admin/hapus_data_tangki/' . $t->id_tangki); ?>" type="button" class="btn btn-sm btn-danger btn-delete" name="btn_delete" title="HAPUS"><i class="fa fa-trash" title="HAPUS"></i></a>
                                                <br>
                                                <a href="<?= base_url('admin/control_detail_tangki/' . $t->id_tangki); ?>" type="button" class="btn btn-xs btn-warning " name=""><i class="fa fa-circle-info"></i>&nbsp;DETAIL</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                                <tr>
                                    <thead>
                                        <th></th>
                                        <th style="width: 200px;"><input type="text" name="filter_nopol" class="form-control" id="filter_nopol" placeholder="Filter Nopol"></th>
                                        <th style="width: 200px;"><input type="text" name="filter_tahun_dibuat" class="form-control" id="filter_tahun_dibuat" placeholder="Filter Tahun Dibuat"></th>
                                        <th style="width: 200px;"><input type="text" name="filter_volume_tangki" class="form-control" id="filter_volume_tangki" placeholder="Filter Volume Tangki"></th>
                                        <th colspan="2"></th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('admin/template/script') ?>
<script>
    //* Script untuk menampilkan loading
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
                "body").style.visibility = "hidden";
            document.querySelector(
                "#loading").style.visibility = "visible";
        } else {
            document.querySelector(
                "#loading").style.display = "none";
            document.querySelector(
                "body").style.visibility = "visible";
        }
    };
</script>
<script type="text/javascript">
    $(function() {
        $('#example1').DataTable({
            // 'paging': true,
            // 'lengthChange': false,
            // 'searching': faslse,
            // 'ordering': false,
            // 'info': true,
            'autoWidth': false
        })
    }); //* Script untuk memuat datatable
</script>
<script type="text/javascript">
    $('.btn-delete').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: 'Hapus Data',
            text: 'Yakin ingin menghapus data?',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.isConfirmed) {
                window.location.href = getLink
            }
        })
        return false;
    }); //* Script untuk memuat sweetalert hapus data
</script>
</body>

</html>