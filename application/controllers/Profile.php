<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('Lib');
        $admin = $this->session->userdata('MUserId');
        if(empty($admin))
        {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'login/index');
        }
    }
	public function index($action=null,$p1=null,$p2=null,$p3=null)
	{
		switch ($action) {
			case null:
				$data['title']      = 'Edit Profile';
				$this->load->view('template/includes/header',$data);
                $this->load->view('template/users/profile');
                $this->load->view('template/includes/footer');
				break;

			case 'update':
				$id = $_SESSION['MUserId'];
				$return['res'] = 'error';
				$return['msg'] = 'Not Saved!';
				if ($this->input->server('REQUEST_METHOD')=='POST') {

						$config['file_name'] = rand(10000, 10000000000);
						$config['upload_path'] = UPLOAD_PATH.'users/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
			
						if (!empty($_FILES['photo']['name'])) {
							//upload images
							$_FILES['photos']['name'] = $_FILES['photo']['name'];
							$_FILES['photos']['type'] = $_FILES['photo']['type'];
							$_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
							$_FILES['photos']['size'] = $_FILES['photo']['size'];
							$_FILES['photos']['error'] = $_FILES['photo']['error'];
			
							if ($this->upload->do_upload('photos')) {
								$image_data = $this->upload->data();
								$fileName = "users/" . $image_data['file_name'];
							}
						  $_POST['logo'] = $fileName;
						} 
						if (@$_POST) {
							if($this->admin_model->Update('admins',$_POST,['id'=>$id])){
								$return['res'] = 'success';
								$return['msg'] = 'Profile updated successfully !!.';
							}	
						}
					
				}
				echo json_encode($return);
				break;

			case 'change-password':
				$id = $_SESSION['MUserId'];
				$user =$this->admin_model->getRow('admins',['id'=>$_SESSION['MUserId']]);
				$return['res'] = 'error';
				$return['msg'] = 'Not Saved!';
				if (@$_POST['old_password'] && @$_POST['password'] && @$_POST['conf_password']) {
					if ($_POST['password'] == $_POST['conf_password']) {
						if ($_POST['old_password'] == $this->encryption->decrypt(@$user->password)) {
							$updatePassword['password'] =$this->encryption->encrypt($_POST['password']) ;
							if($this->admin_model->Update('admins',$updatePassword,['id'=>$id])){
								$return['res'] = 'success';
								$return['msg'] = 'Password changed successfully. Login Again.';
                                unset($this->session->MLogin);
                                session_destroy();
                                redirect(base_url().'login/index');
							}
						}
						else{
							$return['res'] = 'error';
							$return['msg'] = 'Incorrect old password!';
						}
					}
					else{
						$return['res'] = 'error';
						$return['msg'] = 'Confirm password not match!';
					}
				}
				else{
					$return['res'] = 'error';
					$return['msg'] = 'Please fill in all mandatory fields!';
				}
				echo json_encode($return);

				break;
			
			default:
				// code...
				break;
		}
	}

}

 ?>