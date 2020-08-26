<?php 
if (!$user['image']){
  $user['image']='default.jpg';
}
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('user'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>I</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SISWA</b>PANEL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $user['namasiswa']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" class="img-circle" alt="User Image">
                            <p><small>Nama : <?= ($user['namasiswa']); ?></small>
                            <small>NomorFomulir : <?= ($user['noformulir']); ?></small>
                            <small>NIS : <?= $this->session->userdata('nis'); ?></small>
                            <small>Status : <?= ($user['ppdb_status']); ?></small>
                            <small>Role : <?= $this->session->userdata('role_id'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('siswa'); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?php if ($this->session->userdata('role_id')=='3'){?>
                                <a href="<?= base_url('authppdb/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                                <?php }
                                 if ($this->session->userdata('role_id')=='4'){?>
                                    <a href="<?= base_url('authsiswa/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                              <?php  } ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>