<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
  }

  ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <?php include_once('includes/navbar.php');?>


<h1 class="text-center p-3 ">Dashboard</h1>
  <div class="container mt-5">
    <div class="row">


        <div class="col-4 mt-5">
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Today Expense</div>
  <div class="card-body">

  <?php
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 
    
    <p class="card-text text-center fs-3">

    <?php if($sum_today_expense==""){
echo "0";
} else {
echo $sum_today_expense;
}

	?>

    </p>
   
  </div>
  <a href="add-expense.php" class="btn btn-dark fs-5">Add Expense <i class="fa-solid fa-circle-plus"></i></a>
</div>
        </div>


        <div class="col-4 mt-5">
        <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Yestreday Expense</div>
  <div class="card-body">

  <?php
//Yestreday Expense
$userid=$_SESSION['detsuid'];
$ydate=date('Y-m-d',strtotime("-1 days"));
$query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
$result1=mysqli_fetch_array($query1);
$sum_yesterday_expense=$result1['yesterdayexpense'];
 ?> 
			
    
    <p class="card-text text-center fs-3"><?php if($sum_yesterday_expense==""){
echo "0";
} else {
echo $sum_yesterday_expense;
}

	?>


    
</p>
  </div>
</div>
        </div>




        <div class="col-4 mt-5">
        <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Last 7day's Expense</div>
  <div class="card-body">

  <?php
//Weekly Expense
$userid=$_SESSION['detsuid'];
 $pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
$result2=mysqli_fetch_array($query2);
$sum_weekly_expense=$result2['weeklyexpense'];
 ?>
    
    <p class="card-text text-center fs-3">

    <?php if($sum_weekly_expense==""){
echo "0";
} else {
echo $sum_weekly_expense;
}

	?>

    </p>
  </div>
</div>
        </div>





        <div class="col-4 mt-5">
        <div class="card text-bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Last 30day's Expenses</div>
  <div class="card-body">

  <?php
//Monthly Expense
$userid=$_SESSION['detsuid'];
 $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
 ?>
    
    <p class="card-text text-center fs-3">

    <?php if($sum_monthly_expense==""){
echo "0";
} else {
echo $sum_monthly_expense;
}

	?>
    </p>
  </div>
</div>
        </div>




        <div class="col-4 mt-5">
        <div class="card text-bg-dark mb-3"" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Current Year Expenses</div>
  <div class="card-body">

  <?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
 $cyear= date("Y");
$query4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
$result4=mysqli_fetch_array($query4);
$sum_yearly_expense=$result4['yearlyexpense'];
 ?>
    
    <p class="card-text text-center fs-3">

    <?php if($sum_yearly_expense==""){
echo "0";
} else {
echo $sum_yearly_expense;
}
?>

    </p>
  </div>
</div>
        </div>






        <div class="col-4 mt-5">
        <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header text-center fs-4">Total Expense</div>
  <div class="card-body">

  <?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
$query5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexpense'];
 ?>
    
    <p class="card-text text-center fs-3"><?php if($sum_total_expense==""){
echo "0";
} else {
echo $sum_total_expense;
}

	?>
    </p>
  </div>
</div>
        </div>



    </div>
  </div>

  
    
  </body>
</html>
