<?php
	include_once("includes/config.php");
	include_once("includes/header.php");
?>
<style>
tr {
    font-size: 12px;
}
input.btn.btn-danger {
    background: #007bff;
    border: none;
    font-size: 13px;
}
</style>
  <body id="page-top">
	<?php include("includes/navbar.php"); ?>
    <div id="wrapper">
     	<?php include_once("includes/admin_sidebar.php"); ?>

      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Admin / Paid Details</li>
			 <p class="breadcrumb-item" style="float:right;margin-left: 50%;margin-bottom: 0px;">Welcome <b><?php echo $uid=$_SESSION['aname'];?></b></p>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Paid Details</div>
            <div class="card-body">
              <div class="table-responsive">
			 <?php
				$q=mysql_query("SELECT b.book_id, b.pass_name, b.age, b.pass_id_proof, b.from_address, b.to_address, b.no_tickets,b.ticket_amount, a.pay_type , a.status FROM `ticket_payment` a left join ticket_booking b ON b.book_id=a.book_id where a.status='Paid' order by book_id desc");
				$c=mysql_num_rows($q);
			?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="background: #dc3545;color: #fff;">Booked_Id</th>
                      <th style="background: #dc3545;color: #fff;">Passenger Name</th>                     
                      <th style="background: #dc3545;color: #fff;">Age</th>                     
                      <th style="background: #dc3545;color: #fff;">From Location</th>
                      <th style="background: #dc3545;color: #fff;">To Location</th>
                      <th style="background: #dc3545;color: #fff;">Pay Type</th>
                      <th style="background: #dc3545;color: #fff;">No. of Tickets</th>  
                      <th style="background: #dc3545;color: #fff;">Total Amount</th>  
                      <th style="background: #dc3545;color: #fff;">Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style="background: #dc3545;color: #fff;">Booked_Id</th>
                      <th style="background: #dc3545;color: #fff;">Passenger Name</th>                     
                      <th style="background: #dc3545;color: #fff;">Age</th>                     
                      <th style="background: #dc3545;color: #fff;">From Location</th>
                      <th style="background: #dc3545;color: #fff;">To Location</th>
                      <th style="background: #dc3545;color: #fff;">Pay Type</th>
                      <th style="background: #dc3545;color: #fff;">No. of Tickets</th>  
                      <th style="background: #dc3545;color: #fff;">Total Amount</th>  
                      <th style="background: #dc3545;color: #fff;">Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php
						while($r=mysql_fetch_array($q))
						{		
							$book_id = $r['book_id'];
							$pass_name = $r['pass_name'];
							$pass_id_proof = $r['pass_id_proof'];
							$age = $r['age'];
							$book_by = $r['book_by'];
							$from_address = $r['from_address'];
							$to_address = $r['to_address'];
							$no_tickets = $r['no_tickets'];		
							$mobile = $r['mobile'];	
							$status = $r['status'];											
							$pay_type = $r['pay_type'];											
							$ticket_amount = $r['ticket_amount'];											
												
							echo "<tr>
									<td>$book_id</td>
									<td>$pass_name</td>	
									<td>$age</td>	
									<td>$from_address</td>
									<td>$to_address</td>
									<td>$pay_type</td>
									<td>$no_tickets</td>
									<td>$ticket_amount</td>
									<td><b>$status</b></td>																		
								</tr>";
						}
						
					?>
				  
				                    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
	<script src="js/demo/datatables-demo.js"></script>
    <script src="js/sb-admin.min.js"></script>
<?php
if(isset($_POST['submit'])){
	$book_id = $_POST['book_id'];		
	mysql_query("update ticket_booking SET status='Waiting for Payment' where book_id = '$book_id'");
	echo "<script type='text/javascript'>alert('Send for Payment Successfully');</script>";
	echo '<meta http-equiv="refresh" content="0;url=admin_ticket_payment.php">';                                      
}
?>

  </body>

</html>
