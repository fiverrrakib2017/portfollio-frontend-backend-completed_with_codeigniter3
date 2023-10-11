<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session'); 
        if (!$this->session->userdata('username')) {
            redirect(base_url('login')); // Redirect to login page 
        }
    }
    public function index(){
        $data['title'] = 'Portfollio Admin Panel';
		$data['css'] = $this->load->view('admin/include/Css/css', '', TRUE);
		$data['js'] = $this->load->view('admin/include/Js/js', '', TRUE);
		$data['sidebar'] = $this->load->view('admin/include/Menu/menu', '', TRUE);
        $data['header'] = $this->load->view('admin/include/Header/header', '', TRUE);
		$data['footer'] = $this->load->view('admin/include/Footer/footer', '', TRUE);
        $sql = "SELECT * FROM users ";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/User', $data);
       
    }
    public function get_data(){
        if (isset($_GET['get_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM users WHERE id='$id'");
           echo json_encode($query->result());
        }
    }
    public function add_data(){
        if (isset($_POST['add_data'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $expire_date = $this->input->post('expire_date');
            $user_type = $this->input->post('user_type');
            $status = $this->input->post('status');
    
            // Check if username already exists 
                $this->db->where('username', $username);
               // $this->db->where('id !=', $id); 
                $query = $this->db->get('users');

                if ($query->num_rows() > 0) {
                    // Username is already taken 
                    echo 0;
                    exit;
                }
    
            // Username is valid, proceed with insertion
            $data = array(
                'username' => $username,
                'password' => $password,
                'last_login' => time(),
                'create_date' => date("Y-m-d"),
                'expire_date' => $expire_date,
                'status' => $status,
                'user_type' => $user_type,
            );
    
            // Insert data into users table
            $this->db->insert('users', $data);
            
            // Insert successful
            echo 1;
            exit;
        }
    }

    public function update_data(){
        if (isset($_POST['update_data'])) {

            $id=$_POST['id'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $expire_date=$_POST['expire_date'];
            $user_type=$_POST['user_type'];
            $status=$_POST['status'];
            
            // Check if username already exists (except for the current user)
            $this->db->where('username', $username);
            $this->db->where('id !=', $id); // Exclude the current user from the check
            $query = $this->db->get('users');

            if ($query->num_rows() > 0) {
                // Username is already taken by a different user
                echo 0;
                exit;
            }
            
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->set('expire_date', $expire_date);
            $this->db->set('user_type', $user_type);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('users');

            
            echo 1;
            exit;
        }
    }
    public function delete_data(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('users', array('id' => $id));
            echo 1;
            exit;
        }
    }
    public function approve_data(){
        if (isset($_POST['approve_data'])) {
            $id= $_POST['id'];
            
            $this->db->set('status', 1);
            $this->db->where('id', $id);
            $this->db->update('users');
            echo 1;
            exit;
        }
    }

}