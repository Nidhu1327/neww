<?php
	include "includes/config.php";
	include "includes/header.php";
?>
 <body id="page-top">
   <?php
		include_once("includes/login_nav.php");
	?>
    <div id="wrapper">
    <div class = "container">
	<div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an User</div>
        <div class="card-body">
           <form name="register" method="post" action="">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="user_name" class="form-control" name="user_name" placeholder="Enter Username" required="required" autofocus="autofocus">
                    <label for="firstName">User Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="passwd" class="form-control" name="pass" placeholder="Enter Password" required="required">
                    <label for="lastName">Password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="mail" name="mail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
			<div class="form-group">
              <div class="form-label-group">
                <textarea id="address" class="form-control" placeholder="Enter address" name="address" required="required"></textarea>
                <label for="address"></label>
              </div>
            </div>
			
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="mobile" required="required">
                    <label for="mobile">Mobile Number</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="city" name="city" class="form-control" placeholder="Entery City Name" required="required">
                    <label for="city">City Name</label>
                  </div>
                </div>
              </div>
            </div>			
            
			<button type='submit' name='submit' class='btn btn-primary'> Register</button>	
          </form>
          
        </div>
      </div>
</div>

    </div>
    <!-- /#wrapper -->

  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
	if(isset($_POST['submit']))
	{
		$user_name = $_POST['user_name'];
		$passwd = $_POST['pass'];
		$email = $_POST['mail'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];		
		$city = $_POST['city'];		

		//move_uploaded_file($_FILES['pimg']['tmp_name'],"upload/$pimg");

		mysql_query("insert into user(uname,upass,uemail,umobile,uaddress,city,status)values('$user_name','$passwd','$email','$mobile','$address','$city','Pending')");
		echo "<script type='text/javascript'>alert('New User Registered Successfull');</script>";
		echo '<meta http-equiv="refresh" content="0;url=index.php">';

	}
?>
  </body>

</html>
