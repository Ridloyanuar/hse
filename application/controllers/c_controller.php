<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_current_url()
    {
    
        $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
        $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
        
        return $complete_url;
    }

    public function get_detail_url($value='')
    {
        $current = $this->get_current_url();
        $detail_url = $current . "/detail/" . $value;

        return $detail_url;
    }

    public function is_logged()
    {
        $user = $this->session->userdata['is_logged_in'];
        if(empty($user)) 
        {
            $this->load->helper('url');
            redirect('index.php');
        }
        else
        return isset($user);
    }

	public function add()
    {
        $this->is_logged();
        $data = $this->input->post();
        $this->load->model(model);
        $data[key] = $this->{model}->nextval();
        // $data = $this->{model}->reduce($data);
        $a_data = $this->{model}->add($data);
        $this->session->set_flashdata('a_data', $a_data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        $this->is_logged();
        $data = $this->input->post();
        $this->load->model(model);
        // $data = $this->{model}->reduce($data);
        $a_data = $this->{model}->update($data);
        $this->session->set_flashdata('a_data', $a_data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getall($data='')
    {
        $a_filter = array();
        $reqpage = 0;
        $page = $this->input->post('page');
        $valid = $this->input->post('valid');

        if($valid == null) $valid = -1;
        if($valid != -1) $a_filter['isvalid'] = $valid;
        
        if(!empty($page)) $reqpage = $page * 1000;
        $this->is_logged();
        $this->load->model(model);
        $a_data = $this->{model}->getall($reqpage, $a_filter);
        $a_data['datacount'] = ceil($this->{model}->datacount()/1000);
        
        if(!empty($data)) {
            $a_data['message'] = $data['message'];
            $a_data['code'] = $data['code'];
        }
        else
            $a_data['message'] = "";
        
        $a_data['page'] = $reqpage/1000;
        $a_data['valid'] = $valid;
        $this->input($a_data);
        //json_encode($a_data);
    }

    public function delete()
    {
        $this->is_logged();
        $id = $this->input->post("id_delete");
        $this->load->model(model);
        $a_data = $this->{model}->delete($id);
        $this->getall($a_data);
    }

    public function detail($id)
    {
        $this->is_logged();
        $this->load->model(model);
        $a_data = $this->{model}->detail($id);
        $a_data = $this->data($a_data);
        $a_data['middle'] = count($a_data['input'])/2;
        // $a_data['middle2'] = (fmod($a_data['middle'], 2) == 0 ? $a_data['middle'] : $a_data['middle'] + 1);
        // if($a_data['middle'] == 1) $a_data['middle2'] = 1;
        
        $flash_data = $this->session->flashdata('a_data');
        if ($flash_data != null) {
            $a_data['error_message'] = $flash_data['message'];
            $a_data['error_code'] = $flash_data['code'];
        }

        if ($a_data['data'] != null) {
            $this->load->view(page_detail, $a_data);
        } else {
            $this->load->view('err_404', $a_data);
        }
    }

    public function member($id)
    {
        $this->is_logged();
        $this->load->model(model);
        $a_data = $this->{model}->member($id);
        echo json_encode($a_data);
    }
}

?>