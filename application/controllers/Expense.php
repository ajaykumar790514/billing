<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller
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
    public function ExpenseItem($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Expense Items';
            $data['expenses'] =   $this->admin_model->getData('expense_item',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/Expense/ExpenseItem');
            $this->load->view('template/includes/footer');
            break;
            case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') {
                    $data = array(
                      'name'     => $this->input->post('exp_name'),
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('expense_item',$data,['id'=>$id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Expense Item updated.';
                        }
                    }else
                    {
                        if($item_id = $this->admin_model->Save('expense_item',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Expense Item added successfullly.';
                        }
                    }
                }
                echo json_encode($return);
                break;
                case 'delete':
                    $this->admin_model->_delete('expense_item',['id'=>$p1]); 
                    $data['expenses'] =   $this->admin_model->getData('expense_item',['is_deleted'=>'NOT_DELETED'],'asc','name');
                    $this->session->set_flashdata('deletemsg','Expense item deleted.');
                    $this->load->view('template/includes/header', $data);
                    $this->load->view('template/Expense/ExpenseItem');
                    $this->load->view('template/includes/footer');
                break;
                
            default:
        // code...
        break;
        }
    }
    public function AddExpense($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Add Expense';
            $data['expenses'] =   $this->admin_model->getData('expense_item',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/Expense/AddExpense');
            $this->load->view('template/includes/footer');
            break;
            case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') {
                    $data = array(
                      'expense_item_id'     => $this->input->post('exp_id'),
                      'date'     => $this->input->post('date'),
                      'amount'     => $this->input->post('amount'),
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('add_expense',$data,['id'=>$id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Expense updated.';
                        }
                    }else
                    {
                        if($item_id = $this->admin_model->Save('add_expense',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Expense added successfullly.';
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
    public function ManageExpense($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Manage Expense';
            $data['expenses'] =   $this->admin_model->getData('add_expense',['is_deleted'=>'NOT_DELETED'],'asc','date');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/Expense/ManageExpense');
            $this->load->view('template/includes/footer');
            break;
            default:
        // code...
        break;
        }
    }
    public function ExpenseStatement($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Manage Expense';
            $data['expenses'] =   $this->admin_model->getData('expense_item',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/Expense/ExpenseStatement');
            $this->load->view('template/includes/footer');
            break;
            default:
        // code...
        break;
        }
    }
   
}