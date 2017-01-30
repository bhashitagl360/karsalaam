<?php 
    require_once 'include/header.php';

    if( isset($role) && $role == 2) {
        $redirectURL = siteUrl.'/admin/dashboard.php';
        echo "<meta http-equiv='refresh' content='0;url=$redirectURL'>";
        exit;
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
            //header("location: manage-count.php");
        } else {
           $_SESSION["msg"]= 'Something went wrong ! Please try again';
           
        }
        $redirectCountURL = siteUrl.'/admin/manage-count.php';
        echo "<meta http-equiv='refresh' content='0;url=$redirectCountURL'>";
        exit;
    }


?>
         
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php require_once 'include/sidebar_left.php'; ?>
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
                    <div style="float: left; width: 94%; margin: 0 4%;">
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
                    </div>
                </div><!-- ./col -->
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
<?php include('include/footer.php');?>