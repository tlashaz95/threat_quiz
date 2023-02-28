<?php 
include 'layouts/headScript.php'; 
include 'layouts/header.php'; 
?>
<body>  

        <section style="min-height:800px;" id="home" class="video-section js-height-full">
            <!-- <video autoplay muted loop>
                <source src="upload/bg.mp4" type="video/mp4"> 
            </video>  -->
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                <img src="images/DivSign.png" alt="logo" height="120" width="120"/>
                    <p>THREAT SOFTWARE</p>
                    <small>"Know your enemy and know yourself and you can fight a hunderd battles without a disaster"</small>
                    <div class="btn-wrapper">
                        <div class="text-center">
                            <a href="courses.php" style="background: #000000" class="btn btn-primary wow slideInLeft">Courses</a>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
        </section>

        <script>
            jQuery(document).ready(function($) {
            var Video_back = new video_background($("#home"), { 
                "position": "absolute", //Follow page scroll
                "z-index": "-1",        //Behind everything
                "loop": true,           //Loop when it reaches the end
                "autoplay": true,       //Autoplay at start
                "muted": true,          //Muted at start
                "mp4":"upload/bg.mp4" ,     //Path to video mp4 format
                "ogg":"upload/bg.ogg" ,     //Path to video ogg format
                "webm":"upload/bg.webm" ,     //Path to video webm format
                "video_ratio": 1.7778,              // width/height -> If none provided sizing of the video is set to adjust
                "fallback_image": "images/dummy.png",   //Fallback image path
                "priority": "html5"             //Priority for html5 (if set to flash and tested locally will give a flash security error)
            });
        });
        </script>
<?php include 'layouts/footer.php'; ?>
</body>
</html>