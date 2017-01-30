<?php
include('include/header.php');
include("../config/config.php");
?>
<link href="<?php echo siteUrl; ?>/admin/css/admin.css" rel="stylesheet"  />
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
                    <li >
                        <a href="<?php echo 'manage-count.php'; ?>">
                            <i class="fa fa-plus"></i> <span>Add Counter</span> <small class="badge pull-right bg-green">new</small>
                        </a>
                    </li>
                    <li class="active">
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
                    <small>Massages</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="blog_section">
                <div class="wrapper">
                    <div class="blogs">
                        <div class="blog1">
                            <ul id="container" class="news_list">
                                <?php
                                $sqlSelect = "SELECT id,name, document_type,message,status,image FROM user_data where deleted=0 order by id desc limit 10";
                                $result = $conn->query($sqlSelect);
                                if ($result->num_rows > 0) {
                                    foreach ($result as $rs) {
                                        $postID = $rs["id"];
                                        $status = $rs["status"];
//                                        echo $status;
                                        
                                        ?>
                                <li id="main_<?php echo $postID; ?>">
                                            <div class="main doc">

                                                <div class="queto"> 
                                                    <img src="<?php echo siteUrl; ?>/images/top_qeto.png" alt="<?php echo $rs['name']; ?>" />
                                                </div>

                                                <div class="right_icon">
                                                    <a href="javascript:void(0);" class="icon-btn" title="Delete" onclick="deleteMessage('<?php echo $postID; ?>');"><i class="fa fa-trash"></i></a>
                                                    
                                                    
                                                    <a href="javascript:void(0);" <?php echo ($status == 1) ? '' : "style='display:none'" ?> class="icon-btn" title="Inactive" id="inactive_<?php echo $postID; ?>" onclick="inactiveMessage('<?php echo $postID; ?>');"><i class="fa fa-close"></i></a>
                                                    <a href="javascript:void(0);" <?php echo ($status == 0) ? '' : "style='display:none'" ?> class="icon-btn" title="Active" id="active_<?php echo $postID; ?>" onclick="activeMessage('<?php echo $postID; ?>');"><i class="fa fa-check"></i></a>

                                                    <?php if ($rs['document_type'] == 'text') { ?>
                                                        <img src="<?php echo siteUrl; ?>/images/doc.png" alt="<?php echo $rs['name']; ?>" />
                                                    <?php } else if ($rs['document_type'] == 'image') { ?>
                                                        <img src="<?php echo siteUrl; ?>/images/img_icon.png" alt="<?php echo $rs['name']; ?>" />
                                                    <?php } ?> 
                                                </div>
                                                <div class="name">
                                                    <?php echo $rs['name']; ?>
                                                </div>
                                                <div class="tag">
                                                    #KarSallam
                                                </div>
                                                <?php if ($rs['document_type'] == 'image') { ?>
                                                    <div class="video_box">  
                                                        <img src="<?php echo siteUrl . '/documents/image/' . $rs['image']; ?>" alt="<?php echo $rs['name']; ?>" /> 	
                                                    </div>
                                                <?php } ?>
                                                <p><?php echo $rs['message']; ?></p>

                                            </div>
                                        </li> 
                                    <?php }
                                } ?>





                            </ul>
                            <input type="hidden" id="result_no" value="10">
                            <li class="loadbutton">
                                <button class="loadmore" >Load More</button>
                            </li>

                        </div>  

                    </div>
                </div>   







            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->





<?php include('include/footer.php'); ?>


    <script type="text/javascript">
        $(document).on('click', '.loadmore', function () {
            $(this).text('Loading...');
            var ele = $(this).parent('li');
            $.ajax({
                url: 'loadmore.php',
                type: 'POST',
                data: {
                    page: $('#result_no').val(),
                    siteUrl: '<?php echo siteUrl; ?>'
                },
                success: function (response) {
                    //          alert(response);
                    if (response != 0) {
                        $(".news_list").append(response);
                        document.getElementById("result_no").value = Number($('#result_no').val()) + 10;
                        $('.loadmore').text('Load More');
                    } else {
                        $('.loadmore').hide();
                    }
                }



            });
          });
          
          function deleteMessage(id){
//            alert(id);
            var data = {"id":id};
              swal({
              title: "Are you sure?",
              text: "You want to delete this message!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(isConfirm){
             if (isConfirm) {
                 $.ajax({
                   url: 'delete-message.php',
                   type: 'POST',
                   data: data,
                   success: function(response){
                       if(response == 1){
                          swal("Deleted!", "Your message has been deleted.", "success"); 
                          $('#main_'+id).remove();
                        }else{
                          swal("Try again", "Something went wrong:)", "error");
                        }
                   }
                 });
             } 
             
            });
          }
          
          
          function inactiveMessage(id){
//            alert(id);
            var data = {"id":id};
              swal({
              title: "Are you sure?",
              text: "You want to inactive this message!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, inactive it!",
              closeOnConfirm: false
            },
            function(isConfirm){
             if (isConfirm) {
                 $.ajax({
                   url: 'inactive-message.php',
                   type: 'POST',
                   data: data,
                   success: function(response){
                       if(response == 1){
                          swal("Inactivated!", "Message has been inactivated.", "success"); 
                          $('#inactive_'+id).hide();
                          $('#active_'+id).show();
                        }else{
                          swal("Try again", "Something went wrong:)", "error");
                        }
                   }
                 });
             } 
             
            });
          }
          
          function activeMessage(id){
//            alert(id);
            var data = {"id":id};
              swal({
              title: "Are you sure?",
              text: "You want to active this message!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, active it!",
              closeOnConfirm: false
            },
            function(isConfirm){
             if (isConfirm) {
                 $.ajax({
                   url: 'active-message.php',
                   type: 'POST',
                   data: data,
                   success: function(response){
                       if(response == 1){
                          swal("Activated!", "Message has been activated.", "success"); 
                          $('#inactive_'+id).show();
                          $('#active_'+id).hide();
                        }else{
                          swal("Try again", "Something went wrong:)", "error");
                        }
                   }
                 });
             } 
             
            });
          }
    </script>