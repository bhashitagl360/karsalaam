<?php require_once 'include/header.php'; ?>
    
    <div class="wrapper row-offcanvas row-offcanvas-left">
        
        <?php require_once 'include/sidebar_left.php'; ?>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Panel</small>
                </h1>
               
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <?php if($_SESSION['role'] != 2) { ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    Manage
                                </h3>
                                <p>
                                    Counters
                                </p>
                            </div>
                            
                            <a href="<?php echo 'manage-count.php';?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    
                    <?php } ?>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    Manage
                                </h3>
                                <p>
                                    Message Listing
                                </p>
                            </div>
                            
                            <a href="<?php echo 'massage-list.php';?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                  
                </div><!-- /.row -->
                
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

<?php require_once 'include/footer.php'; ?>