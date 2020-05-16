<?php 

class M_invoice extends CI_Model
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

        $this->db->insert('transaction', $data);
        $id_transaction = $this->db->insert_id();

        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_transaction'    => $id_transaction,
                'nama_layanan'      => $items['name'],
                'periode'           => $items['options']['Sesi'],
                'harga'             => $items['price']
            );
            $this->db->insert('invoice', $data);
        }
        return TRUE;
    }

    public function get_id_transaction($id)
    {
        $result = $this->db->where('id', $id)->limit(1)->get('transaction');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function get_id_invoice($id)
    {
        $result = $this->db->where('id_transaction', $id)->get('invoice');
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

        return $this->db->get($table)->row_array();
    }
}
