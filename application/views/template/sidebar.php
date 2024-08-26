<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center" style="color: #FFF;"><i class="fa fa-star"></i> PENGGUNA</span> <i class="fa fa-star"></i></li>
            <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                <!-- menu-open -->
                <a href=" <?= base_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'profil' ? 'active' : '' ?>">
                <a href="<?= base_url('profil') ?>">
                    <i class="fa fa-user"></i> <span>Profil</span>
                </a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'bantuan' ? 'active' : '' ?>">
                <a href="<?= base_url('bantuan') ?>">
                    <i class="fa fa-question-circle"></i> <span>Bantuan</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url('logout') ?>">
                    <i class="fa fa-power-off"></i> <span>Logout</span>
                </a>
            </li>

            <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                <li class="header text-center" style="color: #FFF;"><i class="fa fa-star"></i> GURU</span> <i class="fa fa-star"></i></li>
                <li class="<?= $this->uri->segment(1) == 'jadwalku' ? 'active' : '' ?>">
                    <a href="<?= base_url('jadwalku') ?>">
                        <i class="fa fa-calendar"></i> <span>Jadwal Saya</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'mapelku' ? 'active' : '' ?>">
                    <a href="<?= base_url('mapelku') ?>">
                        <i class="fa fa-file-text"></i> <span>Mapel yang diajarkan</span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                <li class="header text-center" style="color: #FFF;"><i class="fa fa-star"></i> BAGIAN KURIKULUM</span> <i class="fa fa-star"></i></li>
                <li class="treeview <?= $this->uri->segment(1) == 'jam' || $this->uri->segment(1) == 'mata-pelajaran' || $this->uri->segment(1) == 'jadwal-khusus' ? 'menu-open'  : '' ?> <?= $this->uri->segment(1) == 'jam' || $this->uri->segment(1) == 'mata-pelajaran' || $this->uri->segment(1) == 'jadwal-khusus' ? 'active'  : '' ?>">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Update Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?= $this->uri->segment(1) == 'mata-pelajaran' ? 'active' : '' ?>"><a href="<?= base_url('mata-pelajaran') ?>"> Mata Pelajaran</a></li>
                        <li class="<?= $this->uri->segment(1) == 'jadwal-khusus' ? 'active' : '' ?>"><a href="<?= base_url('jadwal-khusus') ?>"> Jadwal Khusus</a></li>
                        <!-- <li><a href="pages/forms/editors.html"> Hari</a></li> -->
                        <li class="<?= $this->uri->segment(1) == 'jam' ? 'active' : '' ?>"><a href="<?= base_url('jam') ?>"> Jam</a></li>
                    </ul>
                </li>
                <li class="<?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>">
                    <a href="<?= base_url('guru') ?>">
                        <i class="fa fa-users"></i> <span>Data Guru</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'guru-pengampu' ? 'active' : '' ?>">
                    <a href="<?= base_url('guru-pengampu') ?>">
                        <i class="fa fa-users"></i> <span>Guru Pengampu</span>
                    </a>
                </li>
                <!-- <li class="<?= $this->uri->segment(1) == 'request-jadwal' ? 'active' : '' ?>">
                    <a href="<?= base_url('request-jadwal') ?>">
                        <i class="fa fa-table"></i> <span>Request Jadwal</span>
                    </a>
                </li> -->
                <li class="<?= $this->uri->segment(1) == 'tahun-akademik' ? 'active' : '' ?>">
                    <a href=" <?= base_url('tahun-akademik') ?>">
                        <i class="fa fa-calendar"></i> <span>Tahun Akademik</span>
                    </a>
                </li>
                <!-- <li class="<?= $this->uri->segment(1) == 'request-jadwal' ? 'active' : '' ?>">
                <a href=" <?= base_url('request-jadwal') ?>">
                    <i class="fa fa-edit"></i> <span>Request Jadwal</span>
                </a>
            </li> -->
                <li class="<?= $this->uri->segment(1) == 'penjadwalan' ? 'active' : '' ?>">
                    <a href="<?= base_url('penjadwalan') ?>">
                        <i class="fa fa-file-text"></i> <span>Penjadwalan</span>
                    </a>
                </li>

            <?php } ?>


            <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                <li class="header text-center" style="color: #FFF;"><i class="fa fa-star"></i> ADMINISTRATOR</span> <i class="fa fa-star"></i></li>
                <!-- <li class="<?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>">
                <a href="<?= base_url('guru') ?>">
                    <i class="fa fa-users"></i> <span>Guru</span>
                </a>
            </li> -->
                <li class="treeview <?= $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'guru-pengampu' ? 'menu-open'  : '' ?> <?= $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'guru-pengampu' ? 'active'  : '' ?>">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Guru</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?= $this->uri->segment(1) == 'guru' ? 'active' : '' ?>"><a href="<?= base_url('guru') ?>"> Data Guru</a></li>
                        <li class="<?= $this->uri->segment(1) == 'guru-pengampu' ? 'active' : '' ?>"><a href="<?= base_url('guru-pengampu') ?>"> Guru Pengampu</a></li>

                    </ul>
                </li>
                <!-- <li class="<?= $this->uri->segment(1) == 'ruangan' ? 'active' : '' ?>">
                    <a href="<?= base_url('ruangan') ?>">
                        <i class="fa fa-home"></i> <span>Ruangan</span>
                    </a>
                </li> -->
                <li class="<?= $this->uri->segment(1) == 'kelas' ? 'active' : '' ?>">
                    <a href="<?= base_url('kelas') ?>">
                        <i class="fa fa-building"></i> <span>Kelas</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'mata-pelajaran' ? 'active' : '' ?>">
                    <a href="<?= base_url('mata-pelajaran') ?>">
                        <i class="fa fa-list-alt"></i> <span>Mata Pelajaran</span>
                    </a>
                </li>


                <li class="<?= $this->uri->segment(1) == 'jam' ? 'active' : '' ?>">
                    <a href="<?= base_url('jam') ?>">
                        <i class="fa fa-clock-o"></i> <span>Atur Sesi</span>
                    </a>
                </li>
               
                <li class="<?= $this->uri->segment(1) == 'jadwal-khusus' ? 'active' : '' ?>">
                    <a href="<?= base_url('jadwal-khusus') ?>">
                        <i class="fa fa-edit"></i> <span>Jadwal Khusus</span>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                    <a href="<?= base_url('users') ?>">
                        <i class="fa fa-users"></i> <span>Users Sistem</span>
                    </a>
                </li>

                <!-- <li class="header text-center" style="color: #FFF;"><i class="fa fa-star"></i> ORANG TUA MURID</span> <i class="fa fa-star"></i></li>
                <li class="">
                    <a href="<?= base_url('jadwal-mapel') ?>">
                        <i class="fa fa-list-alt"></i> <span>Jadwal Mata Pelajaran</span>
                    </a>
                </li> -->

            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>