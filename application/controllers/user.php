<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class User extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_user');
        define('key', 'user_id');
        define('page', 'inc_listview');
        define('page_detail', 'inc_dataview');
    }

    public function index()
    {
        $this->getall ();
    }
    
    public function data($data)
    {
        $this->load->model('m_constant');
        $gender = $this->m_constant->gender();
        $status = $this->m_constant->status();
        $division = $this->m_constant->division();

        $a_data['input'][] = array('key' => 'user_id', 'label' => 'Id Divisi', 'type' => 'T', 'hidden' => true, 'readonly' => false);
        $a_data['input'][] = array('key' => 'username', 'label' => 'Username', 'type' => 'T', 'hidden' => true, 'readonly' => true);
        $a_data['input'][] = array('key' => 'full_name', 'label' => 'Nama', 'type' => 'T', 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'phone_number', 'label' => 'No HP', 'type' => 'T', 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'gender', 'label' => 'Jenis Kelamin', 'type' => 'S', 'option' => $gender, 'hidden' => true, 'readonly' => true);
        $a_data['input'][] = array('key' => 'id_division', 'label' => 'Divisi', 'type' => 'S', 'option' => $division, 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'status', 'label' => 'Status', 'type' => 'S', 'option' => $status, 'hidden' => false, 'readonly' => true);
        
        $a_data['label'] = 'Data User';
        $a_data['p_key'] = 'user_id';

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