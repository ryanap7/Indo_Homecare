<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="main-sidebar sidebar-style-2">
		<aside id="sidebar-wrapper">
			<div class="sidebar-brand">
				<a href="<?php echo base_url(); ?>dist/index">Stisla</a>
			</div>
			<div class="sidebar-brand sidebar-brand-sm">
				<a href="<?php echo base_url(); ?>dist/index">St</a>
			</div>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?php echo $this->uri->segment(2) == 'credits' ? 'active' : ''; ?>">
					<a class="nav-link" href="#">
						<i class="fas fa-fire"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				
				<li class="menu-header">Membership</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fa fa-edit"></i> 
						<span>Registration</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Member Data</span></a>
					<ul class="dropdown-menu">
						<li class="">
							<a class="nav-link" href="#">Member</a>
						</li>
						<li class="">
							<a class="nav-link" href="">Non Member</a>
						</li>
					</ul>
				</li>
			
				<li class="menu-header">Master Data</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-running"></i> 
						<span>Trainer</span>
					</a>
				</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-door-open"></i> 
						<span>Class</span>
					</a>
				</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-users"></i> 
						<span>Member Type</span>
					</a>
				</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-money-check-alt"></i> 
						<span>Payment Type</span>
					</a>
				</li>

				<li class="menu-header">Transaction</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-running"></i> 
						<span>Transaction</span>
					</a>
				</li>
			</ul>
        </aside>
      </div>
