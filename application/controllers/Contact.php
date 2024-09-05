<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
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
    public function ContactDashbaord()
    {
        $data['title'] 			= 'Contact Dashboard';
       $this->load->view('template/includes/header', $data);
       $this->load->view('template/contacts/dashboard');
       $this->load->view('template/includes/footer');
    }
    public function Customer($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Customer Master';
            $data['customers'] =   $this->admin_model->getData('customers',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header');
            $this->load->view('template/contacts/AddCustomer', $data);
            $this->load->view('template/includes/footer');
            break;
                case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') {
                    $data = array(
                      'name'     => $this->input->post('cus_name'),
                      'permanant_number'     => $this->input->post('mobile'),
                      'email'     => $this->input->post('email'),
                      'alternate_number	'     => $this->input->post('phone'),
                      'gst_no'     => $this->input->post('gst'),
                      'tax_no	'     => $this->input->post('tax'),
                      'credit_limit	'     => $this->input->post('credit'),
                      'previous_deu'     => $this->input->post('previous_due'),
                      'address_country'     => $this->input->post('add_country'),
                      'address_state'     => $this->input->post('add_state'),
                      'address_city'     => $this->input->post('add_city'),
                      'address_pincode'     => $this->input->post('add_pincode'),
                      'address1	'     => $this->input->post('add_address'),
                      'address_landmark'     => $this->input->post('add_landmark'),
                      'shipping_address'     => $this->input->post('ship_address'),
                      'shipping_country'     => $this->input->post('ship_country'),
                      'shipping_state'     => $this->input->post('ship_state'),
                      'shipping_city'     => $this->input->post('ship_city'),
                      'shipping_pincode'     => $this->input->post('ship_pincode'),
                      'shipping_landmark'     => $this->input->post('ship_landmark'),
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('customers',$data,['id'=>$id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Customer updated successfullly.';
                        }
                    }else
                    {
                        if($item_id = $this->admin_model->Save('customers',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Customer added Successfullly.';
                        }
                    }
                    // if ($saved == 1 ) {
                    //     $return['res'] = 'success';
                    //     $return['msg'] = 'Customer added Successfullly.';
                    // }
                }
                echo json_encode($return);
                break;

                case "list":
                    $data['customers'] =   $this->admin_model->getData('customers',['is_deleted'=>'NOT_DELETED'],'asc','name');
                    $this->load->view('template/includes/header');
                    $this->load->view('template/contacts/CustomersList', $data);
                    $this->load->view('template/includes/footer');
                break;

               case 'delete':
                $this->admin_model->_delete('customers',['id'=>$p1]); 
                $data['customers'] =   $this->admin_model->getData('customers',['is_deleted'=>'NOT_DELETED'],'asc','name');
                $this->session->set_flashdata('cusmsg','Customer deleted.');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/contacts/CustomersList');
                $this->load->view('template/includes/footer');
            break;
                default:
            // code...
            break;
        }
    }
    public function Supplier($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Supplier Master';
            $data['suppliers'] =   $this->admin_model->getData('suppliers',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $this->load->view('template/includes/header');
            $this->load->view('template/contacts/AddSupplier', $data);
            $this->load->view('template/includes/footer');
            break;
                case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') {
                    $data = array(
                      'name'     => $this->input->post('sup_name'),
                      'opening_balance	'     => $this->input->post('opening_bln'),
                      'permanant_number'     => $this->input->post('mobile'),
                      'email'     => $this->input->post('email'),
                      'alternate_number	'     => $this->input->post('phone'),
                      'gst_no'     => $this->input->post('gst'),
                      'tax_no'     => $this->input->post('tax'),
                      'country'     => $this->input->post('country'),
                      'state'     => $this->input->post('state'),
                      'city'     => $this->input->post('city'),
                      'pincode'     => $this->input->post('pincode'),
                      'address'     => $this->input->post('address'),
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('suppliers',$data,['id'=>$id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Supplier updated Successfullly.';
                        }
                    }else
                    {
                        if($item_id = $this->admin_model->Save('suppliers',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Supplier added Successfullly.';
                        }
                    }
                    // if ($saved == 1 ) {
                    //     $return['res'] = 'success';
                    //     $return['msg'] = 'Supplier added Successfullly.';
                    // }
                }
                echo json_encode($return);
                break;

                case "list":
                    $data['suppliers'] =   $this->admin_model->getData('suppliers',['is_deleted'=>'NOT_DELETED'],'asc','name');
                    $this->load->view('template/includes/header');
                    $this->load->view('template/contacts/SuppliersList', $data);
                    $this->load->view('template/includes/footer');
                break;
                
               case 'delete':
                $this->admin_model->_delete('suppliers',['id'=>$p1]); 
                $data['suppliers'] =   $this->admin_model->getData('suppliers',['is_deleted'=>'NOT_DELETED'],'asc','name');
                $this->session->set_flashdata('cusmsg','Supplier deleted.');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/contacts/SuppliersList');
                $this->load->view('template/includes/footer');
            break;
                default:
            // code...
            break;
        }
    }
}