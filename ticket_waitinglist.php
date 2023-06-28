<?php
	include_once("includes/config.php");
	include_once("includes/header.php");
?>
<style>
tr {
    font-size: 12px;
}
</style>
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
            <li class="breadcrumb-item active">Overall Waiting List</li>
			<p class="breadcrumb-item" style="float:right;margin-left: 50%;margin-bottom: 0px;">Welcome <b><?php echo $uid=$_SESSION['uname'];?></b></p>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Titcket Status</div>
            <div class="card-body">
              <div class="table-responsive">
			 <?php
				$q=mysql_query("select * from ticket_booking where status = 'Waiting' order by book_id desc");
				$c=mysql_num_rows($q);
			?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="background: #dc3545;color: #fff;">Booked_Id</th>
                      <th style="background: #dc3545;color: #fff;">Passenger Name</th>
                      <th style="background: #dc3545;color: #fff;">From Location</th>
                      <th style="background: #dc3545;color: #fff;">To Location</th>
                      <th style="background: #dc3545;color: #fff;">No. of Tickets</th>
                      <th style="background: #dc3545;color: #fff;">Status</th>
                    </tr>
                  </thead>
                  <!--<tfoot>
                    <tr>
                      <th style="background: #dc3545;color: #fff;">Booked_Id</th>
                      <th style="background: #dc3545;color: #fff;">Passenger Name</th>
                      <th style="background: #dc3545;color: #fff;">From Location</th>
                      <th style="background: #dc3545;color: #fff;">To Location</th>
                      <th style="background: #dc3545;color: #fff;">No. of Tickets</th>
                      <th style="background: #dc3545;color: #fff;">Status</th>
                    </tr>
                  </tfoot>-->
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
												
							echo "<tr>
									<td>$book_id</td>
									<td>$pass_name</td>	
									<td>$from_address</td>
									<td>$to_address</td>
									<td>$no_tickets</td>
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


  </body>

</html>
