<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 

if(!isset($_SESSION['sldr']) && !isset($_SESSION['course']))
{
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else
{
    $course = $_SESSION['course'];

    $armyNo = $_SESSION['sldr'][0];
    $rank = $_SESSION['sldr'][1];
    $name = $_SESSION['sldr'][2];
    $cat = $_SESSION['sldr'][3];
    $unit = $_SESSION['sldr'][4];

    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   
   $response=$conn->query("select questionID,correctOption from question where questionID IN($order) ORDER BY FIELD(questionID,$order)");
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=$response->fetch_assoc()){
       if($result['correctOption']==$_POST[$result['questionID']]){
               $right_answer++;
           }else if($_POST[$result['questionID']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }
   $attempted = ($right_answer+$unanswered+$wrong_answer) - $unanswered;
   $expertise = ($right_answer / ($right_answer+$unanswered+$wrong_answer)) * 100;
   $feedRes = "insert into result(armyNo, rank, name, cat, course, totalQs, attemptedQs, correctQs, wrong, expertise) values ('".$armyNo."', '".$rank."', '".$name."',  '".$cat."',  '".$course."', '".($right_answer+$wrong_answer+$unanswered)."', '".$attempted."', '".$right_answer."', '".$wrong_answer."' , '".$expertise."')";
   $ins = mysqli_query($conn, $feedRes);
}
?>

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>Result</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                            <div class="boxed shop-extra">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu1">Result Details</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active">
                                        <h3><?php echo $armyNo.", ".$rank." ".$name.", ".$unit; ?></h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Total Questions</strong></td>
                                                    <td><?php echo $right_answer+$wrong_answer+$unanswered; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Attempted</strong></td>
                                                    <td><?php echo $attempted; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Correct Answers</strong></td>
                                                    <td><?php echo $right_answer ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Wrong Answers</strong></td>
                                                    <td><?php echo $wrong_answer ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>% age</strong></td>
                                                    <td><?php echo $expertise. '%'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Rating</strong></td>
                                                    <td class="rating">
                                                        <?php
                                                        if($expertise >= 20)
                                                        {
                                                            for($i = 20 ; $i <= $expertise ; $i+=20)
                                                            {
                                                            ?>
                                                            <i class="fa fa-star"></i>
                                                            <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <td>Poor Rating</td>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end shop-extra -->
            </div><!-- end container -->
        </section>


    <?php include 'layouts/footer.php'; ?>
</body>
</html>