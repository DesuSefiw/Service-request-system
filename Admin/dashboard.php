<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
    $staff = $_SESSION['staff'];

 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 
 $sql = "SELECT * FROM submitrequest_tb where requester_city='".$staff."' ";
 $result = $conn->query($sql);
 $submitrequest = $result->num_rows;

 $sql = "SELECT * FROM assignwork_tb where requester_city='".$staff."'";
 $result = $conn->query($sql);
 $assignwork = $result->num_rows;

 $sql = "SELECT * FROM technicianlogin where staff='".$staff."'";
 $result = $conn->query($sql);
 $totaltech = $result->num_rows;

?>
<body>
<div class="col-sm-9 col-md-9">
  <div class="row mx-3 text-center">
    <div class="col-sm-4 mt-5">
      <div style="background-color:black;max-width: 16rem;"  class="card text-white">
        <div class="card-header">Requests Received</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $submitrequest; ?>
          </h4>
          <a class="btn text-white" href="request.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Assigned Work</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $assignwork; ?>
          </h4>
          <a class="btn text-white" href="work.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">No. of Technician</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $totaltech; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-5 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Requester</p>
    <?php
    $sql = "SELECT * FROM requesterlogin_tb where staff='".$staff."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Requester ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
	<th scope="col">Staff</th>

   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["r_login_id"].'</th>';
    echo '<td>'. $row["r_name"].'</td>';
    echo '<td>'.$row["r_email"].'</td>';
	echo '<td>'.$row["staff"].'</td>';

  }
 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
?>
  </div>
</div>
</div>
</div>
</body>
<?php
include('includes/footer.php'); 
?>