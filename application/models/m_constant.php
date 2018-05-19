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
        $this->db->order_by(order, 'asc');
        $query = $this->db->get('division')->result_array();
        foreach ($query as $key) {
            $data[$key['id_division']] = $key['division_name'];
        }
        return $data;
    }

    function parent_page($sparate='') {
        $data = array('0' => 'None' );
        $this->db->order_by(order, 'asc');
        $query = $this->db->get('page')->result_array();
        foreach ($query as $key) {
            $space = "";
            if ($sparate != '') {
                for ($i=1; $i < $key['level']; $i++) { 
                    $space = $space . $sparate;
                }
            }
            $data[$key['page_id']] = $space . $key['page_name'];
        }
        return $data;
    }
}

?>