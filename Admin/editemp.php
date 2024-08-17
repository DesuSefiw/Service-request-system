<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['empupdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['empName'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $eId = $_REQUEST['empId'];
    $eName = $_REQUEST['empName'];
    $ema = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
	    $staff = $_REQUEST['tstaff'];

  $sql = "UPDATE technicianlogin SET name = '$eName', email = '$ema', password = '$pass' ,staff='$staff'WHERE t_id = '$eId'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Technician Details</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM technicianlogin WHERE t_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="empId">Emp ID</label>
      <input type="text" class="form-control" id="empId" name="empId" value="<?php if(isset($row['t_id'])) {echo $row['t_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName" value="<?php if(isset($row['name'])) {echo $row['name']; }?>">
    </div>
    <div class="form-group">
      <label for="email">empEmail</label>
      <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($row['email'])) {echo $row['email']; }?>">
    </div>
    <div class="form-group">
      <label for="password">password</label>
      <input type="text" class="form-control" id="password" name="password" value="<?php if(isset($row['password'])) {echo $row['password']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
	<div class="form-group">
      <label for="tstaff">Staff</label>
      <input type="text" class="form-control" id="tstaff" name="tstaff" value="<?php if(isset($row['staff'])) {echo $row['staff']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>