<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeesController extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');	
		}
	}
	
	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$data['profesi']	 	= $this->db->query("SELECT * FROM profesi")->result();
			$data['employees']	 	= $this->db->query("SELECT * FROM employees INNER JOIN profesi ON employees.id_profesi=profesi.id_profesi")->result();
			$this->load->view('pages/SuperAdmin/employees/index.php', $data);
		} else {
			redirect('/');	
		}
	}
	
	public function filter_profesi()
	{
		$profesi = $_GET['filter_profesi'];
		$data = array(
			'title' => "Laporan Keuangan"
		);

		if ($profesi == 0) {
			$data	 			= $this->db->query("SELECT * FROM employees INNER JOIN profesi ON employees.id_profesi=profesi.id_profesi")->result();
		} else {
			$data	 			= $this->db->query("SELECT * FROM employees INNER JOIN profesi ON employees.id_profesi=profesi.id_profesi WHERE employees.id_profesi = $profesi")->result();
		}

		if (!empty($data)) {
			$no = 1;
			foreach($data as $row) : ?>
			<tr>
				<td><?= $no++?></td>
				<td><?= $row->name?></td>
				<td><?= $row->nip?></td>
				<td><?= $row->nama_bagian?></td>
				<td><?= $row->phone?></td>
				<td><?= $row->address?></td>
				<td>
				<?php if ($row->status === '0') { ?>
					<div class="badges">
						<span class="badge badge-warning">Non Active</span>
					</div>
				<?php } else { ?>
					<div class="badges">
						<span class="badge badge-primary">Active</span>
					</div>
				<?php } ?>	
				</td>
				<td><img src="<?= base_url('assets/img/employees/').$row->img?>" alt="" style="width: 50px; border-radius: 50%"></td>
			</tr>
		<?php endforeach;?> <?php
		} else {
			?>
			<tr>
				<td colspan="9" align="center">Tidak ada Data</td>		
			</tr>
			<?php
		}
	}
}
