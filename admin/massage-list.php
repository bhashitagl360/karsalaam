<?php require_once 'include/header.php'; ?>

<link href="<?php echo siteUrl; ?>/admin/css/admin.css" rel="stylesheet"  />
    <div class="wrapper row-offcanvas row-offcanvas-left">
         
        <?php require_once 'include/sidebar_left.php'; ?>

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
                                $sqlSelect = "SELECT id,displayName, documents_type,document_message,status,document FROM user_all_data where deleted=0 order by id desc limit 10";
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
                                                    <img src="<?php echo siteUrl; ?>/images/top_qeto.png" alt="<?php echo $rs['displayName']; ?>" />
                                                </div>

                                                <div class="right_icon">
                                                    <a href="javascript:void(0);" class="icon-btn" title="Delete" onclick="deleteMessage('<?php echo $postID; ?>');"><i class="fa fa-trash"></i></a>
                                                    
                                                    
                                                    <a href="javascript:void(0);" <?php echo ($status == 1) ? '' : "style='display:none'" ?> class="icon-btn" title="Inactive" id="inactive_<?php echo $postID; ?>" onclick="inactiveMessage('<?php echo $postID; ?>');"><i class="fa fa-close"></i></a>
                                                    <a href="javascript:void(0);" <?php echo ($status == 0) ? '' : "style='display:none'" ?> class="icon-btn" title="Active" id="active_<?php echo $postID; ?>" onclick="activeMessage('<?php echo $postID; ?>');"><i class="fa fa-check"></i></a>

                                                    <?php if ($rs['documents_type'] == 'text') { ?>
                                                        <img src="<?php echo siteUrl; ?>/images/doc.png" alt="<?php echo $rs['displayName']; ?>" />
                                                    <?php } else if ($rs['documents_type'] == 'image') { ?>
                                                        <img src="<?php echo siteUrl; ?>/images/img_icon.png" alt="<?php echo $rs['displayName']; ?>" />
                                                    <?php } else if ($rs['documents_type'] == 'video') { ?>
                                                        <img src="<?php echo siteUrl; ?>/images/video_icon.png" alt="<?php echo $rs['displayName']; ?>" />
                                                    <?php } ?> 
                                                </div>
                                                <div class="name">
                                                    <?php echo $rs['displayName']; ?>
                                                </div>
                                                <div class="tag">
                                                    #KarSallam
                                                </div>
                                                <?php if ($rs['documents_type'] == 'image') { ?>
                                                    <div class="video_box">  
                                                        <img src="<?php echo 'https://imagedata-test.s3.amazonaws.com/message/images/' . $rs['document']; ?>" alt="<?php echo $rs['displayName']; ?>" /> 	
                                                    </div>
                                                <?php } else if($rs['documents_type'] == 'video') { ?>
                                                    <div class="video_box">  
                                                        <video width="320" height="240" controls>
                                                            <source src="https://imagedata-test.s3.amazonaws.com/message/video/<?php echo $rs['document']; ?>" type="video/mp4">
                                                            <source src="https://imagedata-test.s3.amazonaws.com/message/video/<?php echo $rs['document']; ?>" type="video/ogg">
                                                          Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                <?php } ?>
                                                <p><?php echo $rs['document_message']; ?></p>

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





<?php require_once 'include/footer.php'; ?>


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