<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 

if(!isset($_SESSION['sldr']))
{
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else
{
    $cat = $_SESSION['sldr'][3];
    $getCourses = "select * from courses where cat='".$cat."'";
    $courses = mysqli_query($conn, $getCourses);    
}
?>

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>Courses</h3>
                            <ul class="breadcrumb">
                                <li><a href="javascript:void(0)">Threat</a></li>
                                <li class="active"><?php echo $cat; ?></li>
                            </ul>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row blog-grid">

                    <?php
                    if($courses->num_rows>0)
					{
						while($row = $courses->fetch_assoc())
                        {
                            ?>
                            <div class="col-md-3">
                                <div class="course-box">
                                    <div class="image-wrap entry">
                                        <img src="images/<?php echo $row['img']; ?>" alt="" class="img-responsive">
                                        <div class="magnifier">
                                         <a href="quiz.php?id=<?php echo $row['course_name'];?>" title=""><i class="flaticon-add"></i></a>
                                        </div>
                                    </div><!-- end image-wrap -->
                                    <div class="course-details">
                                        <a href="syl.php?id=<?php echo $row['course_name']; ?>" class="btn btn-primary wow slideInLeft">View Syl</a>
                                        <hr>
                                        <a href="quiz.php?id=<?php echo $row['course_name'];?>" class="btn btn-warning wow slideInLeft">Start Test</a>
                                    </div><!-- end details -->
                                </div><!-- end box -->
                            </div><!-- end col -->
                            <?php
						}
					}
					else
					{
						echo '<h3>No Courses Aval.</h3>';
                    }
                    ?> 
                        
                    </div><!-- end row -->

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