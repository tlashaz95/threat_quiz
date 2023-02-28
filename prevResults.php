<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 

if(!isset($_SESSION['sldr']) && !isset($_SESSION['course']))
{
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else
{
    //$course = $_SESSION['course'];

    $armyNo = $_SESSION['sldr'][0];
    $rank = $_SESSION['sldr'][1];
    $name = $_SESSION['sldr'][2];
    $cat = $_SESSION['sldr'][3];
    $unit = $_SESSION['sldr'][4];

    $prevResults = "select * from result where armyNo='".$armyNo."'";
    $result = mysqli_query($conn, $prevResults);
}
?>

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>Prev Results</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                            <div class="boxed">
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active">
                                        <h3><?php echo $armyNo.", ".$rank." ".$name.", ".$unit; ?></h3>
                                        <?php
                                        if($result->num_rows > 0)
                                        {
                                            $i = 1;
                                            ?>
                                            <table class="table table-responsive table-striped table-hover">
                                                <thead class="thead-dark">
                                                    <th>
                                                        <strong>Ser</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Test No</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Course</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Total Questions</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Questions Attempted</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Correct Answers</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Wrong Answers</strong>
                                                    </th>
                                                    <th>
                                                        <strong>% age</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Test Time</strong>
                                                    </th>
                                                </thead>
                                                <?php
                                                while($prev = $result->fetch_assoc())
                                                {
                                                    ?>
                                                     <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $i;?>
                                                            </td>
                                                            <td>
                                                                <?php echo "Test ".$i;?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['course']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['totalQs']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['attemptedQs']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['correctQs']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['wrong']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prev['expertise']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date('H:i', strtotime($prev['testTime']))." / ".date('d-m-Y', strtotime($prev['testTime'])); ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </table>
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<h2 style='text-align:center;'>No previous result aval.</h2>"; 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div><!-- end shop-extra -->
            </div><!-- end container -->
        </section>


    <?php include 'layouts/footer.php'; ?>
</body>
</html>