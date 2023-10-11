<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller{
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
        $sql = "SELECT * FROM blog_post WHERE user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/Blog', $data);
    }
    public function add_blog(){
        if (isset($_POST['add_data'])) {

            $title=$_POST['title'];
            $description=$_POST['description'];
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
                            'title' => $title,
                            'description' => $description,
                            'image' => $path,
                            'user_id' => $this->user_id,
                            'create_date'=>date("Y-m-d"),
                            'status' => $status,
                        );
                        /* Insert The data blog table Database*/
                        $this->db->insert('blog_post', $data);
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
    public function update_blog(){
        if (isset($_POST['update_data'])) {
           $id=$_POST['update_blog_id'];
          $title = $_POST['update_title'];
            $description = $_POST['update_description'];
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
                   }
               }
           }else{
               $path= $_POST['old_image'];
           }
            
            $this->db->set('title', $title);
            $this->db->set('description', $description);
            $this->db->set('image', $path);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('blog_post');
            
           echo 1;
           exit;
       }
    }
    public function delete_data(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('blog_post', array('id' => $id));
            echo 1;
            exit;
        }
    }
    public function blog_get(){
        if (isset($_GET['get_blog_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM blog_post WHERE id='$id'");
           echo json_encode($query->result());
            exit;
        } 
    }
    

}