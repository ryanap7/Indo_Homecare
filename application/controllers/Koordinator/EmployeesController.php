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
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$data['profesi']	 	= $this->db->query("SELECT * FROM profesi")->result();
			$data['employees']	 	= $this->db->query("SELECT * FROM employees INNER JOIN profesi ON employees.id_profesi=profesi.id_profesi")->result();
			$this->load->view('pages/Koordinator/employees/index.php', $data);
		} else {
			redirect('/');	
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Karyawan"
			);

			$table = "employees";
			$field = "nip";

			$today = date('Y-md');

			$prefix = $today;

			$lastCode = $this->M_Employees->generate($prefix, $table, $field);

			$noUrut = (int) substr($lastCode, -3, 3);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%03s', $noUrut);

			$data['profesi']	 	= $this->db->query("SELECT * FROM profesi")->result();
			$this->load->view('pages/Koordinator/employees/add', $data);
		} else {
			redirect('/');		
		}
	}

	public function store()
    {
		$name                   = $this->input->post('name');
		$nip  	                = $this->input->post('nip');
		$profesi  	            = $this->input->post('profesi');
		$email           		= $this->input->post('email');
		$phone              	= $this->input->post('telp');
		$alamat              	= $this->input->post('alamat');
		$status              	= $this->input->post('status');
		$date              		= $this->input->post('date');
		$img 				    = $_FILES['img'];
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		if ($img = '') {
			// Jika Field Kosong
			$img = 'default.png';
		} else {
			// Jika Field Ada
			$config['upload_path']		= './assets/img/employees';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img')){
				$img=$this->upload->data('file_name');
			} else {
				$img = 'default.png';	
			}
		}

		$data= array(
			'name'			=> $name,
			'nip'			=> $nip,
			'id_profesi'	=> $profesi,
			'email'			=> $email,
			'phone'			=> $phone,
			'address'		=> $alamat,
			'status'		=> $status,
			'img'			=> $img,
			'date'			=> $date
		);
		
		$this->M_Employees->store($data, 'employees');
		redirect('koordinator/employees');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Karyawan"
			);
			$where = array('id_employee' => $id);
			$data['employees']	 = $this->db->query("SELECT * FROM employees INNER JOIN profesi ON employees.id_profesi=profesi.id_profesi")->result();
			$this->load->view('pages/Koordinator/employees/edit', $data);
		} else {
			redirect('/');		
		}
	}

	public function update()
    {
		$id					= $this->input->post('id');
		$name                   = $this->input->post('name');
		$nip  	                = $this->input->post('nip');
		$profesi  	            = $this->input->post('profesi');
		$email           		= $this->input->post('email');
		$phone              	= $this->input->post('telp');
		$alamat              	= $this->input->post('alamat');
		$status              	= $this->input->post('status');
		$date              		= $this->input->post('date');
		$img 				    = $_FILES['img'];
		$result					= $this->M_Employees->check_img($id);

		if($result->num_rows() > 0)
		{
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		} 
		
		if($status== NULL){
			$status = 0;
		} else {
			$status = 1;
		}

		if ($img){
			// Jika Field ada
			$config['upload_path']		= './assets/img/employees';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img')){
				$img=$this->upload->data('file_name');
				$this->db->set('img', $img);
				if($foto != 'default.png')
				{
					$target_file	= './assets/img/employees/'.$foto;
					unlink($target_file);
				}
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data= array(
			'name'			=> $name,
			'nip'			=> $nip,
			'id_profesi'	=> $profesi,
			'email'			=> $email,
			'phone'			=> $phone,
			'address'		=> $alamat,
			'status'		=> $status,
			'date'			=> $date
		);

		$where = array('id_employee' => $id);
		$this->db->update('employees', $data, $where);
		redirect('koordinator/employees');    
	}

	public function delete($id)
    {
		$result				= $this->M_Employees->check_img($id);

		if($result->num_rows() > 0)
		{
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if($foto != 'default.png')
		{
			$target_file	= './assets/img/employees/'.$foto;
			unlink($target_file);
		}

		$where = array('id_employee' => $id);
		$this->db->delete('employees', $where);
		redirect('koordinator/employees');     
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
				<td>
					<a href="<?php echo base_url('koordinator/employees/edit/').$row->id_employee ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
					<a href="<?php echo base_url('koordinator/employees/delete/').$row->id_employee ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
				</td>
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
