<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, <?php echo ucfirst( $_SESSION['username'] ); ?></p>

                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li <?php if($phpSelf == 'dashboard.php') { ?> class="active" <?php } ?>>
                <a href="<?php echo 'dashboard.php'; ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if($_SESSION['role'] != 2) { ?>
            <li <?php if($phpSelf == 'manage-count.php') { ?> class="active" <?php } ?>>
                <a href="<?php echo 'manage-count.php'; ?>">
                    <i class="fa fa-plus"></i> <span>Add Counter</span>
                </a>
            </li>
            <?php } ?>
            <li <?php if($phpSelf == 'massage-list.php') { ?> class="active" <?php } ?>>
                <a href="<?php echo 'massage-list.php'; ?>">
                    <i class="fa fa-envelope"></i> <span>Manage Messages</span></a>
            </li>
             
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>