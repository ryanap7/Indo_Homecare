<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="main-sidebar sidebar-style-2">
		<aside id="sidebar-wrapper">
			<div class="sidebar-brand">
				<a href="<?php echo base_url(); ?>dist/index">Indo HomeCare</a>
			</div>
			<div class="sidebar-brand sidebar-brand-sm">
				<a href="<?php echo base_url(); ?>dist/index">IHC</a>
			</div>
			<?php if ($this->session->userdata('role') === '1') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('superadmin/dashboard') ?>">
						<i class="fas fa-fire"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Hak Akses</li>
				<li class="<?= $this->uri->segment(2) == 'admin' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('superadmin/admin') ?>">
						<i class="fas fa-user"></i> 
						<span>Data Admin</span>
					</a>
				</li>
				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'client'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('superadmin/client') ?>">
						<i class="fas fa-user"></i> 
						<span>Data Client</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'service'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('superadmin/service') ?>">
						<i class="fas fa-list"></i> 
						<span>Data Layanan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'report'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/report') ?>">
						<i class="fas fa-file"></i> 
						<span>Laporan Keuangan</span>
					</a>
				</li>
				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'fee'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/fee') ?>">
						<i class="fas fa-sign-out-alt"></i> 
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<?php } ?>
			<?php if ($this->session->userdata('role') === '2') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
						<i class="fas fa-fire"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'client'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/client') ?>">
						<i class="fas fa-user"></i> 
						<span>Data Client</span>
					</a>
				</li>
				<li class="dropdown <?= $this->uri->segment(2) == 'service'  ? 'active' : ''; ?>">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Data Layanan</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?= base_url('admin/service') ?>">Jasa Medis</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/service/support') ?>">Penunjang Medis</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/service/package') ?>">Paket HomeCare</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/service/alkes') ?>">Peralatan Kesehatan</a></li>
					</ul>
				</li>
				<li class="menu-header">Transaksi</li>
				<li class="dropdown <?= $this->uri->segment(2) == 'ambulance'  ? 'active' : ''; ?>">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-exchange-alt"></i> <span>Ambulance</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?= base_url('admin/ambulance') ?>">Status Ambulance</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/ambulance/sewa') ?>">Sewa Ambulance</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/ambulance/sewa/history') ?>">History</a></li>
					</ul>
				</li>
				<li class="dropdown <?= $this->uri->segment(2) == 'alkes'  ? 'active' : ''; ?>">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-exchange-alt"></i> <span>Peralatan Kesehatan</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?= base_url('admin/invoice/request') ?>">Permintaan Transaksi</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice/failed') ?>">Transaksi Gagal</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice') ?>">Transaksi Pending</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice/success') ?>">Transaksi Sukses</a></li>
					</ul>
				</li>
				<li class="dropdown <?= $this->uri->segment(2) == 'invoice'  ? 'active' : ''; ?>">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> <span>Transaksi</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?= base_url('admin/invoice/request') ?>">Permintaan Transaksi</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice/failed') ?>">Transaksi Gagal</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice') ?>">Transaksi Pending</a></li>
						<li><a class="nav-link" href="<?= base_url('admin/invoice/success') ?>">Transaksi Sukses</a></li>
					</ul>
				</li>
				<li class="menu-header">Laporan</li>
				<li class="<?= $this->uri->segment(2) == 'report'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/report') ?>">
						<i class="fas fa-file"></i> 
						<span>Laporan Keuangan</span>
					</a>
				</li>
				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'fee'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/fee') ?>">
						<i class="fas fa-sign-out-alt"></i> 
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<?php } ?>
			<?php if ($this->session->userdata('role') === '3') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('koordinator/dashboard') ?>">
						<i class="fas fa-fire"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'employees'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('koordinator/employees') ?>">
						<i class="fas fa-users"></i> 
						<span>Data Karyawan</span>
					</a>
				</li>
				<li class="menu-header">Kalender</li>
				<li class="<?= $this->uri->segment(2) == 'calendar'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('koordinator/calendar') ?>">
						<i class="fas fa-calendar"></i> 
						<span>Kalender</span>
					</a>
				</li>
				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'fee'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('auth/logout')?>">
						<i class="fas fa-sign-out-alt"></i> 
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<?php } ?>
        </aside>
      </div>
