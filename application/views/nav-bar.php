 <?php $percent_user = 0;
				$percent_customer = 0;
				$percent_box = 0;
				
				if($this->session->userdata('total_user') != 0){
					$percent_user = 100/$this->session->userdata('total_user');
				}

				if($this->session->userdata('total_customer') != 0){
					$percent_customer = 100/$this->session->userdata('total_customer');
				}
				
				if($this->session->userdata('total_box') != 0){
					$percent_box = 100/$this->session->userdata('total_box');
				}
?>

 <?php if ($this->akses->isAdmin()): ?>

 <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <span class="menu-sub-title"> - </span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="/management-users" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Management Users</span>
               
              </a>
             
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/management-box">
                <span class="menu-title">Management Box</span>
             
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/management-customers">
                <span class="menu-title">Management Customers</span>
              
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="/management-info">
                <span class="menu-title">Management Info</span>
               
              </a>
            </li>
 
          </ul>
		  
          <div class="sidebar-progress">
            <p>Total Users</p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?= $percent_user; ?>%" aria-valuenow="<?= $percent_user; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p><?= $this->session->userdata('total_user'); ?> Data Users Terbaru</p>
          </div>
          <div class="sidebar-progress">
            <p>Total Customer</p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: <?= $percent_customer; ?>%" aria-valuenow="<?= $percent_customer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p><?= $this->session->userdata('total_customer'); ?>  Data Costumer</p>
          </div>
		  <div class="sidebar-progress">
            <p>Total Box</p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?= $percent_box; ?>%" aria-valuenow="<?= $percent_box; ?>" aria-valuemin="0" aria-valuemax="50"></div>
            </div>
            <p><?= $this->session->userdata('total_box'); ?>  Data Box</p>
          </div>
          <div class="wrapper upgrade-button">
            <a href="https://wa.link/08jw1g" target="_blank" class="btn btn-lg btn-block purchase-button">Kendala? Hubungi Admin</a>
          </div>
        </nav>
<?php elseif ($this->akses->isStaff()):  ?>
					<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <span class="menu-sub-title"> - </span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="/management-box">
                <span class="menu-title">Management Box</span>
             
              </a>
            </li>
            
 
          </ul>
         
         
		  <div class="sidebar-progress">
            <p>Total Box</p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?= $percent_box; ?>%" aria-valuenow="<?= $percent_box; ?>" aria-valuemin="0" aria-valuemax="50"></div>
            </div>
            <p><?= $this->session->userdata('total_box'); ?>  Data Box</p>
          </div>
          <div class="wrapper upgrade-button">
            <a href="https://wa.link/08jw1g" target="_blank" class="btn btn-lg btn-block purchase-button">Kendala? Hubungi Admin</a>
          </div>
        </nav>
<?php endif; ?>