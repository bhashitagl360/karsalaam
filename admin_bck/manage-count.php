<?php
include("../config/config.php");
session_start();
$uid = $_SESSION['login_user'];
// echo $uid;die;
if(!(isset($uid))){
     header("location: index.php");
}
$countValue = '';
$check = '';
$msg='';
$get_countSql = "SELECT count,id FROM manage_count";
$result = $conn->query($get_countSql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if(isset($row)){
    $countValue = $row['count'];
    $check=1;
}else{
    $countValue = '';
    $check = 0;
}

if(isset($_SESSION["msg"])){
    $msg= $_SESSION["msg"];
    $_SESSION["msg"] = '';
}else{
    $msg='';
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
     $count =  $_POST['count'];
    
   
        if($check == 1){
            $id = $row['id'];
         $sql = "UPDATE manage_count SET count='$count' WHERE id='$id'";
        }else{
            $sql = "INSERT INTO manage_count (count)VALUES ('$count')"; 
        }

    if ($conn->query($sql) === TRUE) {
        $_SESSION["msg"]='Counter has been saved';
        header("location: manage-count.php");
    } else {
       $_SESSION["msg"]= 'Something went wrong ! Please try again';
       
    }
   }


?>
<?php include('include/header.php');?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo 'dashboard.php'; ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                LG Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Welcome - Admin
                                        
                                    </p>
                                </li>
                              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo 'logout.php'; ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
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
                            <p>Hello, Admin</p>

                            <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li >
                            <a href="<?php echo 'dashboard.php'; ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo 'manage-count.php'; ?>">
                                <i class="fa fa-plus"></i> <span>Add Counter</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo 'massage-list.php'; ?>">
                                <i class="fa fa-envelope"></i> <span>Manage Messages</span></a>
                        </li>
                         
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage
                        <small>Counter</small>
                    </h1>
                   
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <form name="manageCount" method="post">
                        <fieldset>
                            <div class="form-group" show-errors>
                                <label class="control-label" for="count">Total Count</label>
                                <input name="count" type="number" value="<?php echo $countValue; ?>" id="count" class="form-control" placeholder="Enter count number" required>

                            </div>
                            <div><?php echo $msg; ?></div>
                            <div class="panel-footer">
                                <button class="btn btn-oval btn-info" type="submit">Save</button>
                            </div>

                        </fieldset>
                        </form>​
                        </div><!-- ./col -->
                       
                     
                      
                   

                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

       <?php include('include/footer.php');?>