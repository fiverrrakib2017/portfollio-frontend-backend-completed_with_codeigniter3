<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SectionTwoController extends CI_Controller{
    public $user_id=NULL;
    public function __construct(){
        parent::__construct();
        $this->load->library('session'); 
        if (!$this->session->userdata('username')) {
            redirect(base_url('login')); // Redirect to login page if user is not logged in
        }
        $this->user_id=$this->session->userdata('user_id');
    }
    public function index(){
        $data['title'] = 'Portfollio Admin Panel';
		$data['css'] = $this->load->view('admin/include/Css/css', '', TRUE);
		$data['js'] = $this->load->view('admin/include/Js/js', '', TRUE);
		$data['sidebar'] = $this->load->view('admin/include/Menu/menu', '', TRUE);
        $data['header'] = $this->load->view('admin/include/Header/header', '', TRUE);
		$data['footer'] = $this->load->view('admin/include/Footer/footer', '', TRUE);
        $sql = "SELECT * FROM `table2` where user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/About/Section_two', $data);
       
    }
    public function update_data(){
        if (isset($_POST['update_data'])) {
            $id=$_POST['update_id'];
            $title=$_POST['update_title'];
            $description=$_POST['update_description'];

           
            $this->db->set('title', $title);
            $this->db->set('description', $description);
            $this->db->where('id', $id);
            $this->db->update('table2');
            echo 1;
            exit;
        }
    }


}