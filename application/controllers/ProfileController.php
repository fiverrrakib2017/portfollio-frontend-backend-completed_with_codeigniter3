<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller{
     public $user_id=NULL;
    public function __construct(){
        parent::__construct();
        $this->load->library('session'); 
        if (!$this->session->userdata('username')) {
            redirect(base_url('login')); // Redirect to login page 
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
        $sql = "SELECT * FROM `profile` WHERE user_id=$this->user_id LIMIT 1 ";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/Profile', $data);
       
    }
    public function get_home(){
        if (isset($_GET['get_home_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM home WHERE id='$id'");
           echo json_encode($query->result());
        }
    }


    public function update_profile(){
        if (isset($_POST['update_data'])) {
            $id=$_POST['update_id'];
            $name=$_POST['update_name'];
            $status=$_POST['update_status'];
            $title=$_POST['update_title'];

            if (isset($_FILES['update_image'])) {
                /* GET THE FILE NAME AND SIZE */
                $file_name= $_FILES['update_image']['name'];
                $file_size= $_FILES['update_image']['size'];

                /* GET The file name path extension*/
                $extension=pathinfo($file_name,PATHINFO_EXTENSION);

                /* SET The file Valid extension*/
                $valid_extension=array("jpg","jped","gif","png");

                /* SET The file Size*/
                $maxSize=2*1024*1024;
                /* Check The file Size*/
                if($file_size >$maxSize){
                    echo 2;
                }else{
                    if (in_array($extension,$valid_extension)) {
                        $new_name=rand().".".$extension;
                        $path="image/".$new_name;
                        move_uploaded_file($_FILES['update_image']['tmp_name'],$path);

                        // Delete the old image file if it exists
                        if (file_exists($_POST['old_image'])) {
                            unlink('./'.$_POST['old_image']);
                        } 

                    }else{
                        // 'Invalid file extension.';
                        echo 0;
                    }
                }
            }else{
                $path= $_POST['old_image'];
            }


            if (isset($_FILES['update_resume'])) {
                /* GET THE FILE NAME AND SIZE */
                $file_name= $_FILES['update_resume']['name'];
                $file_size= $_FILES['update_resume']['size'];

                /* GET The file name path extension*/
                $extension=pathinfo($file_name,PATHINFO_EXTENSION);

                /* SET The file Valid extension*/
                $valid_extension=array("pdf");

                /* SET The file Size*/
                $maxSize=2*1024*1024;
                /* Check The file Size*/
                if($file_size >$maxSize){
                    echo 2;
                }else{
                    if (in_array($extension,$valid_extension)) {
                        $new_name=rand().".".$extension;
                        $resume="image/".$new_name;
                        move_uploaded_file($_FILES['update_resume']['tmp_name'],$resume);

                        // Delete the old image file if it exists
                        if (file_exists($_POST['old_resume'])) {
                            unlink('./'.$_POST['old_resume']);
                        } 

                    }else{
                        // 'Invalid file extension.';
                        echo 0;
                    }
                }
            }else{
                $resume= $_POST['old_resume'];
            }
            
            
            if (isset($_FILES['update_site_logo'])) {
                /* GET THE FILE NAME AND SIZE */
                $file_name= $_FILES['update_site_logo']['name'];
                $file_size= $_FILES['update_site_logo']['size'];

                /* GET The file name path extension*/
                $extension=pathinfo($file_name,PATHINFO_EXTENSION);

                /* SET The file Valid extension*/
                $valid_extension=array("jpg","jpeg","gif","png");

                /* SET The file Size*/
                $maxSize=2*1024*1024;
                /* Check The file Size*/
                if($file_size >$maxSize){
                    echo 2;
                }else{
                    if (in_array($extension,$valid_extension)) {
                        $new_name=rand().".".$extension;
                        $site_logo_path="image/".$new_name;
                        move_uploaded_file($_FILES['update_site_logo']['tmp_name'],$site_logo_path);

                        // Delete the old image file if it exists
                        if (file_exists($_POST['old_site_logo'])) {
                            unlink('./'.$_POST['old_site_logo']);
                        } 

                    }else{
                        // 'Invalid file extension.';
                        echo 0;
                    }
                }
            }else{
                $site_logo_path= $_POST['old_site_logo'];
            }
            
            $this->db->set('name', $name);
            $this->db->set('image', $path);
            $this->db->set('resume_upload', $resume);
            $this->db->set('site_title', $title);
            $this->db->set('site_logo', $site_logo_path);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('profile');
            echo 1;
            exit; 
        }
    }




}


?>