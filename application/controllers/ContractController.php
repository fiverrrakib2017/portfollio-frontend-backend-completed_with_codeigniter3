<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractController extends CI_Controller{
    public $user_id=NULL;
    public function __construct(){
        
       parent::__construct();
        $this->load->library('session'); 
        if (!$this->session->userdata('username')) {
            redirect(base_url('admin/login')); // Redirect to login page if user is not logged in
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
        $sql = "SELECT * FROM contracts WHERE user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/Contract', $data);
    }
    public function delete_data(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('contracts', array('id' => $id));
            echo 1;
        }
    }
    public function add_contract(){
        if (isset($_POST['add_data'])) {
            
             $email=$_POST['email'];
             $phone=$_POST['phone'];
             $location=$_POST['location'];
            $status=$_POST['status'];
            $map_link=$_POST['map_link'];

            $data = array(
                'email_address' => $email,
                'phone_number' => $phone,
                'location' => $location,
                'map_link' => $map_link,
                'user_id'=>$this->user_id,
                'status' => $status,
            );
            /* Insert The data */
            $this->db->insert('contracts', $data);
            //insert successfully; 
            echo 1;
            exit;
        }

    }
    public function get_contract(){
        if (isset($_GET['get_contract_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM contracts WHERE id='$id'");
           echo json_encode($query->result());
           exit;
        } 
    }
    public function update_contract(){
        if (isset($_POST['update_data'])) {

            $id=$_POST['update_contract_id'];
            $email=$_POST['update_email'];
            $phone=$_POST['update_phone'];
            $location=$_POST['update_location'];
            $update_map_link=$_POST['update_map_link'];
            $status=$_POST['update_status'];

          
            $this->db->set('email_address', $email);
            $this->db->set('phone_number', $phone);
            $this->db->set('location', $location);
            $this->db->set('map_link', $update_map_link);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('contracts');
            echo 1;
            exit;
        }
    }
    

}



