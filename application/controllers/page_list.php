<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/controllers/c_controller.php';

class Page_list extends C_controller
{
	public function __construct()
    {
        parent::__construct();
        define('model', 'm_page');
        define('key', 'page_id');
        define('page', 'inc_treeview');
        define('page_detail', 'inc_dataview');
    }

    public function index()
    {
        $this->getall ();
    }
    
    public function data($data)
    {
        $a_data['controller'] = $this;

        $this->load->model('m_constant');
        $parent_page = $this->m_constant->parent_page('&nbsp&nbsp&nbsp');
        $status = $this->m_constant->status();

        // add or edit page
        $a_data['input'][] = array('key' => 'page_id', 'label' => 'Page ID', 'type' => 'T', 'hidden' => true, 'readonly' => true);
        $a_data['input'][] = array('key' => 'parent_id', 'label' => 'Parent Name', 'type' => 'S', 'option' => $parent_page, 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'page_name', 'label' => 'Page Name', 'type' => 'T', 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'page_indexing', 'label' => 'Page Indexing', 'type' => 'T', 'hidden' => true, 'readonly' => false);
        $a_data['input'][] = array('key' => 'status', 'label' => 'Status', 'type' => 'S', 'option' => $status, 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'file_name', 'label' => 'File Name', 'type' => 'F', 'hidden' => false, 'readonly' => true);
        $a_data['input'][] = array('key' => 'is_master', 'label' => 'Is master', 'type' => 'C', 'value' => true, 'hidden' => false, 'readonly' => true);

        $arrayCategories = array();
        foreach ($data['data'] as $key) {
            $arrayCategories[$key['page_id']] = array("page_id" => $key['page_id'], "parent_id" => $key['parent_id'], "page_name" => $key['page_name'], "page_indexing" => $key['page_indexing']);
        }
        $a_data['tree_view'] = $arrayCategories;

        $a_data['label'] = 'Data Divisi';
        $a_data['p_key'] = 'page_id';
        $a_data['script'] = 'page';

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

    public function CreateTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
    foreach ($array as $categoryId => $category) {
        if ($currentParent == $category['parent_id']) {                       
            if ($currLevel > $prevLevel) echo " <ul> "; 

            if ($currLevel == $prevLevel) echo " </li> ";

            echo '<li data-class="page-id-'.$category['page_id'].'">'.$category['page_indexing'] . " " .$category['page_name'];

            if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

            $currLevel++; 

            $this->CreateTreeView($array, $categoryId, $currLevel, $prevLevel);

            $currLevel--;               
            }
        }
        if ($currLevel == $prevLevel) echo " </li>  </ul> ";
    }
}

?>