<?php

require_once APPPATH.'/models/m_model.php';

class M_User extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'account');
        define('header', 'User');
        define('order', 'user_id');
    }
}

?>