<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
 $rstaff=$_SESSION['rstaff'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "")|| ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['date'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestinfo'];
   $file =$_FILES['attached']['name'];
   $rdesc = $_REQUEST['requestdesc'];
   $staff = $_REQUEST['staff'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['requesteradd1'];
   $rcity = $_REQUEST['requestercity'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['date'];
   if(($_REQUEST['requestercity'] =="$rstaff")&&($_REQUEST['staff']!="$rstaff"))
   {
   $sql = "INSERT INTO submitrequest_tb(request_info,attech_doc, request_desc, requester_name,staff ,requester_add1, requester_city, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$file','$rdesc', '$rname','$staff', '$radd1', '$rcity', '$remail', '$rmobile', '$rdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your' . $genid .' </div>';
    session_start();

    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'; </script>";
    // include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
   }else
   {
	       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">  please,chacke your Staff correctly select !!! </div>';

   }
   
 
 }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo" pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed">
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed">
    </div>
	 <div class="form-group">
      <label for="inputRequestDoc">Attached doc</label>
      <input type="file" class="form-control" id="attach"  name="attached">
    </div>
	<div class="form-group">
      <label for="inputRequestdepart">TO(Staff)</label>
      <select name='staff' size="1">
	     
	   <option>  Director General     </option>
		 <option>  Office Head     </option>
		 <option>  Deputy Director General     </option>
	   <option>
	      Legal and International Relation Service
	</option><option>  Procurement and Finance     </option>
	<option>
	     Competency and Human Resource Administration
	</option> <option> Training and Technical Support  </option>
	<option>
	      Cleaner Production
	</option> <option> Standards Development      </option>
	   <option>
      Scheme and Standard Mark Administration
	</option></option> Reaserch and Development     </option>
	<option>
	     Public Relation and Communication 
	</option><option> Internal Audit      </option>
	<option>
	     Women,Children and Youth Inclusive Implementation 
	</option><option>Strategic Affairs       </option>
		<option>Project Management,Cooperation and Fund Raising       </option>
      		<option>Information Communication Technology      </option>
		<option>Basic Service       </option>
		<option>Facility and Reception </option>
    <option> Institutional Transformaton </option>
	  </select>
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName"pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed" placeholder="your Name" name="requestername">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">office .No</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="requset address" name="requesteradd1">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">your staff</label>
        <select name='requestercity' size="1">
	     
	   <option>  Director General     </option>
		 <option>  Office Head     </option>
		 <option>  Deputy Director General     </option>
	   <option>
	      Legal and International Relation Service
	</option><option>  Procurement and Finance     </option>
	<option>
	     Competency and Human Resource Administration
	</option> <option> Training and Technical Support  </option>
	<option>
	      Cleaner Production
	</option> <option> Standards Development      </option>
	   <option>
      Scheme and Standard Mark Administration
	</option></option> Reaserch and Development     </option>
	<option>
	     Public Relation and Communication 
	</option><option> Internal Audit      </option>
	<option>
	     Women,Children and Youth Inclusive Implementation 
	</option><option>Strategic Affairs       </option>
		<option>Project Management,Cooperation and Fund Raising       </option>
      		<option>Information Communication Technology      </option>
		<option>Basic Service       </option>
		<option>Facility and Reception </option>
    <option> Institutional Transformaton </option>
	  </select>
      </div>
	  
	   </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile"  pattern="09\d{8}" title="Please enter a phone number starting with 09 and consisting of 10 digits" required onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-2">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" min="" max=""id="date" name="date">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
</div>

<script>
        // Get today's date
        var today = new Date().toISOString().split('T')[0];

        // Calculate one month from today
        var oneMonthLater = new Date();
        oneMonthLater.setMonth(oneMonthLater.getMonth() + 1);
        var maxDate = oneMonthLater.toISOString().split('T')[0];
        
        // Set the min and max attributes of the date input field
        document.getElementById('date').setAttribute("min", today);
        document.getElementById('date').setAttribute("max", maxDate);
    </script>
</script>
<?php
include('includes/footer.php'); 
$conn->close();
?>