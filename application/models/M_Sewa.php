<?php 

class M_Sewa extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $invoice        = $this->input->post('invoice');
        $name           = $this->input->post('name');

        foreach ($this->cart->contents() as $data) {
           $periode = $data['options']['Sesi'];
        }
 
        if($periode == "Bulan"){
            $expired = date('Y-m-d', mktime(date('H'), date('m'), date('s'), date('m'), date('d') + 30, date('Y')));
        } else {
            $expired = date('Y-m-d', mktime(date('H'), date('m'), date('s'), date('m'), date('d') + 7, date('Y')));
        }

        $data = array(
            'id_client'       => $name,
            'no_invoice'      => $invoice,
            'status'          => 1,
            'date'            => date('Y-m-d'),
            'date_expired'    => $expired
        );

        $this->db->insert('sewa_alkes', $data);
        $id_sewa = $this->db->insert_id();

        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_sewa'           => $id_sewa,
                'nama'              => $items['name'],
                'qty'               => $items['qty'],
                'harga'             => $items['price']
            );
            $this->db->insert('detail_sewa', $data);
        }
        
        return TRUE;
    }

    public function get_id_sewa($id)
    {
        $result = $this->db->where('id_sewa', $id)->limit(1)->get('sewa_alkes');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function get_id_detail($id)
    {
        $result = $this->db->where('id_sewa', $id)->get('detail_sewa');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function generate($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('no_invoice');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array()[$field];
    }
}
?>