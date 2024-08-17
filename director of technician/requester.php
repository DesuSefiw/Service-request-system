<?php
define('TITLE', 'Requesters');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_atechlogin'])){
  $tEmail = $_SESSION['tEmail'];
    $staff = $_SESSION['tstaff'];

 } else {
  echo "<script> location.href='techlogin.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-dark text-white p-2">List of Requesters</p>
  <?php
    $sql = "SELECT * FROM technicianlogin where staff='".$staff."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Requester ID</th>
	   <th scope="col"> name </th>
    <th scope="col">Email</th>
	 <th scope="col">Staff</th>
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["t_id"].'</th>';
	    echo '<td>'.$row["name"].'</td>';
	    echo '<td>'.$row["email"].'</td>';
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
<?php
include('includes/footer.php'); 
?>