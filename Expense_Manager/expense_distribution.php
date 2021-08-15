<!DOCTYPE html>
<?php require './includes/common.php'; 
$em=$_SESSION['email'];

// To fetch the id of that particular email
$select_id="select id from users where email='$em'";
$query_run=mysqli_query($con,$select_id) or die(mysqli_error($con));
$row_id=  mysqli_fetch_array($query_run) or die(mysqli_error($con));
$id=$row_id['id'];
$title=$_GET['title'];

// To ensure that budget id is of that particular user and of that particular budget title
$select_bid_query="select * from budget_plan bp where bp.user_id ='$id' and title='$title'";
$query_bud_res=  mysqli_query($con, $select_bid_query) or die(mysqli_error($con));
$fetch=mysqli_fetch_array($query_bud_res);
$b_id=$fetch['id'];
$budget=$fetch['initial_budget'];
$pep=$fetch['people'];
$frm=$fetch['from_date'];
$to=$fetch['to_date'];
?>
<html>
    <head>
        <title>Ct₹l Budget</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--for jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--for javascript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body style='background-color: #f5fcff;'>
        <?php include './includes/header.php';?>
        <div class="conatiner" style="padding-top: 100px">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#115c52;color:white">
                            <div class='row'>
                                <div class='col-xs-10'>
                                    <center><?php echo $title;?></center>
                                </div>
                                <div class=' col-xs-2'>
                                    <span class='glyphicon glyphicon-user'></span> <?php echo $pep;?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class='row'>
                                <div class='col-xs-8 '>
                                    <strong>Initial budget</strong>
                                </div>
                                <div class='col-xs-offset-2 col-xs-2'>
                                    <p><strong>₹<?php echo $budget; ?></strong></p>
                                </div>
                            </div>
                            <?php
                                $name_query="select * from person_details where bud_id='$b_id'";
                                $query_res=mysqli_query($con,$name_query) or die(mysqli_error($con));
                                $n=$pep;
                                $sum=0;
                                while($n--){ 
                                    //To fetch the individual expenses made by the people so as to know the total amount spent
                                    $name_res=  mysqli_fetch_array($query_res) or die(mysli_error($con));
                                    $sum=$sum+$name_res['expense'];?>
                                    <div class='row'>
                                        <div class='col-xs-8 '>
                                            <strong><?php echo $name_res['name']; ?></strong>
                                        </div>
                                        <div class='col-xs-offset-2 col-xs-2'>
                                            <p>₹<?php echo $name_res['expense']; ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            ?>
                            <div class='row'>
                                <div class='col-xs-8 '>
                                    <strong>Total amount spent</strong>
                                </div>
                                <div class='col-xs-offset-2 col-xs-2'>
                                    <p><strong>₹<?php echo $sum; ?></strong></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-xs-8 '>
                                    <strong>Remaining Amount</strong>
                                </div>
                                <div class='col-xs-offset-2 col-xs-2'>
                                    <?php
                                        $amt=$budget-$sum;
                                        if($amt>0){ ?>
                                            <p style="color:green">₹<?php echo $amt;?></p>
                                        <?php } elseif ($amt<0) { ?>
                                            <p style="color:red">₹<?php echo $amt;?></p>
                                        <?php } else{ ?>
                                            <p style="color:black">₹<?php echo $amt;?></p>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-xs-8 '>
                                    <strong>Individual Shares</strong>
                                </div>
                                <div class='col-xs-offset-2 col-xs-2'>
                                    <p>₹<?php $share=$sum/$pep; echo $share;  ?></p>
                                </div>
                            </div>
                            <?php
                            // To show the how much amount each individual person has to take/give 
                                $name1_query="select * from person_details where bud_id='$b_id'";
                                $query1_res=mysqli_query($con,$name1_query) or die(mysqli_error($con));
                                $no=$pep;
                                while($no--){ 
                                    $name_res=mysqli_fetch_array($query1_res) or die(mysli_error($con));?>
                                    <div class='row'>
                                        <div class='col-xs-5 '>
                                            <strong><?php echo $name_res['name']; ?></strong>
                                        </div>
                                        <div class='col-xs-offset-2 col-xs-5' style='float:right'>
                                            <?php
                                                $amt=$name_res['expense']-$share;
                                                if($amt>0){ ?>
                                                    <p style="color:green;float:right">Gets back ₹<?php echo $amt;?></p>
                                                <?php } elseif ($amt<0) { ?>
                                                    <p style="color:red;float:right">Owes ₹<?php echo $amt;?></p>
                                                <?php } else{ ?>
                                                    <p style="color:black;float:right">All settled up</p>
                                                <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                }
                            ?>
                            <center>
                                <!-- To take the user back to the view page-->
                                <button class='btn' style="border-color:#115c52;color:#115c52;background-color: white"
                                        onclick="window.location.href ='view_plan.php?title=<?php echo $title; ?>'">
                                <span class='glyphicon glyphicon-arrow-left' style='color:#115c52'></span>Go back</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php'; ?>
    </body>
</html>
