<?php require './includes/common.php';
$exp_title=mysqli_real_escape_string($con,$_POST['title']);
$exp_date=mysqli_real_escape_string($con,$_POST['date']);
$expense=mysqli_real_escape_string($con,$_POST['amount']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$bud_title=mysqli_real_escape_string($con,$_POST['budget_title']);

$em=$_SESSION['email'];
$select_id="select id from users where email='$em'";
$query_run=mysqli_query($con,$select_id) or die(mysqli_error($con));
$row_id=  mysqli_fetch_array($query_run) or die(mysqli_error($con));
$id=$row_id['id'];

$select_bid_query="select * from budget_plan bp where bp.user_id ='$id' and title='$bud_title'";
$query_bud_res=  mysqli_query($con, $select_bid_query) or die(mysqli_error($con));
$fetch=mysqli_fetch_array($query_bud_res);
$b_id=$fetch['id'];

$select_per_query="select * from person_details where bud_id='$b_id' and name='$name'";
$query_per_res= mysqli_query($con, $select_per_query) or die(mysqli_error($con));
$per_id=mysqli_fetch_array($query_per_res);
$p_id=$per_id['id'];
$p_exp=$per_id['expense'];
$p_exp+=$expense;
//$_SESSION['title_bud']=$bud_title;
////echo $p_id;
//$insert_exp="insert into person_details ('expense')values('$p_exp') where id='$p_id'";
//$exp_per_run=mysqli_query($con, $insert_exp) or die(mysqli_error($con));

function GetImageExtension($imagetype){
    if(empty($imagetype)) return false;
    switch($imagetype){
        case'image/bmp': return '.bmp';
        case'image/gif': return '.gif';
        case'image/jpeg': return '.jpg';
        case'image/png': return '.png';
        default:return false;
    } 
}
if( !empty( $_FILES['uploadedimage']['name'])){ 
    $file_name=$_FILES['uploadedimage']['name'];
    $temp_name=$_FILES['uploadedimage']['tmp_name'];
    $imgtype=$_FILES['uploadedimage']['type'];
    $ext= GetImageExtension($imgtype);
    if($ext=="false"){
        echo"<script type='text/javascript'>alert('Only bmp,jpg,png,gif are allowed')</script>";
    }
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path="img/".$imagename;
    $fi=move_uploaded_file($temp_name,$target_path);
    if($fi){
        $insert_query="insert into add_expense(title,date,expense,p_id,bill)values"
                . "('$exp_title','$exp_date','$expense','$p_id','$target_path')";
        $insert_exp_run=mysqli_query($con, $insert_query) or die(mysqli_error($con));
        $update_per="update person_details set expense ='$p_exp' where id='$p_id'";
        $update_run=  mysqli_query($con, $update_per)or die(mysqli_error($con));
        header("location:view_plan.php?title=$bud_title");
    }      
}
else{
    $insert_query="insert into add_expense(title,date,expense,p_id)values"
                . "('$exp_title','$exp_date','$expense','$p_id')";
    $insert_exp_run=mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $update_per="update person_details set expense ='$p_exp' where id='$p_id'";
    $update_run=  mysqli_query($con, $update_per)or die(mysqli_error($con));
    header("location:view_plan.php?title=$bud_title");
}
?>