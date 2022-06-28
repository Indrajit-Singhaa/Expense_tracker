<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblexpense where ID='$rowid'");
if($query){
echo "<script>alert('Record successfully deleted');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}

}
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>manage_expense</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style=" background-color: #06283D">
  <?php include_once('includes/navbar.php');?>




  <div class="container_fluid mt-5">

  <table class="table table-dark table-hover ">
  <thead>
    <tr>
                 <th scope="col">S.NO</th>
                  <th scope="col">Expense Item</th>
                  <th scope="col">Expense Cost</th>
                  <th scope="col">Expense Date</th>
                  <th scope="col">Action</th>

    </tr>
  </thead>
  <?php
              $userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td><?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td><a class="btn btn-danger" href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
</table>
  

</div>


  </body>
</html>

