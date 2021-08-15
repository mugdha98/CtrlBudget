<?php
require './includes/common.php';
$email=$_SESSION['email'];

$title=mysqli_real_escape_string($con,$_POST['title']);
$from=  mysqli_real_escape_string($con,$_POST['from']);
$to=mysqli_real_escape_string($con,$_POST['to']);
$budget=$_POST['initial'];
$no_of_people=$_POST['people'];

$user_query="select id from users where email='$email'";
$query_run=mysqli_query($con,$user_query) or die(mysqli_error($con));
$user_id=  mysqli_fetch_array($query_run);
$id=$user_id['id'];

$id_query="select * from budget_plan where user_id=$id and title='$title'";
$result=mysqli_query($con,$id_query)or die(mysqli_error($con));
$title_rows=  mysqli_num_rows($result);

if($title_rows>0){ // To ensure that no user have the same title for two budgets
    echo '<script type="text/javascript">alert("title is already taken!");</script>';
    echo "<script>window.location = 'create_new_plan.php';</script>";
}
else{
    $insert_query="insert into budget_plan (title,from_date,to_date,initial_budget,people,user_id)"
            . " values('$title','$from','$to','$budget','$no_of_people','$id')";
    $query_res=mysqli_query($con,$insert_query)or die(mysqli_error($con));
    
    $select=$id_query="select * from budget_plan where user_id=$id and title='$title'";
    $query=mysqli_query($con,$select)or die(mysqli_error($con));
    $bud=  mysqli_fetch_array($query);
    
    $id1=$bud['id'];
    echo $id1;
    $ex=0;
    foreach($_POST['person'] as $p){
        $query="insert into person_details (bud_id,name,expense) values('$id1','$p','$ex')";
        $res_query=mysqli_query($con,$query)or die(mysqli_error($con));
    }
    header('location:homepage.php');
}
?>
