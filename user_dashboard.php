<?php
	include_once("includes/config.php");
	include_once("includes/header.php");
?>

  <body id="page-top">
	<?php include("includes/navbar.php"); ?>
    <div id="wrapper">

     	<?php 
		include_once("includes/user_sidebar.php"); 
		$uid=$_SESSION['uid'];?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">User / Ticket Booking</li>
			<p class="breadcrumb-item" style="float:right;margin-left: 50%;margin-bottom: 0px;">Welcome <b><?php echo $uid=$_SESSION['uname'];?></b></p>
          </ol>

          <!-- Icon Cards-->
          <div class="card card-register mx-auto mt-5">
        <div class="card-header">Ticketing Boooking</div>
        <div class="card-body">
          <form name="booking" method="post" action="">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">  
					<label for="firstName">Passenger name</label>				
					<input type="text" name="pass_name" class="form-control" placeholder="Passenger name" required>         
                  
                </div>
                <div class="col-md-6">
					 <label for="lastName">Passenger ID Number</label>
                    <input type="text" id="pass_id_proof" class="form-control" name="pass_id_proof" placeholder="Enter ID Number" required="required">
                </div>
              </div>
            </div>
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">  
					<label for="firstName">Age</label>				
					<input type="text" name="age" class="form-control" placeholder="Passenger Age" required>         
                  
                </div>
                <div class="col-md-6">
					 <label for="lastName">Booked By</label>
                    <input type="text" id="book_by" class="form-control" name="book_by" placeholder="" required="required">
                </div>
              </div>
            </div>
            <div class="form-group">
				<label for="inputEmail">From Address</label>
                <textarea id="" name="from_address" class="form-control" placeholder="Enter From Address" required="required"></textarea>
			</div>
			 <div class="form-group">
				<label for="inputEmail">To Address</label>
                <textarea id="" name="to_address" class="form-control" placeholder="Enter To Address" required="required"></textarea>
             </div>
			
            <div class="form-group">
              <div class="form-row">                
                <div class="col-md-6">
                   <label for="confirmPassword">Number of Tickets</label>
                    <input type="text" id="no_ticket" name="no_ticket" class="form-control" placeholder="Enter no of tickets" required="required">
                   
                
                </div>
				<div class="col-md-6">
                   <label for="inputPassword">Mobile</label>
                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Enter Mobile number" required="required">
				</div>
              </div>
            </div>
           <button type='submit' name='submit' class='btn btn-primary'> Book Tickets</button>	
          </form>
        
        </div>
      </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
	<?php
		include_once("includes/footer.php");
	?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
<?php
	if(isset($_POST['submit']))
	{
		$uid= $_SESSION['uid'];
		$pass_name = $_POST['pass_name'];
		$pass_id_proof = $_POST['pass_id_proof'];
		$age = $_POST['age'];
		$book_by = $_POST['book_by'];
		$from_address = $_POST['from_address'];
		$to_address = $_POST['to_address'];
		$no_ticket = $_POST['no_ticket'];		
		$mobile = $_POST['mobile'];		

		//move_uploaded_file($_FILES['pimg']['tmp_name'],"upload/$pimg");

		 mysql_query("insert into ticket_booking(pass_name,pass_id_proof,age,book_by,from_address,to_address,no_tickets,ticket_amount,mobile,status,user_id)values('$pass_name','$pass_id_proof','$age','$book_by','$from_address','$to_address','$no_ticket','','$mobile','Waiting','$uid')");
		
		//echo "insert into ticket_booking(pass_name,pass_id_proof,age,book_by,from_address,to_address,no_tickets,ticket_amount,mobile,status,user_id)values('$pass_name','$pass_id_proof','$age','$book_by','$from_address','$to_address','$no_ticket','','$mobile','Waiting','$uid')";	exit;
		
		echo "<script type='text/javascript'>alert('Ticket Booked Successfully and Waiting Payment');</script>";
		echo '<meta http-equiv="refresh" content="0;url=ticket_status.php">';

	}
?>

  </body>

</html>
