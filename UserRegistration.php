<?php
  include('dbConnection.php');

  if(isset($_REQUEST['rSignup'])){
    // Checking for Empty Fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")|| ($_REQUEST['rstaff'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
		$rstaff = $_REQUEST['rstaff'];

        $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password,staff) VALUES ('$rName','$rEmail', '$rPassword','$rstaff')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
  }
?>
<div class="container pt-5" id="registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><input type="text"
            class="form-control" placeholder="Name" name="rName">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="rEmail">
          <!--Add text-white below if want text color white-->
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">New
            Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
        </div>
		<div class="form-group">
          <i class="fas fa-user"></i><label for="pass" class="pl-2 font-weight-bold">
            Staff</label>
			<select name='rstaff' placeholder="your Staff" class="form-control" size="2">
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
        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
          Policy and Cookie Policy.</em>
        <?php if(isset($regmsg)) {echo $regmsg; } ?>
      </form>
    </div>
  </div>
</div>