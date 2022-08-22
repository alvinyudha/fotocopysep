<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-fw fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Fotocopy SEP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--Query Menu-->
    <?php
    //JOIN SQL
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `tb_user_menu`.`id`, `menu`
                FROM `tb_user_menu` JOIN `tb_user_accessmenu` 
                ON `tb_user_menu`.`id`=`tb_user_accessmenu`.`menu_id` 
                WHERE `tb_user_accessmenu`.`role_id` = $role_id
                ORDER BY `tb_user_accessmenu`.`menu_id` 
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!--LOOPING MENU-->
    <?php foreach ($menu as $m) : ?>
        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!--SUBMENU SESUAI MENU-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                    FROM `tb_user_submenu` JOIN `tb_user_menu` 
                    ON `tb_user_submenu`.`menu_id`=`tb_user_menu`.`id` 
                    WHERE `tb_user_submenu`.`menu_id` = $menuId
                    AND `tb_user_submenu`.`is_active`=1
                    ";
        $submenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($submenu as $sm) : ?>
            <?php if ($tittle == $sm['tittle']) :  ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['tittle']; ?></span></a>
                </li>
            <?php endforeach ?>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>

        <!-- Divider -->

        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->