<?php

require_once APPPATH.'/models/m_model.php';

class M_Constant extends M_model
{
	public function __construct()
    {
        parent::__construct();
    }

    function status() {
        $data = array('1' => 'Aktif', '2' => 'Non Aktif');
        return $data;
    }

    function gender() {
    	$data = array('1' => 'Laki-laki', '2' => 'Perempuan');
    	return $data;
    }

    function division() {
        $this->db->order_by('id_division', 'asc');
        $query = $this->db->get('division')->result_array();
        foreach ($query as $key) {
            $data[$key['id_division']] = $key['division_name'];
        }
        return $data;
    }
}

?>