<?php
define('TITLE', 'Workveiw');
define('PAGE', 'workveiw');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_atechlogin'])){
  $tEmail = $_SESSION['tEmail'];
    $tstaff = $_SESSION['tstaff'];

 } else {
  echo "<script> location.href='techlogin.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-dark text-white p-2">Work done/not list</p>
  <?php
    $sql = "SELECT * FROM accptwork where staff='".$tstaff."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Requester ID</th>
	<th scope="col">Requester info</th>
	 <th scope="col">Staff</th>
	 	 <th scope="col">Date:</th>
	 <th scope="col">technician name</th>
	 <th scope="col"> comment </th>

   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["request_id"].'</th>';
	    echo '<th scope="row">'.$row["request_info"].'</th>';

	    echo '<td>'.$row["staff"].'</td>';
	    echo '<td>'.$row["assign_date"].'</td>';
	    echo '<td>'.$row["assign_tech"].'</td>';
	    echo '<td>'.$row["comment"].'</td>';

    echo  '</tr>';
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM accptwork WHERE request_id = {$_REQUEST['id']}";
  if($conn->query($sql) === TRUE){
    // echo "Record Deleted Successfully";
    // below code will refresh the page after deleting the record
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
?>
</div>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>