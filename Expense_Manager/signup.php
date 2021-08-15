<?php require './includes/common.php'; ?>
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
        <?php include './includes/header.php';?>
        <div class="container" style="padding-top: 100px">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h3>Sign Up</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="signup_script.php">
                                Name:<br>
                                <input type="text" class="form-group form-control" placeholder="Name" name="name" required>
                                Email:<br>
                                <input type="email" class="form-group form-control" placeholder="Enter Valid Email" name="email"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                Password:<br>
                                <input type="password" class="form-group form-control" placeholder="Password(Min. 6 characters)"
                                       name="password" pattern="{6,}" required > 
                                Phone Number:<br>
                                <input type="number" class="form-group form-control" placeholder="Enter Valid Phone Number(Ex:8448444853)"
                                       name="phone" pattern="{10}" required>
                                <button class="btn btn-lg-active btn-success form-control">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php';?>
    </body>
</html>



