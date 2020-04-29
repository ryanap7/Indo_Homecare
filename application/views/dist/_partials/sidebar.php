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
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
						<i class="fas fa-fire"></i> 
						<span>Dashboard</span>
					</a>
				</li>
			
				<li class="menu-header">Member</li>
				<li class="<?= $this->uri->segment(2) == 'member' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/member/registration') ?>">
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
				<li class="<?= $this->uri->segment(2) == 'trainer'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/trainer') ?>">
						<i class="fas fa-running"></i> 
						<span>Trainer</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'membership'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/membership') ?>">
						<i class="fas fa-users"></i> 
						<span>Membership</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'payment'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/payment') ?>">
						<i class="fas fa-credit-card"></i> 
						<span>Payment Type</span>
					</a>
				</li>

				<li class="menu-header">Transaction</li>
				<li class="">
					<a class="nav-link" href="#">
						<i class="fas fa-shopping-cart"></i> 
						<span>Transaction</span>
					</a>
				</li>

				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'fee'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/fee') ?>">
						<i class="fas fa-money-check-alt"></i> 
						<span>Fee</span>
					</a>
				</li>
			</ul>
        </aside>
      </div>
