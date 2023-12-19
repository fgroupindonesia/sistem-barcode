<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Barcode - Management Info</title>
 
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo-caturindo.png" />
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
			  <img src="/images/faces/<?= $this->session->userdata('avatar'); ?>" class="propic" alt="image">
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
            <div class="col-12 grid-margin">
             <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Data Info</h4>
                      <p class="card-description">
                        Pengisian
                      </p>
                      <form class="forms-sample needs-validation" action="/info/add" method="post" >
					 
					  <div class="form-group">
                          <label class="form-label" for="berita">Berita</label>
                          <input type="text" class="form-control" id="berita" name="berita" placeholder="isi berita anda disini." required>
						   <div class="invalid-feedback">
							Tuliskan Berita dengan jelas dan padat!
						  </div>
                       </div>
					   
					   <div class="form-group">
                          <label for="started_date">Started Date</label>
                          <input name="started_date" data-date-format="dd-MM-yyyy" type="text" value="" class="form-control" id="started_date" placeholder="pilih tanggal bermula">
                       </div>
 
						<div class="form-group">
                          <label for="ended_date">Ended Date</label>
                          <input name="ended_date"  type="text" value="" class="form-control" id="ended_date" placeholder="pilih tanggal berakhir">
                       </div>
					   
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <input type="button" data-management="boxes" id="btn-cancel" class="btn btn-light" value="Cancel">
                      </form>
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
  <script src="/js/jquery.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/js/chart.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/js/off-canvas.js"></script>
  <script src="/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/js/dashboard.js"></script>
   <script src="/js/db-ops.js"></script>
   <script src="/js/bootstrap-datepicker.min.js"></script>
	<script src="/js/bootstrap-datepicker.id.min.js"></script>

   <script src="/js/custom-date.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
