<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendController extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    public function index($User_name=''){
        if($User_name == ''){
            /* GET the data from database table and pass the view File */
            $data['home'] =$this->db->query("SELECT * FROM `home` WHERE user_id=1 LIMIT 1")->result(); 
            $data['about'] =$this->db->query("SELECT * FROM `about` WHERE user_id=1 LIMIT 1")->result(); 
            $data['section1'] =$this->db->query("SELECT * FROM `table1` WHERE user_id=1")->result(); 
            $data['section2'] =$this->db->query("SELECT * FROM `table2` WHERE  user_id=1")->result(); 
            $data['section3'] =$this->db->query("SELECT * FROM `table3`WHERE  user_id=1")->result(); 
            $data['design_skill'] =$this->db->query("SELECT * FROM `design_skill` WHERE  user_id=1")->result(); 
            $data['language'] =$this->db->query("SELECT * FROM `language` WHERE user_id=1")->result(); 
            $data['testimonial'] =$this->db->query("SELECT * FROM `testimonial` WHERE status=1 AND user_id=1")->result(); 
            $data['services'] =$this->db->query("SELECT * FROM `services` WHERE status=1 AND user_id=1 ")->result(); 
            $data['education'] =$this->db->query("SELECT * FROM `education` WHERE status=1 AND user_id=1 ")->result(); 
            $data['experience'] =$this->db->query("SELECT * FROM `experience` WHERE status=1 AND user_id=1 ")->result(); 
            $data['category'] =$this->db->query("SELECT * FROM `category` WHERE status=1 AND user_id=1 ")->result(); 
            $data['works'] =$this->db->query("SELECT * FROM `works` WHERE status=1 AND user_id=1 ")->result(); 
            $data['blog_post'] =$this->db->query("SELECT * FROM `blog_post` WHERE user_id=1 AND status=1 ")->result(); 
            $data['contracts'] =$this->db->query("SELECT * FROM `contracts` WHERE status=1 AND user_id=1")->result(); 
            $data['social_icon'] =$this->db->query("SELECT * FROM `social_icon` WHERE user_id=1")->result(); 
            $data['profile'] =$this->db->query("SELECT * FROM `profile` WHERE user_id=1 LIMIT 1 ")->result(); 
            
            $_theme_selection = $this->db->query("select id from template where status = '1' ")->row()->id;
            /* Pass the data view File */
            $this->load->view('Frontend/' . $_theme_selection . '', $data);
       }else{
            
            $_check_user = $this->db->query("select id from users where username = '$User_name' ")->row()->id;
            $this->user_id=$_check_user;
            if(!empty($_check_user)){
                 /* GET the data from database table and pass the view File */
                $data['home'] = $this->db->query("SELECT * FROM `home` WHERE user_id = '" . $_check_user . "' LIMIT 1")->result(); 
                
              
                $data['about'] =$this->db->query("SELECT * FROM `about`WHERE user_id='$_check_user' LIMIT 1")->result();
                 
                 
                $data['section1'] =$this->db->query("SELECT * FROM `table1`WHERE user_id='".$_check_user."' ")->result(); 
                
                $data['section2'] =$this->db->query("SELECT * FROM `table2`WHERE user_id='$_check_user' ")->result(); 
                
                $data['section3'] =$this->db->query("SELECT * FROM `table3` WHERE user_id='$_check_user' ")->result(); 
                
                $data['design_skill'] =$this->db->query("SELECT * FROM `design_skill` WHERE user_id='$_check_user' ")->result(); 
                
                $data['language'] =$this->db->query("SELECT * FROM `language` WHERE user_id='$_check_user' ")->result(); 
                
                $data['testimonial'] =$this->db->query("SELECT * FROM `testimonial` WHERE status=1 AND user_id='$_check_user'")->result(); 
                $data['services'] =$this->db->query("SELECT * FROM `services` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['education'] =$this->db->query("SELECT * FROM `education` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['experience'] =$this->db->query("SELECT * FROM `experience` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['category'] =$this->db->query("SELECT * FROM `category` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['works'] =$this->db->query("SELECT * FROM `works` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['blog_post'] =$this->db->query("SELECT * FROM `blog_post` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['contracts'] =$this->db->query("SELECT * FROM `contracts` WHERE status=1 AND user_id='$_check_user' ")->result(); 
                $data['social_icon'] =$this->db->query("SELECT * FROM `social_icon` WHERE user_id='$_check_user'")->result(); 
                $data['profile'] =$this->db->query("SELECT * FROM `profile` WHERE user_id='$_check_user' LIMIT 1 ")->result(); 
                
                $_theme_selection = $this->db->query("select template_id from template where status = '1' AND user_id='" . $_check_user . "' ")->row()->template_id;
                /* Pass the data view File */
                $this->load->view('Frontend/' . $_theme_selection . '', $data);
            }else{
                
            }
        }
    }
    
    
    
    public function get_works_details($ciid=''){
         /*Get the User ID */
        $user_id = $this->db->query("select user_id from work_details where work_id = '".$ciid."'  ")->row()->user_id;
        
        
        $sql = "SELECT work_details.id,work_details.user_id, works.title , category.name, work_details.project_details, work_details.project_overview, work_details.client_name, work_details.project_value,work_details.location,work_details.designer,work_details.image1,work_details.image2,work_details.image3,work_details.status,work_details.date
        FROM work_details 
        JOIN works ON work_details.work_id=works.id
        JOIN category  ON works.category_id = category.id WHERE works.id=$ciid AND work_details.user_id='".$user_id."' ";
        
        
        
        $data['work_details'] =$this->db->query($sql)->result(); 
        
        
        
         $data['profile'] =$this->db->query("SELECT * FROM `profile` WHERE user_id='".$user_id."' LIMIT 1 ")->result(); 
        $_page_selection = $this->db->query("select template_id from template where status = '1' AND user_id='".$user_id."'")->row()->template_id;
        /* Pass the data view File */
        
        $this->load->view('Frontend/Work_details/' . $_page_selection . '', $data);
    }
    public function get_blog_details($clid){
        
        
       /*Get the User ID */
        $user_id = $this->db->query("select user_id from blog_post where id = '".$clid."'  ")->row()->user_id;
        
        if ($user_id) {
            $username_result = $this->db->query("select username from users where id = '".$user_id."' AND user_type='0' ")->row();
            
            if ($username_result) {
                $username = $username_result->username;
                $data['username'] = $username;
            } else {
                $data['username'] = null;
            }
        } else {
            // Handle case where user_id is not found.
            $data['username'] = null;
        }
        
        
        
        $data['user_id']=$user_id;
        
        
        
        $data['profile'] =$this->db->query("SELECT * FROM `profile` WHERE user_id='".$user_id."' LIMIT 1 ")->result(); 
        
       
        $data['social_icon'] =$this->db->query("SELECT * FROM `social_icon`  WHERE user_id='".$user_id."' ")->result(); 


        $data['blog_post'] =$this->db->query("SELECT * FROM blog_post where id='$clid' AND user_id='".$user_id."'  ")->result(); 

        $data['post_comment'] =$this->db->query("SELECT * FROM post_comment where post_id='$clid' ")->result(); 
         
        
        $result = $this->db->query("SELECT * FROM post_comment WHERE post_id='$clid' ");
        if ($result === false) {
            die("Error executing the query: " . $this->db->error);
        }
        $data['post_comment_count'] = $result->num_rows();

        $_page_selection = $this->db->query("select template_id from template where status = '1' AND user_id='".$user_id."'  ")->row()->template_id;
        /* Pass the data view File */
        $this->load->view('Frontend/Blog_details/' . $_page_selection . '', $data);
    }
}