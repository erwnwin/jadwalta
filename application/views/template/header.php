<header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">JDM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">JADWAL MAPEL</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                            <?php if (
                                $this->session->userdata('foto_pengguna') == null
                            ) { ?>
                                <img src="<?= base_url() ?>assets/user/guru1.png" class="user-image img-foto-profil-pengguna" alt="User Image">
                            <?php } else { ?>
                                <img src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" class="user-image img-foto-profil-pengguna" alt="User Image">
                            <?php } ?>
                            <span class="hidden-xs"><?=
                                                    $this->session->userdata('nama');
                                                    ?></span>
                        <?php } ?>
                        <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                            <?php if (
                                $this->session->userdata('foto_pengguna') == null
                            ) { ?>
                                <img src="<?= base_url() ?>assets/user/guru1.png" class="user-image img-foto-profil-pengguna" alt="User Image">
                            <?php } else { ?>
                                <img src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" class="user-image img-foto-profil-pengguna" alt="User Image">
                            <?php } ?>
                            <span class="hidden-xs"><?=
                                                    $this->session->userdata('nama');
                                                    ?></span>
                        <?php } ?>
                        <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                            <img src="<?= base_url() ?>assets/user/guru1.png" class="user-image img-foto-profil-pengguna" alt="User Image">
                            <span class="hidden-xs"><?=
                                                    $this->session->userdata('nama');
                                                    ?></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                                <?php if (
                                    $this->session->userdata('foto_pengguna') == null
                                ) { ?>
                                    <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" alt="User Image">
                                <?php } else { ?>
                                    <img src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" class="img-circle img-foto-profil-pengguna" alt="User Image">
                                <?php } ?>
                                <!-- <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" alt="User Image"> -->
                                <p>
                                    <?=
                                    $this->session->userdata('nama');
                                    ?>
                                    <small><i class="fa fa-star"></i> Administrator <i class="fa fa-star"></i></small>
                                </p>

                            <?php } ?>
                            <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                                <?php if (
                                    $this->session->userdata('foto_pengguna') == null
                                ) { ?>
                                    <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" alt="User Image">
                                <?php } else { ?>
                                    <img src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" class="img-circle img-foto-profil-pengguna" alt="User Image">
                                <?php } ?>
                                <!-- <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" alt="User Image"> -->
                                <p>
                                    <?=
                                    $this->session->userdata('nama');
                                    ?>
                                    <small><i class="fa fa-star"></i> Bagian Kurikulum <i class="fa fa-star"></i></small>
                                </p>
                            <?php } ?>
                            <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                                <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" alt="User Image">
                                <p>
                                    <?=
                                    $this->session->userdata('nama');
                                    ?>
                                    <small><i class="fa fa-star"></i> Guru <i class="fa fa-star"></i></small>
                                </p>
                            <?php } ?>


                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('profil') ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>

    </nav>
</header>