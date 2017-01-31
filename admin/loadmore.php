<?php include("../config/config.php"); ?>
<?php
if (isset($_POST['page'])):
    $paged = $_POST['page'];
    $siteUrl = $_POST['siteUrl'];
    $sql = "SELECT id,displayName, documents_type,document_message,status,document FROM user_all_data Where deleted=0 order by id desc limit $paged,10 ";
//    echo $sql;die;
    $result = $conn->query($sql); 
   
    $num_rows = $result->num_rows;
    
    $html = '';
    if ($num_rows > 0) {
       while ($data = mysqli_fetch_array($result)) {
           $id = $data['id'];
            $name = $data['displayName'];
            $documents = $data['document'];
            $message = $data['document_message'];
            $status = $data['status'];
            $t1 = ($status == 1) ? '' : "style='display:none'";
            $t2 = ($status == 0) ? '' : "style='display:none'";
            
            $html .= '<li id="main_'.$id.'"><div class="main doc"><div class="queto">';
            $html .= '<img src="' . $siteUrl . '/images/top_qeto.png" alt=' . $name . ' />';
            $html .= '</div><div class="right_icon">';
            $html .= '<a href="javascript:void(0);" class="icon-btn" title="Delete" onclick="deleteMessage('.$id.');"><i class="fa fa-trash"></i></a>';
            $html .= '<a href="javascript:void(0);"  '.$t1.' class="icon-btn" title="Inactive" id="inactive_'.$id.'" onclick="inactiveMessage('.$id.');"><i class="fa fa-close"></i></a>';
            $html .= '<a href="javascript:void(0);" '.$t2.' class="icon-btn" title="Active" id="active_'.$id.'" onclick="activeMessage('.$id.');"><i class="fa fa-check"></i></a>';

            if ($data['documents_type'] == 'text') {
                $html .= '<img src="' . $siteUrl . '/images/doc.png" alt="' . $name . '" />';
            } else if ($data['documents_type'] == 'image') {
                $html .= '<img src="' . $siteUrl . '/images/img_icon.png" alt="' . $name . '" />';
            } else if ($data['documents_type'] == 'video') {
                $html .= '<img src="' . $siteUrl . '/images/video_icon.png" alt="' . $name . '" />';
            }
            $html .= '</div><div class="name">' . $name . '';
            $html .= '</div><div class="tag">#KarSalaam</div>';

            if ($data['documents_type'] == 'image') {
                $html .= '<div class="video_box">';
                $html .= '<img src="https://imagedata-test.s3.amazonaws.com/message/images/' . $documents . '" alt="' . $name . '" />';
                $html .= '</div>';
            } else if($rs['documents_type'] == 'video') {
                $html .= '<div class="video_box">  
                        <video width="320" height="240" controls>
                            <source src="https://imagedata-test.s3.amazonaws.com/message/video/'.$documents .'" type="video/mp4">
                            <source src="https://imagedata-test.s3.amazonaws.com/message/video/'. $documents .'" type="video/ogg">
                          Your browser does not support the video tag.
                        </video>
                    </div>';
            }
            $html .= '<p>' . $message . '</p></div></li>';
            
        }
        echo $html;
    }else{
        echo '0';
    }
    
endif;
?>