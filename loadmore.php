<?php 
    require_once 'config/config.php';
    if (isset($_POST['page'])):
        $paged = $_POST['page'];
        $siteUrl = $_POST['siteUrl'];
        $sql = "SELECT * FROM `user_data` Where deleted=0 order by id desc limit $paged, 20 ";
        $result = $conn->query($sql); 
       
        $num_rows = $result->num_rows;
        
        $html = '';
        if ($num_rows > 0) {
           while ($data = mysqli_fetch_array($result)) {
               $id = $data['id'];
                $name = $data['name'];
                $image = $data['image'];
                $message = $data['message'];
                $status = $data['status'];
                $t1 = ($status == 1) ? '' : "style='display:none'";
                $t2 = ($status == 0) ? '' : "style='display:none'";
                
                $html .= '<li id="main_'.$id.'"><div class="main doc"><div class="queto">';
                $html .= '<img src="' . $siteUrl . '/images/top_qeto.png" alt=' . $name . ' />';
                $html .= '</div><div class="right_icon">';

                if ($data['document_type'] == 'text') {
                    $html .= '<img src="' . $siteUrl . '/images/doc.png" alt="' . $name . '" />';
                } else if ($data['document_type'] == 'image') {
                    $html .= '<img src="' . $siteUrl . '/images/img_icon.png" alt="' . $name . '" />';
                }
                $html .= '</div><div class="name">' . $name . '';
                $html .= '</div><div class="tag">#KarSallam</div>';

                if ($data['document_type'] == 'image') {
                    $html .= '<div class="video_box">';
                    $html .= '<img src="' . siteUrl . '/documents/image/' . $image . '" alt="' . $name . '" />';
                    $html .= '</div>';
                }
                $html .= '<p>' . $message . '</p></div></li>';
                
            }
            echo $html;
        }else{
            echo '0';
        }
        
    endif;
?>