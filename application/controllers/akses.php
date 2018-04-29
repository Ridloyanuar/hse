<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Akses extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_sign');
        define('key', 'username');
		$this->load->model(model);
    }

	public function login()
	{
		$data = $this->input->post();
		$a_data = $this->{model}->login($data['username'], $data['password']);

		if($a_data['code'] == '200') {
			$this->session->set_userdata('is_logged_in', $data['username']);
            //session
            foreach ($a_data['data'][0] as $key => $value) {
                $this->session->set_userdata($key, $value);
            }
            redirect('', 'refresh');
		} else {
			$this->load->view('header');
			$this->load->view('login', $a_data);
        }
	}

	public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_userdata('is_logged_in', false);
        redirect('', 'refresh');
    }
}

?>