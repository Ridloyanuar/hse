<?php

require_once APPPATH.'/models/m_model.php';

class M_sign extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'account');
        define('header', ' ');
        define('order', 'user_id');
    }

    public function login($username, $password)
    {
		$this->db->select('*');
		$query = $this->db->get_where('account', array(
		'username' => $username, 
		'password' => md5($password)
		));
		if ($query->num_rows() > 0) {	            
	            foreach ($query->result() as $row) {
	                if($row->status == 1){
	                	$result['code'] = "200";
		            	$result['message'] = "Selamat, anda berhasil login";
		                $result['data'] = $query->result_array();
						$this->db->where('username', $username);
	                }
	                else if($row->status != 1){
	                	$result['code'] = "401";
			        	$result['message'] = "Akun anda belum diaktifkan, hubungi admin untuk aktivasi akun";
			        	$result['data'] = null;
	                }
	                else {
	                	$result['code'] = "403";
			        	$result['message'] = "Akun anda tidak mempunyai hak akses";
			        	$result['data'] = null;
	                }
	            }
            
	        }
	        else{
	        	$result['code'] = "404";
	        	$result['message'] = "Username atau password tidak ditemukan";
	        	$result['data'] = null;	
	        }
	        return $result;
    }
}

?>