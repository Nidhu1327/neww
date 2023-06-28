<?php
	include_once("includes/config.php");
	include_once("includes/header.php");
?>

  <body id="page-top">

	<?php include("includes/navbar.php"); ?>
    <div id="wrapper">
     	<?php include_once("includes/user_sidebar.php"); ?>
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Ticket Payment</li>
          </ol>

          <!-- Icon Cards-->
          <div class="card card-register mx-auto mt-5">
        <div class="card-header">Ticketing Payment</div>
        <div class="card-body">
          <form name="booking" method="post" action="">
			<?php
			  $uid=$_SESSION['uid'];
			  $pid=$_GET['pid'];
			  $pass_name=$_GET['pass_name'];
			  $no_tickets=$_GET['no_tickets'];
			  $amount=$_GET['amount'];
			  $total_amount = $no_tickets * $amount;
			  $q=mysql_query("select * from ticket_booking where book_id='$pid'");
				while($r=mysql_fetch_array($q))
				{	
				
			
			?>
		  
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">  
					<label for="firstName">Passenger name</label>				
					<input type="text" name="pass_name" class="form-control" value="<?php echo $pass_name; ?>">         
                  
                </div>
                <div class="col-md-6">
					 <label for="lastName">No of Tickets</label>
                    <input type="text" id="no_tickets" class="form-control" name="no_tickets" value="<?php echo $no_tickets;?>">
                </div>
              </div>
            </div>
			<div class="form-group">
              <div class="form-row">
			  <div class="col-md-6">
					 <label for="lastName">Total Amount</label>
                    <input type="text" id="total_amount" class="form-control" name="total_amount" value ="<?php echo $total_amount; ?>">
                </div>
                <div class="col-md-6">  
					<label for="firstName">Payment Type</label>	<br>					
					<label class="radio-inline"><input type="radio" name="paytype" value="Online" checked> &nbsp;&nbsp;&nbsp; Online</label>
					<label class="radio-inline"><input type="radio" name="paytype" value="Offline">&nbsp;&nbsp;&nbsp;Offline</label>					
									  
                </div>
                
              </div>
            </div>
            <div class="form-group">
				<label for="inputEmail">Credit/Debit Card Details</label>
                <input type="text" id="card_no" class="form-control" name="card_no" maxlength="15" placeholder="Enter Card Number" required="required">
			</div>
			 <div class="form-group">
				<label for="inputEmail"> Pin Number</label>
               <input type="password" id="pin_number" class="form-control" name="pin_number" placeholder="Enter Card Pin Number" required="required">
             </div>
			<?php
				}
			?>
           <button type='submit' name='submit' class='btn btn-primary'> Go Payment</button>	
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
		//$pass_name = $_POST['pass_name'];				
		$no_tickets = $_POST['no_tickets'];		
		$total_amount = $_POST['total_amount'];		
		$paytype = $_POST['paytype'];		
		$card_no = $_POST['card_no'];		
		$pin_number = $_POST['pin_number'];		
				
		 mysql_query("insert into ticket_payment(no_tickets,amount,pay_type,card_no,pin_number,user_id,book_id,status)values('$no_tickets','$total_amount','$paytype','$card_no','$pin_number','$uid','$pid','Paid')");
		 
		mysql_query("update  ticket_booking SET status='Confirmed' where book_id = '$pid'");
		
		echo "<script type='text/javascript'>alert('Payment Paid Successfully');</script>";
		echo '<meta http-equiv="refresh" content="0;url=ticket_payment.php">';

	}
?>

  </body>

</html>
