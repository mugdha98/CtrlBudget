<?php
    require './includes/common.php';
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
    <body>
        <?php include './includes/header.php'; ?>
        <div class="conatiner" style="padding-top: 100px">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="plan_script.php">
                                <strong>Title</strong><br>
                                <input type="text" name="title" placeholder="Enter Title (Ex. Trip to Goa)"class="form-control form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <strong>From</strong> <br>
                                        <input type="date" name="from" placeholder="dd/mm/yyyy"
                                               min="2019-04-01" max="2019-04-20" required class="form-control form-group">
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>To</strong> <br>
                                        <input type="date" name="to" placeholder="dd/mm/yyyy" 
                                               min="2019-04-01" max="2019-04-20" required class="form-control form-group">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <strong>Initial Budget</strong><br>
                                        <input type="number" name="initial" value="<?php echo $_POST['budget']; ?>"
                                               placeholder="<?php echo $_POST['budget']; ?>" class="form-control form-group" readonly/>
                                    </div>
                                    <div class="col-xs-4">
                                        <strong>No. of People</strong> <br>
                                        <input type="number" name="people"value="<?php echo $_POST['people']; ?>"
                                               placeholder="<?php echo $_POST['people']; ?>" class="form-control form-group" readonly/>
                                    </div>
                                </div>
                                <?php
                                // To fetch the names of the people according to the no of persons in a given budget
                                $n=$_POST['people'];
                                $c=0;
                                
                                while($n--){
                                    $c++;?>
                                <strong>Person <?php echo $c;?></strong><br>
                                    <input type="text" name="person[]" placeholder="Person <?php echo $c;?> Name" class="form-control form-group">
                                <?php }
                                ?>
                                    
                                <button class="btn btn-block" style="border-color: green;color:green; background-color: white">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php';?>
    </body>
</html>

