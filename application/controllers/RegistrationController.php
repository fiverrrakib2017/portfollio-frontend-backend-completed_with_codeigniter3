<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationController extends CI_Controller{
    public function __construct(){
        parent::__construct();
       
    }
    public function index(){
       
        $this->load->view('Registration_page');
       
    }
    
    public function add_data(){
        if (isset($_POST['add_data'])) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $password = $this->input->post('password');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            
            $fullname = $first_name . ' ' . $last_name;
            // Check if username already exists 
                $this->db->where('username', $username);
                $query = $this->db->get('users');

                if ($query->num_rows() > 0) {
                    // Username is already taken
                    echo 0;
                    exit;
                }
    
            
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'phone_number' => $phone,
                'gender' => $gender,
                'last_login' => NULL,
                'create_date' => date("Y-m-d"),
                'expire_date' => strtotime(date("Y-m-d", strtotime("+1 month"))),
                'status' => 0,
                'user_type' => 0,
            );
           
            // Insert data into users table
            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();
            
            $table2 = array(
                'title'=>'default Title',
                'description'=>'Default Description',
                'user_id' => $user_id,
            );
            $this->db->insert('table2', $table2);
            
            $profile = array(
                'user_id'=>$user_id,
                'name'=>$fullname,
                'image'=>'',
                'resume_upload'=>'',
                'site_title'=>'',
                'site_logo'=>'',
                'create_date'=>date("Y-m-d"),
                'status'=>1,
            );
            $this->db->insert('profile', $profile);
            
            //When Insert successful
            echo 1;
            exit;
        }
    }

    

}