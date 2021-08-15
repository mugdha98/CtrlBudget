<?php require './includes/common.php';?>
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
        <style>
            .success:hover{
                background-color: #115c52;
                color:white;
            }
            .success{
                color:#115c52;
                border-color:#115c52;
                background-color: white;
            }
        </style>
    </head>
    <body>
       <?php include './includes/header.php';?>
        <div class="conatiner" style="padding-top: 100px">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #115c52;color:white">
                            <center><h3>Create New Plan</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="plan_details.php">
                                Initial Budget<br>
                                <input type="number" name="budget" placeholder="Initial Budget (Ex. 4000)"
                                       class="form-control form-group" pattern="[0-9]+" required>
                                How many peoples you want to add in your group?<br>
                                <input type="number" name="people" placeholder="No. of people" class="form-control form-group" required>
                                <button type="submit" class="btn btn-block success" pattern="[0-9]+">Next</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php'; ?>
    </body>
</html>