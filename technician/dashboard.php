<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_techlogin'])){
  $tecEmail = $_SESSION['tecEmail'];
   $tname= $_SESSION['tname'] ;
 } else {
  echo "<script> location.href='techlogin.php'; </script>";
 }
 $sql = "SELECT * FROM technicians_res where assign_tech='".$tname."'";
 $result = $conn->query($sql);
 $submitrequest =$result->num_rows;

 $sql = "SELECT * FROM accptwork where assign_tech='".$tname."'";
 $result = $conn->query($sql);
 $assignwork = $result->num_rows;
?>
<div class="col-sm-9 col-md-10">
  <div class="row mx-5 text-center">
    <div class="col-sm-4 mt-5">
      <div style="background-color:black;max-width: 18rem;"  class="card text-white">
        <div class="card-header">Requests Received</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $submitrequest; ?>
          </h4>
          <a class="btn text-white" href="trequest.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-0" style="max-width: 18rem;">
        <div class="card-header"> Work Accept</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $assignwork; ?>
          </h4>
          <a class="btn text-white" href="work.php">View</a>
        </div>
      </div>
    </div>
    
  </div>
 
</div>
</div>
<?php
include('includes/footer.php'); 
?>