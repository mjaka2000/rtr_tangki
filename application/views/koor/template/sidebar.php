<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position:absolute ; background-color: #2d1111;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>assets/style/logo/logo.png" width="100px" height="100px" alt="koorLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>PT. RTR</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
        <div class="image">
            <!-- <?php foreach ($avatar as $a) { ?>
                    <img src="<?= base_url('assets/upload/user/' . $a->nama_file); ?>" class=" img-responsive img-circle" alt="User Image">
                <?php } ?> -->
        </div>
        <!-- <div class="info">
                <a href="#" class="d-block">user <strong><?= $this->session->userdata('name') ?></strong></a>
            </div> -->
        <!-- </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- <li class="nav-header">MAIN NAVIGATION</li> -->
                <li class="nav-item">
                    <a href="<?= base_url('koor') ?>" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                <li class="nav-item ">
                    <!-- <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a> -->
                    <ul class="nav nav-treeview">

                        <!-- <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li> -->

                    </ul>
                </li>
                <!-- <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_supir" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Supir

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_tangki" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tangki</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_bengkel" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Bengkel</p>
                            </a>
                        </li>

                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_surat_tangki" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Surat Tangki</p>
                    </a>

                </li> -->
                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_exp_surat" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Exp Surat</p>
                    </a> -->

                </li>

                <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_tangki" class="nav-link">
                                <i class="nav-icon fa fa-truck"></i>
                                <p>Data Tangki</p>
                            </a>
                        </li>

                <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_seri_ban" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Seri Ban</p>
                    </a>

                </li>


                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_supir_tangki" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Supir Tangki</p>
                    </a> -->

                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_service_masuk" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Perbaikan Masuk</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_perbaikan" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Perbaikan Disetujui</p>
                    </a>

                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/tabel_pengeluaran" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Pengeluaran</p>
                    </a>

                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>
                            KEBERANGKATAN
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_tujuan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TUJUAN</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/tabel_angkutan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ANGKUTAN</p>
                            </a>
                        </li>


                    </ul>

                </li>

                <!-- <li class="nav-item">
                    <a href="<?= base_url(); ?>koor/report" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i> <p>Laporan</p>
                    </a>

                </li> -->


                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-text"></i>
                        <p>
                            LAPORAN / REPORT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <!-- <li class="nav-item">
                            <a href="<?= base_url(); ?>report_koor/tabel_rep_supir_tangki" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SERI BAN</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>report_koor/tabel_rep_tangki" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TRUK TANGKI</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>report_koor/tabel_rep_seri_ban" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SERI BAN</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>report_koor/tabel_rep_service_masuk" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PERBAIKAN MASUK</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <!-- <a href="<?= base_url(); ?>report/tabel_rep_perbaikan" class="nav-link"> -->
                            <a href="<?= base_url(); ?>report_koor/tabel2_rep_perbaikan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PERBAIKAN DISETUJUI</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <!-- <a href="<?= base_url(); ?>report/tabel_rep_perbaikan" class="nav-link"> -->
                            <a href="<?= base_url(); ?>report_koor/tabel_angkutan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ANGKUTAN</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <hr>
                <!-- <li class="nav-header">PENGATURAN</li> -->
                <!-- <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Menu User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>koor/users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                </li>
                    </ul> -->


                <li class="nav-item">
                    <a href="<?= base_url(''); ?>koor/proses_email_statusperbaikan" class="nav-link">
                        <i class="fas fa-envelope  nav-icon"></i>
                        <p>Email</p>
                    </a>
                </li>
                <hr>

                <li class="nav-item">
                    <a href="<?= base_url(''); ?>koor/signout" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>