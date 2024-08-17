<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="images/A.png">
  <title>IES </title>
</head>

<body>
  <!-- Start Navigation -->
  <nav style=background-color:blue class="navbar navbar-expand-sm navbar-dark   pl-4 fixed-top ">
  <img src='images/A.png' width='50'/>
    <span class="navbar-text">online service Request Manegment system</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu" >
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">account</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
		

      </ul>
  
	              
	  </div>
	 </nav> <!-- End Navigation -->

  <header class="jumbotron back-image" style="background-image: url(images/ieso.jpg);">
    <div class="myclass mainHeading">
      <h1 style="color:green;"class="text-uppercase ">Welcome TO IES </h1>
      <p class="font-italic">standardization and quality control activities</p>
      <a href="Requester/RequesterLogin.php" style=margin:15px class="btn btn-success mr-4">Login</a>
      <a style=background-color:GRAY href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header> <!-- End Header Jumbotron -->

  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">IES Services</h3>
      <p>
        IES Services is Ethiopian’s leading chain of multi-brand standared service workshops offering
        wide ares of services. We focus on enhancing your uses experience by offering world-class
        sandared maintenance services/producte. Our sole mission is “to promote standardization and quality control activities in the national economy”
        With Technological Support and fully trained mechanics, and we
        provide quality services with excellent packages that are designed to offer you great savings.
        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book your service request online by doing Registration.
      </p>

    </div>
  </div>


  <!-- Start Registration  -->
  <div class="container" id="registrations">
  <?php include('userRegistration.php') ?>
  </div>
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact Us</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong>Head IES:</strong> <br>
        IES  <br>
       Megenagna,AddisAbaba, Ethiopia <br>
        Phone: + 251 116 460111 <br>
        <a href="#" target="_blank">info@ethiostandards.org</a> <br>

        <br><br>
        <strong>apparent student (HU):</strong> <br>
        Desalegn , <br>

        A.A ,Amche(Megenagna)  <br>
        Phone: +251961787618<br>
        <a href="#" target="_blank">ies.org.et</a> <br>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->
  
  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
  
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->
		
        <div class="col-md-5 text-right">
     <small>
	 <a style="color:white;" href="Admin/login.php"class="ml-2">Director of Requester </a>
       <a style="color:white;" href="director of technician/techlogin.php"class="ml-2"> Director of Technician</a> 
       <a style="color:white;" href="technician/techlogin.php"class="ml-2">Technician </a></small><br><br>
          <!-- Start Footer 2nd Column -->
          <small> Designed by  Desalegn; 2023 .
          </small>
           
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>