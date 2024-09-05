<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller
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
    public function PurchaseMaster($action=null,$p1=null)
    { 
        switch ($action) {
            case null:
            $data['title'] 			= 'Add Purchase';
            $data['suppliers'] =   $this->admin_model->getData('suppliers',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/Purchase/AddPurchase');
            $this->load->view('template/includes/footer');
            break;
              
            default:
        // code...
        break;
        }
    
    }
    public function ManagePurchase($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Manage Purchase';
            $data['orders']         = $this->Admin_model->getData('purchase',0);
            $this->load->view('template/includes/header',$data);
            $this->load->view('template/Purchase/ManagePurchase');
            $this->load->view('template/includes/footer');
            break;
              
                default:
            // code...
            break;
        }
    }

    public function OrderSubmit()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $response = array(
                'success' => false,
                'message' => 'Failed to process the order.'
            );
    
            $post = $this->input->post();
            if (isset($_SESSION['MUserId'], $post['FinalTotal'], $post['pur_details'], $post['pur_no'], $post['pur_date'], $post['sup_id'])) {
                if(!empty($post['sup_id']) ){
                    if($post['FinalTotal']  > 0){
                    $orderdata = array(
                    'user_id' => $_SESSION['MUserId'],
                    'purchase_no'=>@$post['pur_no'],
                    'sup_id'=>@$post['sup_id'],
                    'details' => $post['pur_details'],
                    'status' => '2',
                    'payment_status' => '2',
                    'date' => $post['pur_date'],
                    'total'=>$post['FinalTotal'],
                );
    
                if ($insert_id = $this->admin_model->Save('purchase', $orderdata)) {
                    $prefix = 'PURCHASE';
                    $formatted_id = sprintf('%05d', $insert_id);
                    $uniqueCode = $prefix . $formatted_id;
                    $update['invoice_no'] = $uniqueCode;
                    $this->admin_model->Update('purchase', $update, ['id' => $insert_id]);
                    $this->admin_model->Save('transaction',['ref_id'=>$insert_id,'amount'=>$post['FinalTotal'],'status'=>'2','type'=>'purchase','order_id'=>$insert_id,'tr_date'=>$post['pur_date']]);
                    
                    foreach ($post['srno'] as $key => $value) {
                            $data = array(
                                'purchase_id' => $insert_id,
                                'name' => $post['pro_name'][$key],
                                'rate' => $post['rate'][$key],
                                'total' => $post['total'][$key],
                                'qty' => $post['qty'][$key],
                            );
    
                        $this->admin_model->Save('purchase_items', $data); }
                    }
    
                    $response['success'] = true;
                    $response['message'] = 'Purchased successfully!';
                    $response['invoice_no']=$uniqueCode;
               }else{
                $response['success'] = false;
                $response['message'] = 'Please Total Paidable Amount!';
               }
              }else
              {
                    $response['success'] = false;
                    $response['message'] = 'Please select supplier!';
              }
            } else {
                $response['success'] = false;
                $response['message'] = 'Invalid session or missing required data.';
            }
    
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $response['success'] = false;
            $response['message'] = 'Invalid request method.';
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }
}