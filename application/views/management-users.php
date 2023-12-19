<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Barcode - Management Users</title>
 
  <!-- inject:css -->
  <link rel="stylesheet" href="css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo-caturindo.png" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <?php include('nav-logo.php'); ?>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field ml-4 d-none d-md-block">
          <form class="d-flex align-items-stretch h-100" action="#">
            <div class="input-group">
              <input id="search-box" data-management="users" type="text" class="form-control bg-transparent border-0" placeholder="Search">
             
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          
          <li class="nav-item dropdown">
		  
            <a class="nav-link dropdown-toggle nav-profile" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
			  <img src="images/faces/<?= $this->session->userdata('avatar'); ?>" class="propic" alt="image">
			  <span class="d-none d-lg-inline"> <?= $this->session->userdata('nama_lengkap'); ?> </span>
			  </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="#">Settings</a></li>
                 <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
			
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
       <?php include('nav-bar.php'); ?>
	   
        <!-- partial -->
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="marquee-container d-flex alifn-items-center">
                <?php include('info-bar.php'); ?>
                <i class="mdi mdi-close popup-dismiss"></i>
              </span>
            </div>
          </div>
         
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
             <button id="btn-add" data-management="users" type="button" class="btn btn-primary">
			 <span class="btn__txt">Add New</span>
			</button>

			<button id="btn-edit" data-management="users" type="button" class="btn btn-primary">
				<span class="btn__txt">Edit</span>
			</button>

			<button id="btn-delete" data-management="users" type="button" class="btn btn-primary">
				<span class="btn__txt">Delete</span>
			</button>

			<button id="btn-refresh" type="button" class="btn btn-info">
				<span class="btn__txt">Refresh</span>
			</button>
            </div>
          </div>
        
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Users</h4>
                  <div class="table-responsive table-hover">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Lengkap
                          </th>
                          <th>
                            Last Username
                          </th>
                          <th>
                            Jabatan
                          </th>
                          <th>
                            No Telepon
                          </th>
                          <th>
                            Created at
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  // for sorting purposes
					  $nomer = 1;
					  ?>
					  
					  <?php if (!empty($entries)): ?>
					
						<?php foreach ($entries as $data_user): ?>
							
							 <tr class="data-row" data-state="" data-id="<?= $data_user->id; ?>">
                          <td>
                            <?= $nomer; ?>
                          </td>
                          <td>
                           <?= $data_user->nama_lengkap; ?>
                          </td>
                          <td class="py-1">
                            <img src="images/faces/<?= $data_user->avatar;?>" class="mr-2" alt="image">
                            <?= $data_user->username; ?>
                          </td>
                          <td>
						  <!-- <label class="badge badge-gradient-warning">Leader</label> -->
						  <!--   <label class="badge badge-gradient-secondary">IT Pemrograman</label> -->
						   <?php if ($data_user->user_type == 'admin'): ?>
                            <label class="badge badge-gradient-success"><?= $data_user->user_type; ?></label>
							<?php elseif($data_user->user_type == 'staff'): ?>
							<label class="badge badge-gradient-secondary"><?= $data_user->user_type; ?></label>
							<?php endif; ?>
                          </td>
                          <td>
                            <?= $data_user->no_telepon; ?>
                          </td>
                          <td>
                            <?= $this->indonesian_calendar->konversiDate($data_user->created_date); ?>
                          </td>
                         
                        </tr>
						<?php $nomer++; ?>	
						<?php endforeach; ?>
					
				<?php else: ?>
					<p>No Data found!</p>
				<?php endif; ?>
					  
					  <!-- sample data layout
                        <tr class="data-row" data-state="" data-id="5">
                          <td>
                            5669
                          </td>
                          <td>
                            Wahyu Triningsih
                          </td>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" class="mr-2" alt="image">
                            Wahyu76
                          </td>
                          <td>
                            <label class="badge badge-gradient-success">Kepala Bagian</label>
                          </td>
                          <td>
                            087876454323
                          </td>
                          <td>
                            12 Desember2023
                          </td>
                         
                        </tr> 
						sample data layout -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">PT. Caturindo Agung Jaya Rubber </a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Visi: Become a leading rubber product manufacturer in terms of quality. <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="js/chart.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
   <script src="js/db-ops.js"></script> 
   <script src="js/table-search.js"></script>
   <script src="js/ui-helper.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
