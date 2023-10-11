<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageController extends CI_Controller{
    public $user_id=NULL;
    public function __construct(){
        parent::__construct();
        $this->load->library('session'); 
        if (!$this->session->userdata('username')) {
            redirect(base_url('admin/login')); // Redirect to login page
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
        $sql = "SELECT * FROM `message` where user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/Message', $data);
    }
    public function delete_message(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('message', array('id' => $id));
            echo 1;
            exit;
        }
    }   
    public function add_message(){
        if (isset($_POST['add_data'])) {
            $name= $_POST['name'];
            $email= $_POST['email'];
            $phone_number= $_POST['phone_number'];
            $comments= $_POST['comments'];
            $user_id= $_POST['user_id'];

            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone_number,
                'message' => $comments,
                'create_date' => date("Y-m-d"),
                'status' => 1,
                'user_id'=>$user_id,
            );
           
            /* Insert The data Message table Database*/
            $this->db->insert('message', $data);
            echo 1;
            exit;
        } 
    }

}



