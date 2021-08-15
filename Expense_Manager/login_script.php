<?php
    require './includes/common.php';
    $email=mysqli_real_escape_string($con,$_POST['email']);
    
    //To check whether the entered email matchs with an existing email or not
    $email_query="SELECT id,email from users where email='$email'";
    $query_res=mysqli_query($con,$email_query)or die(mysqli_error($con));
    $no_of_rows=  mysqli_num_rows($query_res);
    
    if($no_of_rows==0){ //when the entered email is not correct
        echo '<script type="text/javascript">{alert("Please enter correct email."); }</script>';
        echo '<script>location.href="login.php"</script>';
    }
    else{
        $pass=md5(mysqli_real_escape_string($con,$_POST['password']));
        //To check whether the entered password is of that particular mail or not
        $password_query="SELECT id,email from users where email='$email' and password='$pass'";
        $query_res=mysqli_query($con,$password_query)or die(mysqli_error($con));
        $no_of_rows=  mysqli_num_rows($query_res);
        
        if($no_of_rows==0){ //when entered password doesnot match with the actual password of that email
            echo '<script type="text/javascript">{alert("Password entered is incorrect."); }</script>';
            echo '<script>location.href="login.php"</script>';
        }
        else{
            $_SESSION['id']=  mysqli_insert_id($con);
            $_SESSION['email']=$email;
            //echo $_SESSION['email'];
            header('location:homepage.php');
        }   
    }
    
?>

