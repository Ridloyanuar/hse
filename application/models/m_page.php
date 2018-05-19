<?php

require_once APPPATH.'/models/m_model.php';

class M_Page extends M_model
{
	public function __construct()
    {
        parent::__construct();
        define('table', 'page');
        define('header', 'Page');
        define('order', 'page_indexing');
    }

    function add($data)
 	{
 		$sub_folder = 'filled';
 		if ($data['is_master'] == 1) {
 			$sub_folder = 'master';
 		}
 		
 		// upload config 
		$config['upload_path'] 		= './upload_file/'.$sub_folder;
		$config['allowed_types'] 	= '*';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('file_name')){
			$up_data		    = $this->upload->display_errors();
		}else{
			$up_data		    = $this->upload->data();
			$data['file_name']	= $up_data['file_name'];
		}

	    // default value
	    $data['level'] = 1;
	    $data['page_indexing'] = $this->{model}->get_last_value('page_indexing', array('parent_id' => $data['parent_id']));

	    // page index formating
	    $splittedstring = explode(".", $data['page_indexing']);
		$splittedstring[count($splittedstring) - 1]++;
		$data['page_indexing'] = implode(".", $splittedstring);

	    // get detail parent data
	    if ($data['parent_id'] > 0) {
	    	$level = $this->{model}->get_last_value('level', array('page_id' => $data['parent_id']));
	    	$data['level'] = ($level + 1);

	    	if ($data['page_indexing'] == 1) {
	    		$index = $this->{model}->get_last_value('page_indexing', array('page_id' => $data['parent_id']));
	    		$data['page_indexing'] = $index.".1";
	    	}
	    }

 		$result = $this->db->get_where(table, array(key => $data[key]));
		if ($result->num_rows() > 0){
			$data = array(
				'code' => "400",
				'message' => header . " Sudah Ditambahkan Sebelumnya",
				'data' => null
				);
		}
		else{
			$this->db->insert(table, $data); 
			$data = array(
				'code' => "200",
				'message' => header . " Berhasil ditambahkan",
				'data' => $data
				);			
		}
		return $data;
 	}
}

?>