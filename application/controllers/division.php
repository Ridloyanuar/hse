<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Division extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_division');
        define('key', 'id_division');
        define('page', 'inc_listview');
        define('page_detail', 'inc_dataview');
    }

    public function index()
    {
        $this->getall ();
    }
    
    public function data($data)
    {
        $a_data['input'][] = array('key' => 'id_division', 'label' => 'Id Divisi', 'type' => 'T', 'hidden' => true, 'readonly' => false);
        $a_data['input'][] = array('key' => 'division_name', 'label' => 'Divisi', 'type' => 'T', 'hidden' => false, 'readonly' => true);
       
        $a_data['label'] = 'Data Divisi';
        $a_data['p_key'] = 'id_division';

        //variabel request
        // $this->load->model('m_auth');
        // $a_auth = $this->m_auth->role();

        $a_data['c_insert'] = true;
        $a_data['c_edit'] = true;
        $a_data['c_delete'] = true;
        
        return array_merge($data, $a_data);
    }

	public function input($a_data)
	{
        $a_data = $this->data($a_data);
        $a_data['link'] = $this->get_current_url();

    	$this->load->view(page, $a_data);
	}
}

?>