<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 

if(!isset($_SESSION['sldr']))
{
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else
{
    if(isset($_GET['id']))
    {
        $subj = $_GET['id'];
        $getFileName = "select file from courses where course_name='".$subj."'";
        $fileQuery = mysqli_query($conn, $getFileName);
        $file = $fileQuery->fetch_assoc();
        $fileName = $file['file'];
        echo $fileName;
    }
    else
    {
        echo "No Course sel.";
    }
}
?>

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>
                            <a href="courses.php">
                                <span style="color:whitesmoke;" class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                                Syl - <?php echo $subj; ?>
                            </h3>
                            <!-- <ul class="breadcrumb">
                                <li><a href="javascript:void(0)">Sldr</a></li>
                                <li class="active">BCC</li>
                            </ul> -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                <?php 
                    if(file_exists("courses/$fileName"))
                    {
                        ?>
                        <div class="row blog-grid">

                        <embed src="courses/<?php echo $fileName; ?>#toolbar=1&navpanes=1&zoom=140" type="application/pdf" toolbar="0" statusbar="0" navpanes="0" width="100%" height="900px" />
                        </div><!-- end row -->
                        <?php
                    }
                    else
                    {
                        echo "<h2 style='text-align:center;'>$subj Syl not uploaded !</h2>";
                    }
                    ?>

                    <hr class="invis">

                    <!-- <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination ">
                                <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">3</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">&raquo;</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>


    <?php include 'layouts/footer.php'; ?>
</body>
</html>