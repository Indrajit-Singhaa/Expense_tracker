<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand fs-4" href="dashboard.php">Expense Tracker</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="dashboard.php"  onMouseOver="this.style.color='crimson'"
 onMouseOut="this.style.color='white'">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="add-expense.php"  onMouseOver="this.style.color='crimson'"
 onMouseOut="this.style.color='white'">Add Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="manage-expense.php"  onMouseOver="this.style.color='crimson'"
 onMouseOut="this.style.color='white'">Manage Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="change-password.php"  onMouseOver="this.style.color='crimson'"
 onMouseOut="this.style.color='white'"> Change Password</a>
              </li>
             
            </ul>
            <form class="d-flex" role="search">
            
            <?php
$uid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>

<div class="btn-group fs-5 me-3">
  <button type="button" class="btn btn-warning"><?php echo $name; ?></button>
  <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="user-profile.php">Profile</a></li>
    <li><a class="dropdown-item" href="mail.php">Mail</a></li>
    <li><a class="dropdown-item" href="getpdf.php">Invoice </a></li>
  
  </ul>
</div> 
<a class="btn btn-danger" href="logout.php" role="button">Logout</a>
            </form>
          </div>
        </div>
      </nav>


     
      
   
    