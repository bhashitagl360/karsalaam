<?php 
    require_once 'config/config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<title>LG Republic Celebrations - Showcasing India’s Pride | LG India</title>
<meta name="description" content="Celebrate the spirit of 68th Republic Day of India with LG Electronics and contribute to Soldier’s Indian National Defense Fund with the purchase of an LG product.">
		<meta name="keywords" content="Lg republic celebrations, lg 68th republic celebrations, lg products">
<meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<meta charset="UTF-8">
<link href="<?php echo siteUrl; ?>/css/grid.css" rel="stylesheet"  />
<link rel="stylesheet" href="<?php echo siteUrl; ?>/font-awesome.min.css">
<link href="<?php echo siteUrl; ?>/css/layout.css" rel="stylesheet"  />
<link href="<?php echo siteUrl; ?>/css/screen.css" rel="stylesheet"  />
<script type="text/javascript" src="<?php echo siteUrl; ?>/js/jquery-2.1.4.min.js"></script> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90453415-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '764816483610203'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=764816483610203&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</head>

<body>
<header>
    <div class="logo">
        <a href="<?php echo siteUrl; ?>">
            <img src="<?php echo siteUrl; ?>/images/logo.png" alt="LG Republic Celebrations" />
        </a>
    </div>
    
    <img src="<?php echo siteUrl; ?>/images/banner.jpg" class="banner" alt="" />
        <img src="<?php echo siteUrl; ?>/images/mobile_banner.jpg" class="banner_mobile" alt="" />
    
    <div class="new">
        <img src="<?php echo siteUrl; ?>/images/new.png" alt="">
    </div>

    <!-- <div class="tribe" id="yourTributeDiv">
        <a href="javascript:void(0);" class="" data-toggle="modal" data-target="#userData">
            <img src="<?php //echo siteUrl; ?>/images/tribe.png" alt="" />
            <p>Share Wishes for Soldiers</p>
        </a>
    </div> -->
    
    <div class="scroll">
        <a href="javascript:void(0);" onclick="$('#section-2').animatescroll();">
            <img src="<?php echo siteUrl; ?>/images/scroll.png" alt="">
        </a>
    </div>
</header>
    
<section class="timing_box">
    <div class="wishes">
        <div class="left_wishes" id="section-2">
            <div class="tag1"> With freedom in your mind,<br/>
                    Faith in your words,<br/>
                    Pride in your soul,<br/>
                    And warm wishes in your heart, 
            </div>
            <div class="tag2">
                    Salute the undying spirit of our soldiers!
            </div>
            <div class="tag3">
                    #KarSalaam to the real superheroes, who selflessly risk their lives to protect our beloved country.
                    Join the movement to tell our Jawans that the nation stands strong with them on this Republic day.
            </div>
            <div class="wish_counter" id="">
                    <h3>Wishes</h3> 
            </div>
        </div>
    </div>
</section>
    
<section class="blog_section">
  <div class="wrapper">
    <div class="blogs">
      <div class="blog1">
        <ul id="container" class="clearfix fluid news_list">
            <?php
                /*
                 *  Website Count
                 */
                $sqlWCount = "SELECT count(*) as tcount FROM user_data";
                $resultWCount = $conn->query($sqlWCount); 
                
                $rowWebCount = mysqli_fetch_array($resultWCount, MYSQLI_ASSOC);
                
                /*
                 *  Admin Count
                 */
                $sqlACount = "SELECT count FROM manage_count";
                $resultACount = $conn->query($sqlACount); 
                
                $rowAdminCount = mysqli_fetch_array($resultACount, MYSQLI_ASSOC); 
                
                
                /*
                 *  Listing
                 */
                $sqlSelect = "SELECT name, document_type, message, image FROM user_data where status=1 And deleted=0 order by id desc limit 20";
                $result = $conn->query($sqlSelect); 
                 
                if ($result->num_rows > 0) {
                    foreach($result as $rs) {
                        $postID = $rs["id"];
            ?>
                <li id="main_<?php echo $postID; ?>">
                    <div class="main doc">
                        <div class="queto"> 
                            <img src="<?php echo siteUrl; ?>/images/top_qeto.png" alt="<?php echo $rs['name']; ?>" />
                        </div>

                        <div class="right_icon">
                            <?php if($rs['document_type'] == 'text') { ?>
                               <img src="<?php echo siteUrl; ?>/images/doc.png" alt="<?php echo $rs['name']; ?>" />
                            <?php } else if($rs['document_type'] == 'image') { ?>
                               <img src="<?php echo siteUrl; ?>/images/img_icon.png" alt="<?php echo $rs['name']; ?>" />
                            <?php } ?> 
                        </div>
                        <div class="name">
                            <?php echo $rs['name']; ?>
                        </div>
                        <div class="tag">
                            #KarSalaam
                        </div>
                        <?php if($rs['document_type'] == 'image') { ?>
                        <div class="video_box">  
                            <img src="<?php echo siteUrl.'/documents/image/'.$rs['image']; ?>" alt="<?php echo $rs['name']; ?>" /> 	
	              	</div>
                        <?php } ?>
                        <p><?php echo $rs['message']; ?></p>
                        <a href="#" class="read">Read + </a> 
                    </div>
                </li> 
            <?php } } ?>
        </ul>
        <input type="hidden" id="result_no" value="20">
        <li class="loadbutton">
            <button class="loadmore" >Load More</button>
        </li>
      </div>  
    </div>
  </div>
</section> 

<footer>
  <div class="footerSection">
    <div class="wrapper">
      <div class="master">
        <div class="copySec">Copyright © 2017 LG Electronics. All Rights Reserved. <a href="privacy.html" target="_blank">PRIVACY</a>|<a href="legal.html" target="_blank">LEGAL</a></div>
        <div class="social"> <a href="https://www.facebook.com/lgindiapage" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/lgindiatweets" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://plus.google.com/+LGIndia/posts" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="https://www.pinterest.com/lgindiaofficial" target="_blank"><i class="fa fa-pinterest"></i></a> <a href="http://www.youtube.com/LGIndiachannel" target="_blank"><i class="fa fa-youtube"></i></a> <!--<a href="http://www.lgindiablog.com/" target="_blank"><i class="fa fa-bold"></i></a>--> <a href="https://www.linkedin.com/company/lg-electronics-india-pvt-ltd" target="_blank"><i class="fa fa-linkedin"></i></a> </div>
      </div>
    </div>
  </div>
</footer>
    
    <!-- Modal User Data-->
	<div class="modal fade" id="userData" role="dialog">
	    <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content form_box">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">
		          		<img src="<?php echo siteUrl; ?>/images/close2.png" alt="Close" />
		          	</button>
		          	<h4 class="modal-title">Share Wishes for Soldiers</h4>
		        </div>
		        <div class="modal-body">
		        	<p id="errorMsg" class="errMsg"></p>
		          	<ul>
					    <li>
					        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Your Name" required />
					    </li>
					    <li>
					        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" required />
					    </li>
					    <li>
					        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required />
					    </li>
					    <li id="agree_li">
					        <input type="checkbox" name="agree" id="agree" value="1" class="form-control" />
					        <div class="sinupline">
					        	<a href="<?php echo siteUrl; ?>/disclaimer.html" class="linka disc" target="_blank">
					        	Disclaimer
					       		</a>
					       	</div>
					    </li>
<!--					    <li class="white_color">
					    	OR (Login with)
					    </li>
					    <li>
					        <div class="social"> 
					        <a href="/api/auth/facebook">
					        	<i class="fa fa-facebook"></i>
					        </a>
					        <a href="/api/auth/twitter">
					        	<i class="fa fa-twitter"></i>
					        </a>
					        <a href="/api/auth/google">
					        	<i class="fa fa-google-plus"></i>
					        </a>
					        </div>
					    </li>-->
					    <li>
					        <a href="javascript:void(0);" class="form_box_poup" style="position:relative;">
                                <input type="hidden" name="role" id="role" value="user" />
					        	<input type="submit" value="Submit" id="addUserDetails" />
					        </a>
					    </li>
				    </ul>
		        </div>
		        <div class="modal-footer">
		          	<button style="display:none;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		    </div>
	    </div>
	</div>

	<!-- Modal Tribute Data-->
	<div class="modal fade" id="tributeData" role="dialog">
	    <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content form_box">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">
		          		<img src="<?php echo siteUrl; ?>/images/close2.png" alt="Close" />
		          	</button>
		          	<h4 class="modal-title">Share Wishes for Soldiers</h4>
		        </div>
		        <div class="modal-body">
		        	<p id="errorTributeMsg" class="errMsg"></p>
				    <ul>
					    <li>
					        <input type="radio" id="message_input" checked="checked" name="document_type" onclick="check_type(this.value)" value="text" />
					        <label>Text</label>
					        <input type="radio" name="document_type" onclick="check_type(this.value)" value="image" />
					        <label>Image</label>
<!--					        <input type="radio" name="document_type" onclick="check_type(this.value)" value="video" />
					        <label>Video</label>-->
					    </li>
					    <li id="text_li">
					        <textarea name="message" id="message"></textarea>
					    </li>
					    <li id="image_li" style="display:none; position: relative;">
					    	<label class="UpPic">
	                         	<p>
                                            <input type="file" qq-button-id="a3f1c7eb-9365-40ce-8650-c5dddd4beef9" accept="image/*" name="pic" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0; float: right; width: 40%" id="uploader" />
                                            <img id="image_preview" src="<?php echo siteUrl; ?>/images/default_img.jpg" alt="Preview Image" >
	                         	</p>
	                        </label>
	                        <p class="lead_txt">
	                        	* Please upload a png or jpg image file and upto 1 mb size.
	                        </p>
					    </li>

<!--					    <li id="video_li" style="display:none; position: relative;">
					    	<label class="UpVideo">
	                         	<p>
	                         		<input style="display: none;" type="file" name="video" id="video" />
	                         		<img id="video_preview" src="<?php //echo siteUrl; ?>/images/default_img.jpg" alt="Preview Image" />
	                         	</p>
	                        </label> 
	                        <p class="lead_txt">
	                        	* Please upload a mp4 video file and upto 10 mb size.
	                        </p>
					    </li>-->
					    <li>
					        <a href="javascript:void(0);" class="form_box_poup" style="position:relative;">
					        	<input type="submit" value="Submit" id="yourTribute" />
					        </a>
					    </li>
				    </ul> 
		        </div>
		        <div class="modal-footer">
		          	<button style="display:none;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		    </div>
	    </div>
	</div>
        
<input type="hidden" name="image_hidden" image_path="" image_msg="" id="image_hidden" />        
<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>" />

<script type="text/javascript" src="<?php echo siteUrl; ?>/js/html5.js"></script>
<script src="<?php echo siteUrl; ?>/js/animatescroll.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<script src="<?php //echo siteUrl; ?>/js/jquery.filedrop.js"></script>        -->
<script>
    /*
        Add User 
    */

    $('#userData').on('show.bs.modal', function(e) { 
            $('#firstName').val(''); 
            $('#email').val(''); 
            $('#mobile').val(''); 
    });

    $('#addUserDetails').click(function () { 
        var firstName = $('#firstName').val().trim();
        var email = $('#email').val().trim();
        var mobile = $('#mobile').val().trim();
       // var message = $("#message").val();
        var letters = /^[a-zA-Z() ]+$/;
        var number = /^\d{10}$/;
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

        var agree =  $('#agree'); 

        if( firstName == '') {
                $('#errorMsg').html('Please enter name');
                return false;
        }

        if(!firstName.match(letters)){  
            $('#errorMsg').html('Please enter a name that contains alphabets');
            return false;  
        }  

        if(email == '') {
                $('#errorMsg').html('Please enter email id');
                return false;
        }

        if(!pattern.test(email)){
                $('#errorMsg').html('Please enter a valid email id');
                return false;
        }

        if(mobile == '') {
                $('#errorMsg').html('Please enter mobile number');
                return false;
        }
        
        if(!mobile.match(number)){
                $('#errorMsg').html('Please enter a valid mobile number');
            return false;  
        }
        
//        if( message == '') {
//            $('#errorMsg').html('Please enter message');
//            return false;
//        }

        var dataUser = {
            "firstName": firstName,
            "email": email,
            "mobile": mobile,
            //"message": message,
        };

        if(agree.is(':checked')) {
            $.ajax({
                type: "Post",
                data: dataUser,
                url: '<?php echo siteUrl ?>/AddUser.php',
                dataType: 'json',
                beforeSend: function() {
                    $('#addUserDetails').after('<img style="absolute: relative: right: -40px; top: -10px" src="<?php echo siteUrl ?>/images/ajax-loader.gif" alt="" class="attention" />');
                    $('#addUserDetails').attr('disabled', true);
                },
                complete: function() {
                   $('#addUserDetails').attr('disabled', false);
                   $(".attention").remove();
                },
                success: function (json) {
                    if (json.status == 'success') {
                        console.log(5);
                        $('#userData').remove();
			$('#tributeData').modal('toggle');
                        $('#errorMsg').css('color', '#ffffff');
                        $('#errorMsg').html(json.msg); 
                        
                        if(json.user_id) {
                            $("#user_id").attr('value', json.user_id); 
                        }
                        
                        $('#firstName').val(''); 
                        $('#email').val(''); 
                        $('#mobile').val(''); 

                        fbq('track', 'CompleteRegistration');
                    } else {
                        $('#errorMsg').html(json.msg);
                        return false;
                    }
                }
            });
        } else {
            $('#errorMsg').html('Please agree disclaimer to proceed');
                return false;  
        }
    });
    
    function check_type(type) {
        switch(type) {
            case "text":
                $('#text_li').show();
                $('#image_li').hide();
                $('#video_li').hide();
                $("#text_li").addClass('width100');
                break;
            case "image":
                $('#text_li').show();
                $('#image_li').show();
                $('#video_li').hide();
                $("#text_li").removeClass('width100');
                break;
            case "video":
                $('#text_li').show();
                $('#image_li').hide();
                $('#video_li').show();
                $("#text_li").removeClass('width100');
                break;
            default:
                $('#errorTributeMsg').html('Please make a choice');
        }
    }
    
    $(document).ready(function() {
        $("#message").val('');
        $("#text_li").addClass('width100');
        $("#message_input").prop('checked',true);
        if($('#message_input:radio:checked').length > 0){
                $('#text_li').show();
                $('#image_li').hide();
                $('#video_li').hide();
        }
    });
    
    var userData = $('#user_id').val(); 

    if( userData !== '') {
            $('#tributeData').modal('toggle');
    }
    
    /*
            Upload Image
    */
    $('#uploader').on('change', function() { 
        
        var user_id = $('#user_id').val();
        var fileInput = $('#uploader')[0];  
        var data = new FormData(); 
        var document_type = $('input[name="document_type"]:radio:checked').val();

        for(var i = 0; i < fileInput.files.length; ++i){ 
                data.append('pic',fileInput.files[i]);
        }    
        
        var file = this.files[0],
	     		imagefile = file.type,
	     		fileSize =  file.size/1024/1024,
	     		match= ["image/jpeg","image/png","image/jpg"]; 
       if(fileSize >= 1) {
                $("#errorTributeMsg").show().delay(500000).fadeOut();
                $("#errorTributeMsg").html("Please select a valid size upto 1 mb");
                return false;
        }

        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))) { 
                $("#errorTributeMsg").show().delay(5000).fadeOut();
                $("#errorTributeMsg").html("Please select a valid image format. "+" Note "+" Only jpeg, jpg and png image format is allowed");
                return false;
        } else {
        
            $.ajax({
                type:'POST',
                method:'POST',
                url:'post_file.php?user_id='+user_id+'&document_type='+document_type,
                headers:{'Cache-Control':'no-cache'},
                data:data,
                dataType:'json',
                contentType:false,
                processData:false,
                cache: false,
                beforeSend: function() {
                        $('#uploader').attr('disabled', true);
                        $('#uploader').after('<div class="attention"><img src="images/ajax-loader.gif" alt="" /></div>');
                },
                complete: function() {
                  $('#uploader').attr('disabled', false);
                  $('.attention').remove();
                },
                success: function(json){
                    //var return_data = response;
                    if(json['success'] == 'File was uploaded successfuly'){ 
                        $('#image_preview').attr('width', '231');
                        $('#image_preview').attr('height', '134');
                        $('#image_preview').attr('src', "<?php echo siteUrl ?>/"+json.file_path);
                        $('#image_hidden').attr('image_path', "<?php echo siteUrl ?>/"+json.file_path);
                        $('#image_hidden').val(json.file_path);
                    }else{
                        alert(json.status);
                        $('#image_hidden').val('');
                    } 				
                },
                error: function (request, status, error) {
                        alert("try again, there is some error in uploading");
                }
            }); 
        }
    });
    
    $("#yourTribute").click(function () {

        var message = $("#message").val();  
        var document_type = $('input[name="document_type"]:radio:checked').val();
        var user_id = $("#user_id").val();

        if(document_type == 'text') {
            var dataMessage = {
                "document_type": document_type,
                "message": message,
                "user_id": user_id
            };
        }

        if(document_type == 'image') {
            var dataMessage = {
                "document_type": document_type,
                "message": message,
                "user_id": user_id
            }; 
        } 

        if( message == '') {
            $('#errorTributeMsg').html('Please enter message');
            return false;
        }

        var urlMessage = '<?php echo siteUrl; ?>/addMessage.php';
        $.ajax({
            type: "Post",
            data: dataMessage,
            url: urlMessage,
            dataType: 'json',
            beforeSend: function() {
                $('#yourTribute').after('<img style="absolute: relative: right: -40px; top: -10px" src="<?php echo siteUrl; ?>/images/ajax-loader.gif" alt="" class="attention" />');
                $('#yourTribute').attr('disabled', true);
            },
            complete: function() {
               $('#yourTribute').attr('disabled', false);
               $('.attention').remove();
            },
            success: function (json) {
                if (json.status == 'success') {
                    $('#tributeData').remove(); 
                    $(".modal-backdrop").remove();
                    alert(json.msg);
                    window.location="<?php echo siteUrl; ?>/logout.php";

                } else {
                    $('#errorTributeMsg').html(json.message);
                    return false;
                }
            }
        });
    });
    
    var text = "",
    possible = '<?php echo $rowWebCount['tcount']; ?>',
    adminCount = '<?php echo $rowAdminCount['count'] ?>',
    totalCountsWithJuicer = parseInt(possible) + parseInt(adminCount),
    l = totalCountsWithJuicer.toString().length,
    wishes = '<h3>Wishes</h3>'; 
    for(i=0; i<l; i++){
            wishes += '<div class="counts">'+ totalCountsWithJuicer.toString()[i] +'</div>';
    }

    $('.wish_counter').html(wishes);

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
                if (response != 0) {
                    $(".news_list").append(response);
                    document.getElementById("result_no").value = Number($('#result_no').val()) + 20;
                    $('.loadmore').text('Load More');
                } else {
                    $('.loadmore').hide();
                }
            }
        });
    });
    
    
</script>   
</body>
</html>

