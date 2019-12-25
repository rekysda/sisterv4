<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user['name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Query Menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`user_menu`.`menu_id`,`user_menu`.`icon`,`menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id`= $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li <?= $this->uri->segment(1) == 'dashboard' ? 'class="active"' : '' ?>><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <?php foreach ($menu as $m) : ?>
                <li class="treeview  <?= $this->uri->segment(1) == $m['menu_id'] ? 'active' : '' ?>">
                    <a href="#">
                        <i class="<?= $m['icon']; ?>"></i> <span><?= $m['menu']; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                    <!-- Submenu berdasarkan Menu -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                FROM `user_sub_menu` JOIN `user_access_submenu`
                ON `user_sub_menu`.`id` = `user_access_submenu`.`submenu_id`
                WHERE `user_access_submenu`.`role_id`= $role_id
                AND `is_active` = 1
                ORDER BY sort ASC";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <ul class="treeview-menu">
                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($sm['menu_id'] == $menuId) { ?>
                                <li <?= $title == $sm['title'] ? 'class="active"' : '' ?>><a href="<?= base_url($sm['url']); ?>"><i class="fa fa-circle-o"></i> <?= $sm['title']; ?></a></li>
                            <?php }
                    endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>

            <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-power-off text-red"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>