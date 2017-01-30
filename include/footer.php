
<footer>
  <div class="footerSection">
    <div class="wrapper">
      <div class="master">
        <div class="copySec">Copyright © 2017 LG Electronics. All Rights Reserved. <a href="privacy.html">PRIVACY</a>|<a href="legal.html">LEGAL</a></div>
        <div class="social"> <a href="https://www.facebook.com/lgindiapage" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/lgindiatweets" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://plus.google.com/+LGIndia/posts" target="_blank"><i class="fa fa-google-plus"></i></a> <a href="https://www.pinterest.com/lgindiaofficial" target="_blank"><i class="fa fa-pinterest"></i></a> <a href="http://www.youtube.com/LGIndiachannel" target="_blank"><i class="fa fa-youtube"></i></a> <!--<a href="http://www.lgindiablog.com/" target="_blank"><i class="fa fa-bold"></i></a>--> <a href="https://www.linkedin.com/company/lg-electronics-india-pvt-ltd" target="_blank"><i class="fa fa-linkedin"></i></a> </div>
      </div>
    </div>
  </div>
</footer>


<script type="text/javascript" src="<?php echo siteUrl; ?>/js/html5.js"></script> 
<script src="<?php echo siteUrl; ?>/js/animatescroll.js"></script> 
<script src="<?php echo siteUrl; ?>/js/jquery.masonry.min.js"></script> 
<script type="text/javascript" src="<?php echo siteUrl; ?>/js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo siteUrl; ?>/css/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo siteUrl; ?>/css/jquery.fancybox-buttons.css" media="screen" />
<script type="text/javascript" src="<?php echo siteUrl; ?>/js/jquery.fancybox-buttons.js"></script> 
<script>
    $(document).ready(function (e) {

        $('.fancybox').fancybox();


        $(".form_box_poup").fancybox({
            fitToView: true,
            wrapCSS: 'popup_wrapp' // add a class selector to the fancybox wrap
        });

        $('.fancybox-buttons').fancybox({
            openEffect: 'none',
            closeEffect: 'none',

            prevEffect: 'none',
            nextEffect: 'none',

            closeBtn: false,

            helpers: {
                title: {
                    type: 'inside'
                },
                buttons: {}
            },

            afterLoad: function () {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });

    });

</script> 
<script type="text/javascript" src="<?php echo siteUrl; ?>/js/script.js"></script>
</body>
</html>
