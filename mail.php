<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
  }

  ?>




<?php

$userid=$_SESSION['detsuid'];
 $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];


// <?php  echo $row['Email'];



$uid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select Email from tbluser where ID='$uid'");
$row=mysqli_fetch_assoc($ret);
$name=$row['Email'];





$to_email = "$name";
$subject = "your mothly expense";
$body ="This Month your Expenses is  $sum_monthly_expense...";
$headers = "From:uic.21mca2446@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    
    header('Location: dashboard.php');

} else {
    echo "Email sending failed...";
}

?>