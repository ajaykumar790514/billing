<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Admin_model');
        $this->load->model('lib_model');
        $this->load->library('Lib');
        $admin = $this->session->userdata('MUserId');
        if(empty($admin))
        {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'login/index');
        }
    }

    public function dashboard()
    {
        
       $admin = $this->session->userdata('MUserId');

       $sql="SELECT COUNT(*) AS emp_name FROM emp_details ";
	    $data['employees'] = $this->lib_model->Execute($sql, array())->result();
       $data['title']='BILLING MANAGEMENT SYSTEM';
       $data['graph']    =$this->Admin_model->getYearSales('2024');
       $data['purchase_last']    = $this->Admin_model->getLastMonthPurchase();
       $data['purchase_this']    = $this->Admin_model->getCurrentMonthPurchase();
       $data['currentMonthSales'] = $this->Admin_model->getCurrentMonthSales();
       $data['lastMonthSales'] = $this->Admin_model->getLastMonthSales();
       $this->load->view('template/includes/header', $data);
       $this->load->view('template/includes/dashboard2');
       $this->load->view('template/includes/footer');
    }
    public function UserProfile($action=null,$p1=null)
    {
       switch ($action) 
       {
            case null:
            $data['title'] 			= 'User Profile';
            $data['users'] =   $this->admin_model->getData('admins',0,'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/users/profile');
            $this->load->view('template/includes/footer');
            break;
                case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') 
                {
                    $data = array(
                    'name'     => $this->input->post('sub_cat'),
                    'is_parent'     => $this->input->post('cat_id')
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('category',$data,['id'=>$id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Sub Category Updated .';
                        }
                    }
                    else
                    {
                        if($item_id = $this->admin_model->Save('category',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Sub Category added successfully.';
                        }
                    }
                }
                echo json_encode($return);
            break;
                default:
            // code...
            break;
        }
    }
    public function HrmDashboard()
    {
      $data['title']='HRM Dashboard';
       $this->load->view('template/includes/header', $data);
       $this->load->view('template/hrm/HrmDashboard');
       $this->load->view('template/includes/footer');
    }
    public function EmpList()
    {
       $data['employees'] =   $this->admin_model->getData('emp_details',['is_deleted'=>'NOT_DELETED'],'asc','emp_name');
      $data['title']='Employee List';
       $this->load->view('template/includes/header', $data);
       $this->load->view('template/hrm/Emplist');
       $this->load->view('template/includes/footer');
    }
    public function AddEmployee()
    {
        $data['departs'] =   $this->admin_model->getData('department',['is_deleted'=>'NOT_DELETED'],'asc','name');
      $data['title']='Add Employee';
       $this->load->view('template/includes/header' ,$data);
       $this->load->view('template/hrm/AddEmployee');
       $this->load->view('template/includes/footer');
    }
    
    public function InsertEmployee()
    {
        $rules = array(
			array('field' => 'emp_name', 'label' => 'emp_name', 'rules' => 'required'),
		);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) 
		{
			$Msg = array('Msg' => validation_errors(), 'Type' => 'danger');
			$this->session->set_flashdata($Msg);
			redirect(base_url() . '');    
		} 
		else
		{ 
		   $emp_name = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('emp_name'))));
		   $mobile = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('mobile'))));
		   $email = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('email'))));
		   $department = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('department'))));
           $address = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('address'))));

			$f_other = array(
				// specify fields and values for the other table
				'emp_name' => $emp_name,
				'mobile' =>  $mobile ,
				'email' => $email,
				'department' => $department,
                'address' => $address,
			);
				$this->lib_model->Insert('emp_details', $f_other);
		
				$this->session->set_flashdata('msg','Employee added successfully.');
                    redirect(base_url().'employees');
		}
    }
    public function EditEmployee($emp_id)
    {
        // $data['employees'] =   $this->admin_model->getData('emp_details',['is_deleted'=>'NOT_DELETED'],'asc','emp_name');
        $data['title']='Edit  Employee';
        $data['users'] = $this->admin_model->getRow('emp_details',['id'=>$emp_id]);
        $data['department'] =   $this->admin_model->getData('department',['is_deleted'=>'NOT_DELETED']);
        $this->load->view('template/includes/header', $data);
        $this->load->view('template/hrm/EditEmployee');
        $this->load->view('template/includes/footer');
    }
    public function UpdateEmployee($emp_id) 
	{
		$rules = array(
			array('field' => 'emp_name', 'label' => 'emp_name', 'rules' => 'required'),
			array('field' => 'mobile', 'label' => 'mobile', 'rules' => 'required'),
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$Msg = array('Msg' => validation_errors(), 'Type' => 'danger');
			$this->session->set_flashdata($Msg);
			redirect(base_url() . 'edit-employee/'.$emp_id);
		} 
		else 
		{
            // Check if the user already exists
            if ($this->lib_model->user_exists($emp_id)) {
                // Update user
                // $this->lib_model->update_user($user_id);
                $id = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('id'))));
                $emp_name = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('emp_name'))));
                $mobile = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('mobile'))));
                $email = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('email'))));
                $department = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('department'))));
                $address = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('address'))));
				$f = array
				(
					// 'USERID' =>$USERID,
					'emp_name' => $emp_name,
					'mobile'=>  $mobile,
					'email'=>  $email,
                    'department'=> $department,
                    'address'=> $address
				);
				$this->admin_model->Update('emp_details', $f , array('id'=>$emp_id));

				$this->session->set_flashdata('msg','Employee updated successfully.');
                redirect(base_url('employees'));
            } 
			else 
			{
			
            }
		}
    }
    public function DeleteEmp($id)
    {
       $this->admin_model->_delete('emp_details',['id'=>$id]); 
       $data['employees'] =   $this->admin_model->getData('emp_details',['is_deleted'=>'NOT_DELETED'],'asc','emp_name');
       $this->session->set_flashdata('deletemsg','Employee deleted .');
       $this->load->view('template/includes/header', $data);
       $this->load->view('template/hrm/Emplist');
       $this->load->view('template/includes/footer');
    }
    public function Attendence()
    {
        $data['employees'] =   $this->admin_model->getData('emp_details',['is_deleted'=>'NOT_DELETED'],'asc','emp_name');
        $data['title']='Employee Attendance';
        $data['att'] = $this->admin_model->getAtt();
        $this->load->view('template/includes/header',$data);
        $this->load->view('template/hrm/attendence');
        $this->load->view('template/includes/footer');
    }
    public function holiday_master()
    {
        $this->load->view('template/includes/header');
        $this->load->view('template/hrm/holiday_master');
        $this->load->view('template/includes/footer');
    }
    public function submit_emp_doc()
    {
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';
        $saved = 0;
        if ($this->input->server('REQUEST_METHOD')=='POST') {

            $config['file_name'] = rand(10000, 10000000000);
            $config['upload_path'] = UPLOAD_PATH.'emp/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!empty($_FILES['doc']['name'])) {
                //upload images
                $_FILES['docs']['name'] = $_FILES['doc']['name'];
                $_FILES['docs']['type'] = $_FILES['doc']['type'];
                $_FILES['docs']['tmp_name'] = $_FILES['doc']['tmp_name'];
                $_FILES['docs']['size'] = $_FILES['doc']['size'];
                $_FILES['docs']['error'] = $_FILES['doc']['error'];

                if ($this->upload->do_upload('docs')) {
                    $image_data = $this->upload->data();
                    $fileName = "emp/" . $image_data['file_name'];
                }
              $docs=  $data['doc'] = $fileName;
            } else {
                $docs= $data['doc'] = "";
            }

            $config['file_name'] = rand(10000, 10000000000);
            $config['upload_path'] = UPLOAD_PATH.'doc/';
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
                    $fileName = "emp/" . $image_data['file_name'];
                }
              $photo=  $data['photo'] = $fileName;
            } else {
                $photo= $data['photo'] = "";
            }


            $data = array(
              'emp_id'             => $this->input->post('emp_id'),
              'bank_name'          => $this->input->post('bank_name'),
              'account_number'     => $this->input->post('account_number'),
              'ifsc_code'          => $this->input->post('ifsc'),
              'aadhaar_no'         => $this->input->post('aadhaar_no'),
              'aadhaar_pic'        => $docs,
              'passbook'           => $photo,

            );
            // if ($id!=null) {
            //     if($this->admin_model->Update('emp_doc',$data,['id'=>$id])){
            //         $saved = 1;
            //     }
            // }else{
                if($this->admin_model->Save('emp_doc',$data)){
                    $saved = 1;
                }
            // }
            
            if ($saved == 1 ) {
                $return['res'] = 'success';
                $return['msg'] = 'Saved.';
            }
        }

        echo json_encode($return);
    }

    public function department($action=null,$p1=null)
    {
    switch ($action) {
    case null:
    $data['title'] 			= 'Department Master';
    $data['department'] =   $this->admin_model->getData('department',['is_deleted'=>'NOT_DELETED'],'asc','name');
    $this->load->view('template/includes/header');
    $this->load->view('template/master/department/index',$data);
    $this->load->view('template/includes/footer');
    break;
        case 'save':
        $id=$p1;
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';
        $saved = 0;
        if ($this->input->server('REQUEST_METHOD')=='POST') {
            $data = array(
              'name'     => $this->input->post('department')
            );

            if ($id!=null) {
                if($this->admin_model->Update('department',$data,['id'=>$id])){
                    $saved = 1;
                }
            }else{
                if($item_id = $this->admin_model->Save('department',$data)){
                    $saved = 1;
                }
            }
            
            if ($saved == 1 ) {
                $return['res'] = 'success';
                $return['msg'] = 'Saved.';
            }
        }

        echo json_encode($return);
        break;
       case 'delete':
        $this->admin_model->_delete('department',['id'=>$p1]); 
        $data['department'] =   $this->admin_model->getData('department',['is_deleted'=>'NOT_DELETED'],'asc','name');
        $this->session->set_flashdata('deletemsg','Employee deleted .');
        $this->load->view('template/includes/header', $data);
        $this->load->view('template/master/department/index',$data);
        $this->load->view('template/includes/footer');
        break;
			default:
    // code...
    break;
    // =======
    //             $response = array('res' => 'success', 'msg' => 'Employee Document submitted successfully');
    //             echo json_encode($response);
        }
    }
    public function InsertAttendence() 
	{
        $return['res'] = 'error';
        $return['msg'] = 'Not Saved!';
        $saved = 0;
        if ($this->input->server('REQUEST_METHOD')=='POST') {
		$rules = array(
			array('field' => 'emp_id', 'label' => 'emp_id', 'rules' => 'required'),
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$Msg = array('Msg' => validation_errors(), 'Type' => 'danger');
            $return['res'] = 'error';
            $return['msg'] ='Please select Emp';
            echo json_encode($return);
            die();
		} 
		else 
		{
                $emp_id = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('emp_id'))));
                $punch_in = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('punch_intime'))));
                $date = strtoupper($this->security->xss_clean($this->lib->validate($this->input->post('punch_date'))));
                $status = $this->input->post('status');
                $count1= $this->lib_model->Counter('emp_att', array('emp_id'=> $emp_id,'punch_date'=>date('Y-m-d') ));
                if($count1==0){
                    if($punch_in !='' && $status !='0' && $status !='2' && $status !='3' )
                    {
                        $f = array
                        (
                            'emp_id' => $emp_id,
                            'punch_intime'=>  $punch_in,
                            'punch_date'=> $date,
                            'att_status'=>'1',
                        );
                    }
                    else if($punch_in =='' && $status =='0' && $status !='2' && $status !='3' )
                    {
                        $f = array
                        (
                            'emp_id' => $emp_id,
                            'punch_intime'=>  $punch_in,
                            'punch_date'=> $date,
                            'att_status'=>'0',
                        );
                    }
                    else if($punch_in =='' && $status !='0' && $status =='2' && $status !='3' )
                    {
                        $f = array
                        (
                            'emp_id' => $emp_id,
                            'punch_intime'=>  $punch_in,
                            'punch_date'=> $date,
                            'att_status'=>'2',
                        );
                    }
                    else if($punch_in =='' && $status !='0' && $status !='2' && $status =='3' )
                    {
                        $f = array
                        (
                            'emp_id' => $emp_id,
                            'punch_intime'=>  $punch_in,
                            'punch_date'=> $date,
                            'att_status'=>'3',
                        );
                    }
                    if($this->lib_model->Insert('emp_att', $f))
                    {
                        $saved=1;
                    }
                    if ($saved == 1 ) {
                        $return['res'] = 'success';
                        $return['msg'] = 'Employee attendence added successfully';
                    }
                }
                else{
                    $return['res'] = 'error';
                    $return['msg'] = 'Sorry Today Already Punch In  This Employee Attendance';
                }
		   }
        }
        echo json_encode($return);
    }

    public function att_punch_out($p1)
    {
            $id=$p1;
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
            $saved = 0;
            if ($this->input->server('REQUEST_METHOD')=='POST') {
                $data = array(
                  'punchout_time'     => $this->input->post('time')
                );
                    if($this->admin_model->Update('emp_att',$data,['id'=>$id])){
                        $saved = 1;
                    }
               
                if ($saved == 1 ) {
                    $return['res'] = 'success';
                    $return['msg'] = 'Punch Out Successfully.';
                }
            }
    
            echo json_encode($return);
    }

 
}