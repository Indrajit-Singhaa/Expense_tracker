<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$userid=$_SESSION['detsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}
  }
  
  ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>change password</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>  
</head>
  <body>
  <?php include_once('includes/navbar.php');?>
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-sm-12 ms-4 mt-3">
        <h2 class="text-center p-1 ">Change Password</h2>
        <?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">

<div class="form-group mt-3">
	<label>Current Password</label>
	<input type="password" placeholder="Your current password" name="currentpassword" class=" form-control" required= "true" value="">	</div>
		<div class="form-groupmt-3">
	<label>New Password</label>
	<input type="password" placeholder="Your New password" name="newpassword" class="form-control" value="" required="true">
</div>
								
<div class="form-group mt-3">
	<label>Confirm Password</label>
	<input type="password" name="confirmpassword" placeholder="confirm password"class="form-control" value="" required="true">
</div>

<div class="form-group has-success mt-3">
<button type="submit" class="btn btn-primary" name="submit">Change</button>
</div>
								
												
<?php } ?>
</form>
        

        </div>
        <div class="col-lg-6 col-sm-12">
        <img src="./img/passs.png" class="img-fluid ms-5" alt="..." style="height: 80vh ">

        </div>



    </div>
  </div>
    
  </body>
</html>