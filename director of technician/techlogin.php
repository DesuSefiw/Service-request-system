<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_atechlogin'])){
  if(isset($_REQUEST['tEmail'])){
    $tEmail = mysqli_real_escape_string($conn,trim($_REQUEST['tEmail']));
    $tPassword = mysqli_real_escape_string($conn,trim($_REQUEST['tPassword']));
	    $tstaff = mysqli_real_escape_string($conn,trim($_REQUEST['tstaff']));
    $sql = "SELECT email, password ,staff FROM techlogin WHERE email='".$tEmail."' AND password='".$tPassword."'AND staff='".$tstaff."' limit 1";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
      $_SESSION['is_atechlogin'] = true;
      $_SESSION['tEmail'] = $tEmail;
	  $_SESSION['tstaff'] = $tstaff;

      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='dashboard.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} else {
  echo "<script> location.href='dashboard.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">

  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
  <title>Login</title>
</head>

<body>
  <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online service  request Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span>Directory of technician
      </span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="tEmail">
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
		  <div class="form-group">
            <i class="fas fa-user"></i><label for="tstaff" class="pl-2 font-weight-bold">Staff</label>
             <select  class="form-control" placeholder="staff" name="tstaff" size="1">
	     
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
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name="tPassword">
          </div>
          <button type="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <div class="text-center"><a style=background-color:gray; class="btn btn-info font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>