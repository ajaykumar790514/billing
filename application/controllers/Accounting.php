<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller
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
    public function EmployeePayout($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Employees Details';
            $data['employees'] =   $this->admin_model->getData('emp_details',['is_deleted'=>'NOT_DELETED'],'asc','emp_name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/accounting/EmployeePayout');
            $this->load->view('template/includes/footer');
            break;
            default:
        // code...
        break;
        }
    }
    public function EmployeeDetails($action=null,$p1=null)
    { 
        switch ($action) {
            case 'Details':
            $data['title'] 			= 'Employee Payout';
            $data['employees'] =   $this->admin_model->getRow('emp_details',['is_deleted'=>'NOT_DELETED', 'id'=>$p1]);
            $data['departments'] =   $this->admin_model->getRow('department',['is_deleted'=>'NOT_DELETED', 'id'=>$data['employees']->department]);
            $data['emp_docs'] =   $this->admin_model->getRow('emp_doc',['emp_id'=>$data['employees']->id]);
            $data['salarydetails'] =   $this->admin_model->getData('emp_salary',['emp_id'=>$data['employees']->id]);
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/accounting/EmployeeDetails');
            $this->load->view('template/includes/footer');
            break;
            case 'save':
                //echo "HEllo";die();
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') 
                {
                    if($this->input->post('bank') && $this->input->post('ifsc') && $this->input->post('account')){
                    $data = array(
                      'emp_id'     => $this->input->post('emp_id'),
                      'month'     => $this->input->post('month'),
                      'date'     => $this->input->post('date'),
                      'amount'     => $this->input->post('amount'),
                      'status'     =>'2',
                    );
                  
                        if($insert_id = $this->admin_model->Save('emp_salary',$data)){
                            $prefix = 'SALARY';
                            $formatted_id = sprintf('%05d', $insert_id);
                            $uniqueCode = $prefix . $formatted_id;
                            $update['salary_no'] = $uniqueCode;
                            $this->admin_model->Update('emp_salary',$update,['id'=>$insert_id]);
                            $trdata = array(
                                'emp_id'     => $this->input->post('emp_id'),
                                'ref_id'     => $insert_id,
                                'tr_date'     => $this->input->post('date'),
                                'amount'     => $this->input->post('amount'),
                                'type'     =>'salary',
                                'status'      =>'2'
                              );
                              $this->admin_model->Save('transaction',$trdata);
                            $return['res'] = 'success';
                            $return['msg'] = 'Payment successfully.';
                        }
                    
                }else
                {
                    $return['res'] = 'error';
                    $return['msg'] = 'Sorry ! Please fill employee account details .';
                }
            }
                echo json_encode($return);
            break;

            default:
        // code...
        break;
        }
    }
    public function TotalCollection($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Total Collection';
            $data['indorders'] =   $this->admin_model->getNormalSales();
            $data['orders'] =   $this->admin_model->getClientSales();
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/accounting/TotalCollection');
            $this->load->view('template/includes/footer');
            break;
              
                default:
            // code...
            break;
        }
    }
    public function SalaryInvoice($action=null,$p1=null)
   {
       switch ($action) {
           case 'Slip':
           $data['title'] 			= 'Salary Slip Invoice';
           $data['salary'] = $this->admin_model->salary_invoice($p1);
           $this->load->view('template/accounting/salary_invoice',$data);
           break;
             
               default:
           // code...
           break;
       }
   }
   public function fetch_data_ajax()
   {
       $start_date = $this->input->post('start_date');
       $end_date = $this->input->post('end_date');
       $data = $this->admin_model->get_data_by_date_range($start_date, $end_date);

       echo json_encode($data);
   }

   public function CreateAccount($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Create Account';
           $data['accounts'] =   $this->admin_model->getData('root_account',['is_deleted'=>'NOT_DELETED',],'asc','name');
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/accounting/CreateAccount');
           $this->load->view('template/includes/footer');
           break;
           case 'save':
            $id=$p1;
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
            $saved = 0;
            if ($this->input->server('REQUEST_METHOD')=='POST') {
                $data = array(
                  'name'     => $this->input->post('account_name'),
                  'root_account	'     => $this->input->post('root_account'),
                );
                if ($id!=null) {
                    if($this->admin_model->Update('office_account',$data,['id'=>$id])){
                        $return['res'] = 'success';
                        $return['msg'] = 'Account updated Successfullly.';
                    }
                }else
                {
                    if($item_id = $this->admin_model->Save('office_account',$data)){
                        $return['res'] = 'success';
                        $return['msg'] = 'Account created Successfullly.';
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
   public function ManageAccount($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Manage Account';
           $data['accounts'] =   $this->admin_model->getData('office_account',['is_deleted'=>'NOT_DELETED',],'asc','name');
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/accounting/ManageAccount');
           $this->load->view('template/includes/footer');
           break;
           case 'save':
            $id=$p1;
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
            $saved = 0;
            if ($this->input->server('REQUEST_METHOD')=='POST') {
                $data = array(
                  'name'     => $this->input->post('account_name'),
                  'root_account	'     => $this->input->post('root_account'),
                );
                if ($id!=null) {
                    if($this->admin_model->Update('office_account',$data,['id'=>$id])){
                        $return['res'] = 'success';
                        $return['msg'] = 'Account updated Successfullly.';
                    }
                }else
                {
                    if($item_id = $this->admin_model->Save('office_account',$data)){
                        $return['res'] = 'success';
                        $return['msg'] = 'Account created Successfullly.';
                    }
                }
            }
            echo json_encode($return);
            break;
            case 'delete':
                $this->admin_model->_delete('office_account',['id'=>$p1]); 
                $data['accounts'] =   $this->admin_model->getData('office_account',['is_deleted'=>'NOT_DELETED'],'asc','name');
                $this->session->set_flashdata('cusmsg','Account deleted');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/accounting/ManageAccount');
                $this->load->view('template/includes/footer');
            break;
            default:
           // code...
           break;
       }
   }
   public function Payment($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Create Account';
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/accounting/Payment');
           $this->load->view('template/includes/footer');
           break;
             
               default:
           // code...
           break;
       }
   }
   public function ManageTransition($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Manage Transition';
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/accounting/ManageTransition');
           $this->load->view('template/includes/footer');
           break;
             
               default:
           // code...
           break;
       }
   }
   public function RootAccount($action=null,$p1=null)
    {
        switch ($action) {
        case null:
        $data['title'] 			= 'Root Account Master';
        $data['accounts'] =   $this->admin_model->getData('root_account',['is_deleted'=>'NOT_DELETED'],'asc','name');
        $this->load->view('template/includes/header');
        $this->load->view('template/accounting/RootAccount',$data);
        $this->load->view('template/includes/footer');
        break;
            case 'save':
            $id=$p1;
            $return['res'] = 'error';
            $return['msg'] = 'Not Saved!';
            $saved = 0;
            if ($this->input->server('REQUEST_METHOD')=='POST') {
                $data = array(
                'name'     => $this->input->post('root_account')
                );

                if ($id!=null) {
                    if($this->admin_model->Update('root_account',$data,['id'=>$id])){
                        $saved = 1;
                    }
                }else{
                    if($item_id = $this->admin_model->Save('root_account',$data)){
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
            $this->admin_model->_delete('root_account',['id'=>$p1]); 
            $data['accounts'] =   $this->admin_model->getData('root_account',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->session->set_flashdata('deletemsg','Root account deleted .');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/accounting/RootAccount',$data);
            $this->load->view('template/includes/footer');
            break;
                default:
            // code...
            break;
        }
    }
}