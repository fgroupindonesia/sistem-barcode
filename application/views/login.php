<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Barcode</title>
 
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="/css/style-login.css">
  <link rel="shortcut icon" href="/images/logo-caturindo.png" />
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
  <!-- endinject -->
    <script src="/js/jquery.min.js" > </script>
  <script src="/js/anim-login.js" > </script>
    
</head>
<body>
	

	<center>

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
					<div class="upper-section"> 
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
					</div>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
										<form action="verify-login" method="post" >
											<h4 class="mb-4 pb-3">Log In</h4>
											<?php
											 $stat = $this->session->flashdata('status');
											 if($stat == 'error'){
											 //$el = "<span class='error'> Error, invalid Email or Password! " . $stat . "</span>";
											 $el = "<span class='error'>Error, invalid Login!</span>";
												} else if ($stat == 'no access') {
												$el = "<span class='error'>No Access! Login First!</span>";
												}else if ($stat == 'register success') {
												$el = "<span class='error'>Success Registered! Now Login!</span>";
												}else {
												$el = "";
												}
											?>
											<?= $el ;?>
											<div class="form-group">
												<input type="email" name="email" class="form-style" placeholder="Emailmu" id="email" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="pass" class="form-style" placeholder="Passwordmu" id="pass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" class="submit-button btn mt-4">submit</button>
                            				<p class="mb-0 mt-4 text-center"><a href="https://wa.link/08jw1g" class="link">Forgot your password?</a></p>
										</form>
										</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
										<form action="register" method="post" >
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" name="nama_lengkap" class="form-style" placeholder="Nama Lengkapmu" id="nama_lengkap" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="email" class="form-style" placeholder="Emailmu"  autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="pass" class="form-style" placeholder="Passwordmu"  autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" class="submit-button btn mt-4">submit</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
	
	</center>
	
	</body>
	</html>