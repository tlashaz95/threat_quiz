<?php 
include 'layouts/headScript.php'; 
include 'layouts/mainHeader.php'; 

if(!isset($_SESSION['sldr']))
{
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else
{
    $subj = "";
    if(isset($_GET['id']))
    {
        $subj = $_GET['id'];
    }
    else
    {
        echo "No Quiz sel.";
    }

    $_SESSION['course'] = $subj;

    $armyNo = $_SESSION['sldr'][0];
    $rank = $_SESSION['sldr'][1];
    $name = $_SESSION['sldr'][2];
    $cat = $_SESSION['sldr'][3];
    $unit = $_SESSION['sldr'][4];

    $getQs = "(SELECT * FROM question WHERE course='".$subj."' AND difficulty='Easy' LIMIT 6) 
                UNION 
                    (SELECT * FROM question WHERE course='".$subj."' AND difficulty='Medium' LIMIT 7) 
                UNION 
                    (SELECT * FROM question WHERE course='".$subj."' AND difficulty='Adv' LIMIT 7) 
                ORDER BY RAND()";
    $i = 1;
    $result = mysqli_query($conn, $getQs);
    $rows = mysqli_num_rows($result);
}
?>

<style>
        .hide {
            display: none;
        }

        @import url(https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css);

        p {
            font-family: 'Noto Nastaliq Urdu', serif;
            word-spacing: 15px;
            font-size: 1.8em;
            direction: rtl;
        }

        input:not([type="radio"]) {
            width: 50%;
            margin: 0px;
        }
    </style>

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:5%;" class="tagline-message page-title text-center">
                            <h3>Quiz - <?php echo $subj; ?></h3>
                            <ul class="breadcrumb">
                                <li><a href="javascript:void(0)"><?php echo $cat ?></a></li>
                                <li class="active"><?php echo $armyNo.", ".$rank." ".$name.", ".$unit; ?></li>
                            </ul>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">
                        <div class="col-md-9">
                            <form role="form" method="post" id="login" action="result.php">
                            <?php
                            // Displaying Random Qs
                            while ($row = $result->fetch_assoc()) 
                            {
                                if ($i == 1) 
                                {
                            ?>
                            <div id="question<?php echo $i; ?>" class="cont content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <!-- Question text -->
                                        <small class="questions"><a href="#">Q# <?php echo $i.' of '.$rows; ?></a></small>
                                        <h3 class="questions" id="qname<?php echo $i; ?>"><?php echo $row['qs']; ?></h3>
                                    </div><!-- end blog-meta -->

                                    <div class="widget">
                                        <div class="media-body">
                                            <!-- 4 Options -->
                                            <h3 class="mt-4">
                                                <small>a. </small> <input type="radio" value="1" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option1']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>b. </small> <input type="radio" value="2" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option2']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>c. </small> <input type="radio" value="3" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option3']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>d. </small> <input type="radio" value="4" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option4']; ?>
                                            </h3>
                                            
                                        </div>                    
                                    </div><!-- end widget -->

                                    <div class="course-details">
                                        <input type="radio" checked='checked' style='display:none' value="5"
                                            id='radio1_<?php echo $row['questionID']; ?>'
                                            name='<?php echo $row['questionID']; ?>'/>

                                        <button id='<?php echo $i; ?>' class='next btn btn-success wow slideInRight' type='button'>Next</button>
                                    </div><!-- end details -->
                                </div>
                            </div>

                            <?php } 
                                elseif ($i < 1 || $i < $rows) {
                            ?>

                            <div id="question<?php echo $i; ?>" class="cont content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <!-- Question text -->
                                        <small class="questions"><a href="#">Q# <?php echo $i; ?> of 20</a></small>
                                        <h3 class="questions" id="qname<?php echo $i; ?>"><?php echo $row['qs']; ?></h3>
                                    </div><!-- end blog-meta -->

                                    <div class="widget">
                                        <div class="media-body">
                                            <!-- 4 Options -->
                                            <h3 class="mt-4">
                                                <small>a. </small> <input type="radio" value="1" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option1']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>b. </small> <input type="radio" value="2" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option2']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>c. </small> <input type="radio" value="3" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option3']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>d. </small> <input type="radio" value="4" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option4']; ?>
                                            </h3>
                                            
                                        </div>                    
                                    </div><!-- end widget -->

                                    <div class="course-details">
                                        <input type="radio" checked='checked' style='display:none' value="5"
                                            id='radio1_<?php echo $row['questionID']; ?>'
                                            name='<?php echo $row['questionID']; ?>'/>

                                        <button id='<?php echo $i; ?>' class='previous btn btn-warning wow slideInLeft' type='button'>Previous</button>
                                        <button id='<?php echo $i; ?>' class='next btn btn-success wow slideInRight' type='button'>Next</button>
                                    </div><!-- end details -->
                                </div>
                            </div>

                            <?php } 
                            elseif ($i == $rows) 
                            {
                            ?>

                            <div id="question<?php echo $i; ?>" class="cont content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <!-- Question text -->
                                        <small class="questions"><a href="#">Q# <?php echo $i; ?> of 20</a></small>
                                        <h3 class="questions" id="qname<?php echo $i; ?>"><?php echo $row['qs']; ?></h3>
                                    </div><!-- end blog-meta -->

                                    <div class="widget">
                                        <div class="media-body">
                                            <!-- 4 Options -->
                                            <h3 class="mt-4">
                                                <small>a. </small> <input type="radio" value="1" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option1']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>b. </small> <input type="radio" value="2" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option2']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>c. </small> <input type="radio" value="3" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option3']; ?>
                                            </h3>

                                            <h3 class="mt-4">
                                                <small>d. </small> <input type="radio" value="4" id='radio1_<?php echo $row['questionID']; ?>'
                                                name='<?php echo $row['questionID']; ?>'/>
                                                <?php echo $row['option4']; ?>
                                            </h3>
                                            
                                        </div>                    
                                    </div><!-- end widget -->

                                    <div class="course-details">
                                        <input type="radio" checked='checked' style='display:none' value="5"
                                            id='radio1_<?php echo $row['questionID']; ?>'
                                            name='<?php echo $row['questionID']; ?>'/>

                                        <button id='<?php echo $i; ?>' class='previous btn btn-warning wow slideInLeft' type='button'>Previous</button>
                                        <button id='<?php echo $i; ?>' class='next btn btn-danger wow slideInRight' type='submit'>Finish</button>
                                    </div><!-- end details -->
                                </div>
                            </div>

                            <?php
                                }
                                $i++;
                            }
                                //$conn->close();
                            ?>
                            </form>

                        </div><!-- end col -->

                        <div class="col-md-3">
                            <div id='timer'>
                                <script type="application/javascript">
                                    var myCountdownTest = new Countdown({
                                        time: 600,
                                        width: 180,
                                        height: 100,
                                        rangeHi: "minute"
                                    });
                                </script>
                            </div>
                        </div><!-- end col -->

                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>

<?php

if (isset($_POST[1])) {
    $keys = array_keys($_POST);
    $order = join(",", $keys);

    $response = $conn->query("select questionID,correctOption from question where questionID IN($order) ORDER BY FIELD(questionID,$order)");
    $right_answer = 0;
    $wrong_answer = 0;
    $unanswered = 0;
    while ($result = $response->fetch_assoc()) {
        if ($result['correctOption'] == $_POST[$result['questionID']]) {
            $right_answer++;
        } else if ($_POST[$result['questionID']] == 5) {
            $unanswered++;
        } else {
            $wrong_answer++;
        }

    }

    echo "<h2 style='color:black'>right_answer : " . $right_answer . "</h2><br>";
    echo "<h2 style='color:black'>wrong_answer : " . $wrong_answer . "</h2><br>";
    echo "<h2 style='color:black'>unanswered : " . $unanswered . "</h2><br>";
}
?>

<script>
    $('.cont').addClass('hide');
    count = $('.questions').length;
    $('#question' + 1).removeClass('hide');

    $(document).on('click', '.next', function () {
        last = parseInt($(this).attr('id'));
        nex = last + 1;
        $('#question' + last).addClass('hide');

        $('#question' + nex).removeClass('hide');
    });

    $(document).on('click', '.previous', function () {
        last = parseInt($(this).attr('id'));
        pre = last - 1;
        $('#question' + last).addClass('hide');

        $('#question' + pre).removeClass('hide');
    });

    setTimeout(function () {
        $("form").submit();
    }, 600000);
</script>

    <?php include 'layouts/footer.php'; ?>
</body>
</html>