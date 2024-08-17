<?php    
if(session_id() == '') {
  session_start();
}
if(isset($_SESSION['is_atechlogin'])){
 $tEmail = $_SESSION['tEmail'];
} else {
 echo "<script> location.href='techlogin.php'; </script>";
}
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_REQUEST['yes'])){
  // Checking for Empty Fields
  if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "")|| ($_REQUEST['requestercity'] == "")|| ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $rid = $_REQUEST['request_id'];
    $rinfo = $_REQUEST['request_info'];
    $rdesc = $_REQUEST['requestdesc'];
	$file =$_REQUEST['attached'];
    $rname = $_REQUEST['requestername'];
	$staff = $_REQUEST['staff'];
    $radd1 = $_REQUEST['address1'];
    $rcity = $_REQUEST['requestercity'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rdate = $_REQUEST['inputdate'];
	$rassigntech = $_REQUEST['assigntech'];
	$comm = $_REQUEST['comment'];
    $sql = "INSERT INTO technicians_res (request_id, request_info,request_desc, attech_doc, requester_name, staff, requester_add1, requester_city, requester_email, requester_mobile, assign_date, assign_tech,comment) VALUES ('$rid', '$rinfo','$rdesc','$file', '$rname','$staff', '$radd1', '$rcity', '$remail', '$rmobile','$rdate', '$rassigntech','$comm')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Accept work Successfully,thanks!!</div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
    }
 }
 }
 else if(isset($_REQUEST['no'])){
	 $rid = $_REQUEST['request_id'];
    $rinfo = $_REQUEST['request_info'];
    $rdesc = $_REQUEST['requestdesc'];
	$file =$_REQUEST['attached'];
    $rname = $_REQUEST['requestername'];
	$staff = $_REQUEST['staff'];
    $radd1 = $_REQUEST['address1'];
    $rcity = $_REQUEST['requestercity'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rdate = $_REQUEST['inputdate'];
	$rassigntech = $_REQUEST['assigntech'];
	$comm = $_REQUEST['comment'];
   $sql = "INSERT INTO submitrequest_tb(request_id,request_info,attech_doc, request_desc, requester_name,staff ,requester_add1, requester_city, requester_email, requester_mobile, request_date,comment) VALUES ('$rid','$rinfo','$file','$rdesc', '$rname','$staff', '$radd1', '$rcity', '$remail', '$rmobile', '$rdate','$comm')";
if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> don not accept work!!</div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> please,try Again!! </div>';
    }
  }
 // Assign work Order Request Data going to submit and save on db technicians_res table [END]
 ?>
<div class="col-sm-5 mt-5 jumbotron">
  <!-- Main Content area Start Last -->
  <form action="" method="POST" enctype="multipart/form-data">
    <h5 class="text-center"> Technician Assign Work Order Request</h5>
    <div class="form-group">
      <label for="request_id">Request ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id']; }?>"
        readonly>
    </div>
    <div class="form-group">
      <label for="request_info">Request Info</label>
      <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info']; }?>">
    </div>
	<div class="form-group">
      <label for="request_info">Attachmet doc</label>
      <input type="text" class="form-control" id="attach" name="attached" value="<?php if(isset($row['attech_doc'])) {echo $row['attech_doc']; }?>">
    </div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?>">
    </div>
    <div class="form-group">
      <label for="requestername">Name</label>
      <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name'])) { echo $row['requester_name']; } ?>">
    </div>
    <div class="form-group">
      <label for="staff">TO(Department)</label>
      <input type="text" class="form-control" id="staff" name="staff" value="<?php if(isset($row['staff'])) { echo $row['staff']; } ?>">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Requested By</label>
        <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">requster staff</label>
        <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>">
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Mobile</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>"
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="assigntech">Assign  Technician name </label>
        <input type="text" class="form-control" id="assigntech" name="assigntech" pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed">
      </div>
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate">
      </div>
    </div>
	<div class="form-group col-md-15">
        <label for="comment">comments</label>
        <input type="text" class="form-control" id="comment" name="comment" placeholder="please, does not accept work, name and their  comments">
      </div>
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="yes">Yes</button>
      <button type="submit" class="btn btn-success" name="no">No</button>
	  <button type="reset" class="btn btn-secondary">Reset</button>

    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>