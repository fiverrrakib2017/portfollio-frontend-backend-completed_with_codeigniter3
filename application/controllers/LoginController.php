<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');  
        
    }

    public function index() {
        $this->load->view('admin/pages/login');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $user = $this->User_model->check_credentials($username, $password);
    
        if($user) {
            $this->session->set_userdata('user_id', $user['id']); 
            $this->session->set_userdata('username', $user['username']);
                
            $setTime=time();
            $this->db->set('last_login', $setTime);
            $this->db->where('id', $user['id']);
            $this->db->update('users');
            
            
            redirect(base_url('admin/dashboard'), 'refresh'); // Redirect to the Admin Panel  after successful login
        } else {
            $this->session->set_flashdata('error', 'Record Does Not Match');
            redirect(base_url('admin/login'), 'refresh'); 
        }
    }
    

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        redirect(base_url('admin/login'));
        
    }
}
?>
