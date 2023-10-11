<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller{
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
        $sql = "SELECT * FROM about WHERE user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/About', $data);
    }
    public function add_about(){
        if (isset($_POST['add_data'])) {

            $title=$_POST['title'];
            $description=$_POST['description'];
            $phone=$_POST['phone'];
            $website=$_POST['website'];
            $age=$_POST['age'];
            $city=$_POST['city'];
            $degree=$_POST['degree'];
            $status=$_POST['status'];



            /* GET THE FILE NAME AND SIZE */
            $file_name= $_FILES['file']['name'];
            $file_size= $_FILES['file']['size'];

            /* GET The file name path extension*/
            $extension=pathinfo($file_name,PATHINFO_EXTENSION);

            /* SET The file Valid extension*/
            $valid_extension=array("jpg","jped","gif","png");

            /* SET The file Size*/
            $maxSize=2*1024*1024;
            /* Check The file Size*/
            if($file_size >$maxSize){
                echo 2;
                exit;
            }else{
                 if (in_array($extension,$valid_extension)) {
                    $new_name=rand().".".$extension;
                    $path="image/".$new_name;
                    $result=move_uploaded_file($_FILES['file']['tmp_name'],$path);
                    if ($result) {
                        $data = array(
                            'image' => $path,
                            'title' => $title,
                            'description' => $description,
                             'user_id' => $this->user_id,
                            'phone' => $phone,
                            'website' => $website,
                            'age' => $age,
                            'city' => $city,
                            'degree' => $degree,
                            'status' => $status,
                        );
                        /* Insert The data services table Database*/
                        $this->db->insert('about', $data);
                        //insert successfully; 
                        echo 1;
                        exit;
                    } else {
                        //'Error moving the uploaded file.'; 
                        echo 3;
                        exit;
                    }
                }else{
                    // 'Invalid file extension.';
                    echo 0;
                    exit;
                }
            }
         
        }

    }

    public function delete_about(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('about', array('id' => $id));
            echo 1;
            exit;
        }
    }
    public function get_about(){
        if (isset($_GET['get_about_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM about WHERE id='$id'");
           echo json_encode($query->result());
           exit;
        }
    }
    
    public function update_about(){
        if (isset($_POST['update_data'])) {

            $id=$_POST['update_about_id'];
            $title=$_POST['update_title'];
            $description=$_POST['update_description'];
            $website=$_POST['update_website'];
            $phone=$_POST['update_phone'];
            $degree=$_POST['update_degree'];
            $age=$_POST['update_age'];
            $city=$_POST['update_city'];
           


            $status=$_POST['update_status'];
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
                        exit;
                    }
                }
            }else{
                $path= $_POST['old_image'];
            }
            
            $this->db->query("UPDATE `about` SET `title`='$title',`description`='$description',`image`='$path',`website`='$website',`phone`='$phone',`age`='$age',`degree`='$degree',`city`='$city',`status`='$status' WHERE id='$id' "); 
            echo 1;
            exit;
        }

    }
    
}