<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
   

    public function index()
    {
        // $this->load->library('form_validation');
        $this->load->view('auth/login');
    }
    public function authenticate()
    {
        $this->load->library('form_validation');
        $this->load->model('Admin_model');

        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==true)
        {
            //Success
            $username = $this->input->post('username');
            $admin = $this->Admin_model->getByUsername($username);
           
            if(!empty($admin))
            {
                $password = $this->input->post('password');
                if(password_verify($password,$admin['password'])==true)
                {
                    $adminArray['admin_id'] = $admin['id'];
                    $adminArray['username'] = $admin['username'];
                    $this->session->set_userdata('admin',$adminArray);
                        $Sessions = array(
                        'MUserId' =>  $admin['id'],
                        'MEmail' => $admin['username'],
                        'MName' => $admin['name'],
                        'MContact' => $admin['contact'],
                        'MLogo' => $admin['logo'],
                        'MLogin' => true);
                    $this->session->set_userdata($Sessions);
                    redirect(base_url('dashboard'));
                }
                else
                {
                    $this->session->set_flashdata('msg','Either username or password is incorrect');
                    redirect(base_url().'login/index');
                }
            }
            else
            {
                $this->session->set_flashdata('msg','Either username or password is incorrect');
                redirect(base_url().'login/index');
            }
        }
        else
        {
            // Form Error
            $this->load->view('admin/login');
        }
    }
    
    function logout()
    {
        unset($this->session->MLogin);
		session_destroy();
        redirect(base_url().'login/index');
    }
}