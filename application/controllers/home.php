<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Home extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_dashboard');
        define('key', '');
    }

	public function index()
	{
		$this->load->view('header');
    	$this->load->view('dashboard');
	}
}

?>