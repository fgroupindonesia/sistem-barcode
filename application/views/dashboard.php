<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Barcode - Dashboard</title>
 
  <!-- inject:css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
         
         
          <li class="nav-item dropdown">
		  
            <a class="nav-link dropdown-toggle nav-profile" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
			  <img src="images/faces/<?=$this->session->userdata('avatar');?>" class="propic" alt="image">
			  <span class="d-none d-lg-inline"> <?= $nama_lengkap; ?> </span>
			  </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="/settings">Settings</a></li>
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
      <div class="row row-offcanvas row-offcanvas-left">
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
		  
 <?php if ($this->akses->isAdmin()): ?>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Customer Terbaru</h4>
				   <?php if (!empty($customers)): ?>
				   <?php $customerTerakhir = count($customers); ?>
                   <h2 class="font-weight-normal mb-5"><?= $customers[$customerTerakhir-1]->nama; ?></h2>
                  <p class="card-text">Alamat : <?= $customers[$customerTerakhir-1]->alamat; ?></p>
				   <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Users Terbaru</h4>
				  <?php if (!empty($users)): ?>
				   <?php $userTerakhir = count($users); ?>
                 <h2 class="font-weight-normal mb-5"><?= $users[$userTerakhir-1]->nama_lengkap; ?></h2>
                  <p class="card-text">Dibuat Pada : <?= $this->indonesian_calendar->konversiDate($users[$userTerakhir-1]->created_date); ?></p>
				   <?php endif; ?>
                </div>
              </div>
            </div> 

 <?php endif; ?>
 
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Box Terkini</h4>
				   <?php if (!empty($boxes)): ?>
				   <?php $boxTerakhir = count($boxes); ?>
                  <h2 class="font-weight-normal mb-5"><?= $boxes[$boxTerakhir-1]->barcode; ?></h2>
                  <p class="card-text">Last Update: <?= $this->indonesian_calendar->konversiDate($boxes[$boxTerakhir-1]->last_update); ?></p>
				   <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          
         
		<?php if ($this->akses->isAdmin()): ?>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Users</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            #
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
                       <!-- sample data layout
					   <tr>
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
						-- sample data layout -->
						
						<?php if (!empty($users)): ?>
						<?php $nomerUser = 1; ?>
						<?php foreach ($users as $data_user): ?>
							
							 <tr class="data-row" data-state="" data-id="<?= $data_user->id; ?>">
                          <td>
                            <?= $nomerUser; ?>
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
						<?php $nomerUser++ ?>	
						<?php endforeach; ?>
					
						<?php else: ?>
							<p>No Data found!</p>
						<?php endif; ?>
						
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Costumer</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nama Custumer
                          </th>
                          
                          <th>
                            Alamat
                          </th>
                          <th>
                            No Telepon
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($customers)): ?>
					<?php $nomerCustomer = 1; ?>
						<?php foreach ($customers as $data_customer): ?>
							
							 <tr class="data-row" data-state="" data-id="<?= $data_customer->id; ?>">
                          <td>
                            <?= $nomerCustomer; ?>
                          </td>
                          <td>
                           <?= $data_customer->nama; ?>
                          </td>
                           <td>
                           <?= $data_customer->alamat; ?>
                          </td>
                          
                          <td>
                            <?= $data_customer->no_telepon; ?>
                          </td>
                          
                        </tr>
						<?php $nomerCustomer++ ?>	
						<?php endforeach; ?>
					
						<?php else: ?>
							<p>No Data found!</p>
						<?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
 <?php endif; ?>
 
		   <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Box</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Barcode
                          </th>
                          <th>
                            Quantity Stock
                          </th>
                          <th>
                            Last Update
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($boxes)): ?>
					<?php $nomerBox = 1; ?>
						<?php foreach ($boxes as $data_box): ?>
							
							 <tr class="data-row" data-state="" data-id="<?= $data_box->id; ?>">
                          <td>
                            <?= $nomerBox; ?>
                          </td>
                          <td>
                           <?= $data_box->barcode; ?>
                          </td>
                           <td>
                           <?= $data_box->quantity_stock; ?>
                          </td>
                          
                          <td>
                            <?= $this->indonesian_calendar->konversiDate($data_box->last_update); ?>
                          </td>
                          
                        </tr>
							<?php $nomerBox++ ?>
						<?php endforeach; ?>
					
						<?php else: ?>
							<p>No Data found!</p>
						<?php endif; ?>
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
  <script src="js/bootstrap.bundle.min.js"></script>
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
  <!-- End custom js for this page-->
</body>

</html>
