<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SectionOneController extends CI_Controller{
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
        $sql = "SELECT * FROM `table1` WHERE user_id=$this->user_id";
        $query = $this->db->query($sql);
        $data['data'] = $query->result(); // Fetch the result
        $this->load->view('admin/pages/About/Section_one', $data);
       
    }
    public function get_data(){
        if (isset($_GET['get_data'])) {
            $id=$_GET['id'];
            $query =$this->db->query("SELECT * FROM table1 WHERE id='$id'");
           echo json_encode($query->result());
           exit; 
        }
    }
    public function delete_data(){
        if (isset($_POST['delete_data'])) {
            $id= $_POST['id'];
            $this->db->delete('table1', array('id' => $id));
            echo 1;
            exit;
        }
    }

    public function add_data(){
        if (isset($_POST['add_data'])) {

            $title=$_POST['title'];
            $add_icon=$_POST['add_icon'];
            $add_completed_count=$_POST['add_completed_count'];
            
            $data = array(
                'title' => $title,
                'icon' => $add_icon,
                'complete_count' => $add_completed_count,
                'user_id' => $this->user_id,
            );
            /* Insert The data */
            $this->db->insert('table1', $data);
            //insert successfully; 
            echo 1;
            exit;
         
        }

    }

    public function update_data(){
        if (isset($_POST['update_data'])) {
            $id=$_POST['update_id'];
            $title=$_POST['update_title'];
            $icon=$_POST['update_icon'];
            $completed_count=$_POST['update_completed_count'];

           
            $this->db->query("UPDATE `table1` SET `title`='$title',`icon`='$icon',`complete_count`='$completed_count' WHERE id='$id' "); 
            echo 1;
        }
    }




}


?>