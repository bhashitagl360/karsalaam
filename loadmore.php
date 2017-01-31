<?php 
    require_once 'config/config.php';
    if (isset($_POST['page'])):
        $paged = $_POST['page'];
        $siteUrl = $_POST['siteUrl'];
        $sql = "SELECT displayName, documents_type, document_message, document FROM user_all_data where status=1 AND deleted=0 order by id desc limit $paged, 20 ";
        $result = $conn->query($sql); 
       
        $num_rows = $result->num_rows;
        
        $html = '';
        if ($num_rows > 0) {
           while ($data = mysqli_fetch_array($result)) {
               $id = $data['id'];
                $name = $data['displayName'];
                $message = $data['document_message'];
                $documents = $data['document'];
                 
                
                $html .= '<li id="main_'.$id.'"><div class="main doc"><div class="queto">';
                $html .= '<img src="' . $siteUrl . '/images/top_qeto.png" alt=' . $name . ' />';
                $html .= '</div><div class="right_icon">';

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
                } else if($data['documents_type'] == 'video') {
                    $html .= '<div class="video_box">'; 
                           $html .= ' <video width="320" height="240" controls>
                                <source src="https://imagedata-test.s3.amazonaws.com/message/video/'.$documents .'" type="video/mp4">
                                <source src="https://imagedata-test.s3.amazonaws.com/message/video/'. $documents .'" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>';
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