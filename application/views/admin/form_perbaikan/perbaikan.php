<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">PERBAIKAN DISETUJUI</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perbaikan disetujui</li>
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
                                Data Perbaikan yang proses nya sudah selesai atau sudah disetujui
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <a href="<?= base_url('admin/tambah_perbaikan'); ?>" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</a>
                            <button data-toggle="modal" data-target="#static_perbaikan_bulanan" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-success" name="static_perbaikan_bulanan"><i class="fa fa-table"></i>&nbsp;Pilih Periode</button>
                            
                            <table id="example1" class="table table-bordered table-striped table-hover" >
                                <thead>
                                <tr>
                                        <?php foreach ($total_data as $td) : ?>
                                            <th colspan="8" style="text-align: center;">Total Perbaikan <?php echo $label ?> : <span style="color: red;">Rp&nbsp;<?= number_format($td->biaya_perbaikan); ?></span></th>
                                        <?php endforeach; ?>
                                        </tr>

                                    <tr align="center">
                                        <th style="width :10px;">No.</th>
                                        
                                        <th style="width: 100px;" >NOPOL</th>
                                        <th>Nama Bengkel</th>
                                        <th style="width: 60px;" >Tanggal</th>
                                        <th style="width: 200px;">Keterangan</th>
                                        <th >Foto Nota</th>
                                        <th>Biaya</th>
                                        


                                        <th style="width:58px" >Aksi</th>
                                        <!-- <th style="width:58px">Hapus</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (is_array($perbaikan)) { ?>
                                        <?php foreach ($perbaikan as $sm) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                
                                                <td><?= $sm->nopol ?></td>
                                                <td><?= $sm->nama_bengkel ?></td>
                                                <td><?= $sm->tgl_perbaikan ?></td>
                                                <td><?= $sm->keterangan ?></td>
                                                <td><img src="<?= base_url('assets/upload/perbaikan/foto_nota/' . $sm->foto_nota); ?>" class="img img-box" width="100" height="100" alt="<?= $sm->foto_nota; ?>"></td>

                                                <td>Rp <?= number_format($sm->biaya_perbaikan) ?></td>
                                            
                                                <td><a href="<?= base_url('admin/edit_perbaikan/' . $sm->id_perbaikan); ?>" type="button" class="btn btn-sm btn-success" name="btn_edit"><i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="<?= base_url('admin/hapus_data_perbaikan/' . $sm->id_perbaikan); ?>" type="button" class="btn btn-sm btn-danger btn-delete" name="btn_delete"><i class="fa fa-trash" title="Hapus"></i></a></td>
                                                <!-- ulah function tombol hapus nya di admin controller -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                                <tr>
                                    <thead>
                                        
                                    </thead>
                                </tr>
                            </table>
                        </div>
                    </div>
                    

<!-- Modal -->
<div class="modal fade" id="static_perbaikan_bulanan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="staticBackdropLabel">Tampilkan Bulanan</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="<?= site_url('admin/tabel_perbaikan'); ?>" method="get" role="form">

                                    <div class="form-group row">
                                            <label for="bulan" class="col-sm-3 col-form-label">NOPOL</label>
                                            <div class="col-sm-6">


                                                <select name="nopol" class="form-control" id="nopol">
                                                    <option value="" selected>NOPOL</option>
                                                    <?php foreach ($tangki as $s) : ?>
                                                        <option value="<?= $s->nopol; ?>"><?= $s->nopol; ?> - <?= $s->volume_tangki; ?> Liter
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>

                                            <div class="form-group row">
                                            <label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
                                            <div class="col-sm-6">
                                                <select name="bulan" id="bulan" class="form-control">
                                                    <option value="" selected="">--Pilih Bulan--</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="tahun" class="form-control" id="tahun" value="<?= date('Y'); ?>">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
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