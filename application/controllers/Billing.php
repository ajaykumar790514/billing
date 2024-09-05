<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller
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
    public function Billing($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Client Billing Master';
            $data['customers'] =   $this->admin_model->getData('customers',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $data['suppliers'] =   $this->admin_model->getData('suppliers',['is_deleted'=>'NOT_DELETED'],'asc','name');
            $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent'=>'0'],'asc','name');
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/billing/index');
            $this->load->view('template/includes/footer');
            break;
              
                default:
            // code...
            break;
        }
    }


    public function getProduct()
    {
     $pro_code = $this->input->post('pro_code');

        if (!empty($pro_code)) {
            $productDetails = $this->admin_model->getProductByCode($pro_code);

            if ($productDetails) {
                $data['products'] = $productDetails;
                $this->load->view('template/billing/category_product', $data);
            } else {
                echo '<h6 class="text-center text-danger">Product not found!</h6>';
            }
        } else {
            echo '<h6 class="text-center text-danger">Please provide a product code.</h6>';
        }
      }
      public function getClientProduct()
    {
     $pro_code = $this->input->post('pro_code');

        if (!empty($pro_code)) {
            $productDetails = $this->admin_model->getProductByCode($pro_code);

            if ($productDetails) {
                $data['products'] = $productDetails;
                $this->load->view('template/billing/category_product', $data);
            } else {
                echo '<h6 class="text-center text-danger">Product not found!</h6>';
            }
        } else {
            echo '<h6 class="text-center text-danger">Please provide a product code.</h6>';
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

        // Validate the session and required POST data
        if (isset($_SESSION['MUserId'], $post['FinalTax'], $post['FinalAmount'], $post['date'])) {
            if(!empty($post['customer_id']) || !empty($post['supplier_id']) ){
                if($post['paidable_amount']  > 0){
               $orderdata = array(
                'user_id' => $_SESSION['MUserId'],
                'tax' => $post['FinalTax'],
                'customer_id'=>@$post['customer_id'],
                'supplier_id'=>@$post['supplier_id'],
                'amount' => $post['FinalAmount'],
                'status' => '2',
                'payment_status' => '2',
                'order_date' => $post['date'],
                'paidable_amount'=>$post['paidable_amount'],
            );

            if ($insert_id = $this->admin_model->Save('orders', $orderdata)) {
                $prefix = 'INVOICEI';
                $formatted_id = sprintf('%05d', $insert_id);
                $uniqueCode = $prefix . $formatted_id;
                $update['invoice_no'] = $uniqueCode;
                $this->admin_model->Update('orders', $update, ['id' => $insert_id]);
                $this->admin_model->Save('transaction',['ref_id'=>$insert_id,'amount'=>$post['paidable_amount'],'status'=>'2','type'=>'order','order_id'=>$insert_id,'tr_date'=>date('Y-m-d')]);
                
                foreach ($post['check_in_id'] as $key => $value) {
                    $quantity = intval($post['quantity'][$key]);
                    $existQty = intval($post['exist_qtys'][$key]);

                    if ($quantity <= $existQty) {
                        $qty = $existQty - $quantity;
                        $data = array(
                            'order_id' => $insert_id,
                            'product_id' => $post['check_in_id'][$key],
                            'tax' => $post['total_taxss'][$key],
                            'amount' => $post['total_amountss'][$key],
                            'qty' => $quantity,
                            'selling_rate' => $post['selling_rate'][$key],
                            'mrp' => $post['mrp'][$key],
                        );

                        if ($this->admin_model->Save('order_items', $data)) {
                            $update2['qty'] = $qty;
                            $this->admin_model->Update('pro_stock_qty', $update2, ['pro_id' => $post['check_in_id'][$key]]);
                        }
                    } else {
                        $response['message'] = 'Please enter a valid product quantity.';
                        $this->output->set_content_type('application/json')->set_output(json_encode($response));
                        return;
                    }
                }

                $response['success'] = true;
                $response['message'] = 'Order submitted successfully!';
                $response['invoice_no']=$uniqueCode;
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to save order data.';
            }
           }else{
            $response['success'] = false;
            $response['message'] = 'Please enter Paidable amount!';
           }
          }else
          {
                $response['success'] = false;
                $response['message'] = 'Please select customer / supplier!';
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

   public function ProductBilling($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Billing Master';
           $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent'=>'0'],'asc','name');
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/billing/ProductBilling');
           $this->load->view('template/includes/footer');
           break;
             
               default:
           // code...
           break;
       }
   }
   
   public function ProductOrderSubmit()
{
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $response = array(
            'success' => false,
            'message' => 'Failed to process the order.'
        );

        $post = $this->input->post();

        // Validate the session and required POST data
        if (isset($_SESSION['MUserId'], $post['FinalTax'], $post['FinalAmount'], $post['date'])) {
            if($post['paidable_amount'] > 0){
            $orderdata = array(
                'user_id' => $_SESSION['MUserId'],
                'tax' => $post['FinalTax'],
                'amount' => $post['FinalAmount'],
                'status' => '2',
                'payment_status' => '2',
                'order_date' => $post['date'],
                'paidable_amount'=>$post['paidable_amount'],
            );

            if ($insert_id = $this->admin_model->Save('individual_orders', $orderdata)) {
                $prefix = 'INVOICEA';
                $formatted_id = sprintf('%05d', $insert_id);
                $uniqueCode = $prefix . $formatted_id;

                $update['invoice_no'] = $uniqueCode;
                $this->admin_model->Update('individual_orders', $update, ['id' => $insert_id]);
                $this->admin_model->Save('transaction',['ref_id'=>$insert_id,'amount'=>$post['paidable_amount'],'status'=>'2','type'=>'order','order_id'=>$insert_id,'tr_date'=>date('Y-m-d')]);
                
                foreach ($post['check_in_id'] as $key => $value) {
                    $quantity = intval($post['quantity'][$key]);
                    $existQty = intval($post['exist_qtys'][$key]);

                    if ($quantity <= $existQty) {
                        $qty = $existQty - $quantity;
                        $data = array(
                            'order_id' => $insert_id,
                            'product_id' => $post['check_in_id'][$key],
                            'tax' => $post['total_taxss'][$key],
                            'amount' => $post['total_amountss'][$key],
                            'qty' => $quantity,
                            'selling_rate' => $post['selling_rate'][$key],
                            'mrp' => $post['mrp'][$key],
                        );

                        if ($this->admin_model->Save('individual_orders_items', $data)) {
                            $update2['qty'] = $qty;
                            $this->admin_model->Update('pro_stock_qty', $update2, ['pro_id' => $post['check_in_id'][$key]]);
                        }
                    } else {
                        $response['message'] = 'Please enter a valid product quantity.';
                        $this->output->set_content_type('application/json')->set_output(json_encode($response));
                        return;
                    }
                }

                $response['success'] = true;
                $response['message'] = 'Order submitted successfully!';
                $response['invoice_no']=$uniqueCode;
            } else {
                $response['message'] = 'Failed to save order data.';
            }
        }else{
            $response['success'] = false;
            $response['message'] = 'Please enter Paidable amount!';
           }
        } else {
            $response['message'] = 'Invalid session or missing required data.';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid request method.';
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

 
   public function ClientInvoice($action=null,$p1=null)
   {
       switch ($action) {
           case 'bill':
           $data['title'] 			= 'Client Invoice';
           $data['invoice'] = $this->admin_model->invoice_details($p1);
           $this->load->view('template/billing/client_invoice',$data);
           break;
             
               default:
           // code...
           break;
       }
   }
   public function NormalInvoice($action=null,$p1=null)
   {
       switch ($action) {
           case 'bill':
           $data['title'] 			= 'Normal Invoice';
           $data['invoice'] = $this->admin_model->invoice_details_normal($p1);
           $this->load->view('template/billing/normal_invoice',$data);
           break;
             
               default:
           // code...
           break;
       }
   }
   
   public function ClientSales($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Client Sales Master';
           $data['clientsales'] =   $this->admin_model->getClientSales();
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/billing/ClientSales');
           $this->load->view('template/includes/footer');
           break;
             
               default:
           // code...
           break;
       }
   }
   public function NormalSales($action=null,$p1=null)
   {
       switch ($action) {
           case null:
           $data['title'] 			= 'Normal Sales Master';
           $data['normalsales'] =   $this->admin_model->getNormalSales();
           $this->load->view('template/includes/header', $data);
           $this->load->view('template/billing/NormalSAles');
           $this->load->view('template/includes/footer');
           break;
             
               default:
           // code...
           break;
       }
   }
   public function loadSubcategories()
   {
       $catId = $this->input->post('category_id');
       $subcategories  = $this->admin_model->getData('category',['is_parent'=>$catId]);
    //    $result = "<option><"
       
       echo json_encode($subcategories);
   }

   public function getCategoryProduct()
   {
    $category_id = $this->input->post('category_id');

       if (!empty($category_id)) {
           $productDetails = $this->admin_model->getProductByCategory($category_id);

           if ($productDetails) {
               $data['products'] = $productDetails;
               $this->load->view('template/billing/category_product', $data);
           } else {
               echo '<h6 class="text-center text-danger">Product not found!</h6>';
           }
       } else {
           echo '<h6 class="text-center text-danger">Please provide a category .</h6>';
       }
     }
  public function loadSubcategoriesProduct()
   {
    $subcat_id = $this->input->post('subcat_id');

       if (!empty($subcat_id)) {
           $productDetails = $this->admin_model->getProductBySubCategory($subcat_id);

           if ($productDetails) {
               $data['products'] = $productDetails;
                $this->load->view('template/billing/category_product', $data);
           } else {
               echo '<h6 class="text-center text-danger">Product not found!</h6>';
           }
       } else {
           echo '<h6 class="text-center text-danger">Please provide a category .</h6>';
       }
     }
   

}