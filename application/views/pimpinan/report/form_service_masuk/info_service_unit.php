<?php $this->load->view('template/head'); ?>
<?php $this->load->view('pimpinan/template/nav'); ?>
<?php $this->load->view('pimpinan/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">PERBAIKAN MASUK</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perbaikan Masuk</li>
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
                            Detail Perbaikan atau service yang masuk
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <!-- <a href="<?= base_url('pimpinan/tambah_service_masuk'); ?>" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</a> -->

                            <?php foreach ($list_service_masuk as $d) : ?>
                                <a href="<?= base_url('report_pimpinan/cetak_info_service_unit/' . $d->id_service_masuk); ?>" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-success" name=""><i class="fa fa-print mr-2" aria-hidden="true"></i>Cetak</a>

                                <table class="table" style="width:100%">
                                    <tr>
                                        <th style="vertical-align: middle">NOPOL</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;<?= $d->nopol; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle">Nama Bengkel</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;<?= $d->nama_bengkel; ?> </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle">Tanggal Masuk</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;<?= $d->tgl_masuk; ?> </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle">Keterangan</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;<?= $d->keluhan; ?> </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="vertical-align: middle">Biaya</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;Rp<?= number_format($d->biaya); ?> </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <th style="vertical-align: middle">Status</th>
                                    <td style="vertical-align: middle;">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    :&nbsp;
                                                    <?php if ($d->status == 0) { ?>
                                                        PROSES
                                                    <?php } elseif ($d->status == 1) { ?>
                                                        SUDAH SELESAI
                                                    <?php } ?>

                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <!-- <tr>
                                        <th style="vertical-align: middle">tgl</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;<?= date('d-m-Y', strtotime($d->tgl_perbaikan)); ?>

                           </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <th style="vertical-align: middle">Ket. Perbaikan</th>
                                        <form action="<?= site_url('pimpinan/proses_update_ket_service'); ?>" method="post" role="form">
                                            <td style="vertical-align: middle;">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <input type="hidden" name="id_perbaikan_gst" value="<?= $d->id_perbaikan_gst; ?>">
                                                            :&nbsp;<span><select name="ket_perbaikan" class="form-control" id="ket_perbaikan">
                                                                    <option value="">-- Status --</option>
                                                                    <?php if ($d->ket_perbaikan == "Selesai Diperbaiki") { ?>
                                                                        <option value="Selesai Diperbaiki" selected>Selesai Diperbaiki</option>
                                                                        <option value="Masih Terkendala">Masih Terkendala</option>
                                                                    <?php } else { ?>
                                                                        <option value="Selesai Diperbaiki">Selesai Diperbaiki</option>
                                                                        <option value="Masih Terkendala" selected>Masih Terkendala</option>
                                                                    <?php } ?>

                                                                </select>
                                                                <span><button type="submit" class="btn btn-xs btn-success"><i class="fa fa-check mr-2"></i>Update</button></span>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                    </tr> -->
                                    <!-- <tr>
                                        <th style="vertical-align: middle">Biaya Perbaikan</th>
                                        <td style="vertical-align: middle;">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        :&nbsp;Rp&nbsp;<?= number_format($d->biaya_perbaikan); ?> </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->
                                <?php endforeach; ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('pimpinan/template/script') ?>
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