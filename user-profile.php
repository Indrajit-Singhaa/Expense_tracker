<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $userid=$_SESSION['detsuid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['contactnumber'];

     $query=mysqli_query($con, "update tbluser set FullName ='$fullname', MobileNumber='$mobno' where ID='$userid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
}
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user profile</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include_once('includes/navbar.php');?>
  <div class="container-fluid">
    <div class="row">
        <div class="col-5 ms-4 mt-3">

        <?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
  <form role="form" method="post" action="" >
		<div class="form-group  mt-2">
		<label>Full Name</label>
        <input class="form-control" type="text" value="<?php  echo $row['FullName'];?>" name="fullname" required="true">
		</div>
		<div class="form-group  mt-2">
		<label>Email</label>
        <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required="true" readonly="true">
		</div>
	    <div class="form-group  mt-2">
		<label>Mobile Number</label>
		<input class="form-control" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true" name="contactnumber" maxlength="10">
			</div>
		<div class="form-group  mt-2">
			<label>Registration Date</label>
			<input class="form-control" name="regdate" type="text" value="<?php  echo $row['RegDate'];?>" readonly="true">
		</div>
								
		<div class="form-group has-success  mt-2">
			<button type="submit" class="btn btn-primary" name="submit">Update</button>
		</div>
								
								
		
		<?php } ?>
	</form>

        </div>
        <div class="col-6">
        <img src="./img/profile.png" class="img-fluid ms-5" alt="..." style="height: 80vh ">

        </div>

    </div>
  </div>
    
  </body>
</html>

