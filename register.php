<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>
<body>
<nav class="navbar navbar-dark bg-dark login_header">
<h1>Expense Tracker Signup </h1>
</nav>
	<div class="row register">
		<div class="container-fluid register_col">
			<div class="login-panel panel panel-default">
				<div class="panel-body">
					<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<div class="form-group inp">
								<input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
							</div>
							<div class="form-group inp">
								<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
							</div>
							<div class="form-group inp">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
							<div class="form-group inp">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="form-group inp">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
							</div>
							<div class="checkbox inp">
								<button type="submit" value="submit" name="submit" class="btn btn-warning inp">Register</button><span style="padding-left:250px">
								<a href="index.php" class="btn btn-danger inp">Login</a></span>
							</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
</body>
</html>
