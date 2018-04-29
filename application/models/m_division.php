<?php

require_once APPPATH.'/models/m_model.php';

class M_Division extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'division');
        define('header', 'Divisi');
        define('order', 'id_division');
    }
}

?>