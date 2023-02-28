<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 
?>
<body>  
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>Login</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            
                            <form class="big-contact-form" method="post" role="search">
                                <label for="#">Army No</label>
                                <input type="text" class="form-control" name="armyNo">
                                <label for="#">Rank</label>
                                <input type="text" class="form-control" name="rank">
                                <label for="#">Name</label>
                                <input type="text" class="form-control" name="name">
                                <label for="#">Unit</label>
                                <input type="text" class="form-control" name="unit">
                                <label htmlFor="svc">Cat</label>
                                <div style="display:flex; justify-content:left; gap:50px">
                                <h4>Offr <input type="radio" class="form-control" name="cat" value="Offr" /></h4>
                                <h4>Sldr <input type="radio" class="form-control" name="cat" value="Sldr" /></h4>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Submit</button>
                            </form>

                            <?php
                                    if(isset($_POST['login']))
                                    {
                                        $armyNo = $_POST["armyNo"];
										$rank = $_POST["rank"];
                                        $name = $_POST["name"];
                                        $cat = $_POST["cat"];
                                        $unit = $_POST["unit"];

                                        // $loginQuery = "select * from soldier where armyNo='".$armyNo."' AND password='".$pwd."'";
                                        // $result = $conn->query($loginQuery);
										// $row = $result->fetch_assoc();
                                        // if($result->num_rows > 0)
                                        // {
                                        //     echo "$armyNo exists";
                                            $sldrInfo = array($armyNo, $rank, $name, $cat, $unit);

                                            $_SESSION['sldr'] = $sldrInfo;
                                            echo '<script type="text/javascript">location.href = "courses.php";</script>';
                                            //header("Location:test.php");
                                            //exit();
                                        // }
                                        // else
                                        // {
                                        //     echo '<script type="text/javascript">alert("User does  not exist !");</script>';
                                        //     //echo "$trait having $armyNo doesn't exists";
                                        // }
                                    }
                                    $conn->close();
                                    ?>

                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
        </section>
        <?php include 'layouts/footer.php'; ?>

</body>
</html>