<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Admin_model');
        $this->load->model('lib_model');
        $this->load->library('Lib');
        $this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
        $admin = $this->session->userdata('MUserId');
        if(empty($admin))
        {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'login/index');
        }
    }
    public function InventoryDashboard()
    {
        $data['title'] 			= 'Inventory Dashboard';
        $this->load->view('template/includes/header', $data);
        $this->load->view('template/inventory/dashboard', );
        $this->load->view('template/includes/footer');
    }
    public function CategoryMaster($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Category Master';
            $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED', 'is_parent'=>'0'],'asc','name');
            $this->load->view('template/includes/header');
            $this->load->view('template/inventory/category', $data);
            $this->load->view('template/includes/footer');
            break;
                case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') {
                    $data = array(
                      'name'     => $this->input->post('category')
                    );
                    if ($id!=null) {
                        if($this->admin_model->Update('category',$data,['id'=>$id])){
                            $saved = 1;
                        }
                    }else
                    {
                        if($item_id = $this->admin_model->Save('category',$data)){
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
                $this->admin_model->_delete('category',['id'=>$p1]); 
                $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent'=>'0'],'asc','name');
                $this->session->set_flashdata('deletemsg','Category deleted.');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/inventory/category');
                $this->load->view('template/includes/footer');
            break;
                default:
            // code...
            break;
        }
    }
    public function SubCategoryMaster($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Sub Category Master';
            $data['cats'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED', 'is_parent'=>'0'],'asc','name');
            $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent !='=>'0'],'asc','name');
            $this->load->view('template/includes/header');
            $this->load->view('template/inventory/subcategory', $data);
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
               case 'delete':
                $this->admin_model->_delete('category',['id'=>$p1]); 
                $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED', 'is_parent !='=>'0'],'asc','name');
                $this->session->set_flashdata('deletemsg','Sub Category deleted.');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/inventory/subcategory');
                $this->load->view('template/includes/footer');
            break;
                default:
            // code...
            break;
        }
    }
    public function ProductMaster($action=null,$p1=null)
    {
        switch ($action) {
            case null:
            $data['title'] 			= 'Product Master';
            $data['cats'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED', 'is_parent'=>'0'],'asc','name');
            $data['categories'] =   $this->admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent !='=>'0'],'asc','name');
            $data['products'] =   $this->admin_model->getAllProduct();
            
            $this->load->view('template/includes/header', $data);
            $this->load->view('template/inventory/product',$data);
            $this->load->view('template/includes/footer');
            break;
                case 'save':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') 
                {    
                    if ($id!=null) 
                    {
                           //application upload code
                           $config['file_name'] = rand(10000, 10000000000);    
                           $config['upload_path'] = UPLOAD_PATH.'product/thumbnail';
                           $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                           $this->load->library('upload', $config);
                           $this->upload->initialize($config);
   
                           if (!empty($_FILES['application']['name'])) {
   
                               //upload images
                               $_FILES['applications']['name'] = $_FILES['application']['name'];
                               $_FILES['applications']['type'] = $_FILES['application']['type'];
                               $_FILES['applications']['tmp_name'] = $_FILES['application']['tmp_name'];
                               $_FILES['applications']['size'] = $_FILES['application']['size'];
                               $_FILES['applications']['error'] = $_FILES['application']['error'];
   
                               if ($this->upload->do_upload('applications')) {
                                   $image_data = $this->upload->data();
                               
                                   $fileName = "product/thumbnail/" . $image_data['file_name'];
                               }
                              $img =  $data['img'] = $fileName;
                           } else {
                               $rs = $this->admin_model->getRow('products',['id'=>$id]);
                               $img =  $data['img'] = $rs->img;
                           }
                           $data = array(
                            'cat_id'     => $this->input->post('cat_id'),
                            'sub_cat_id'     => $this->input->post('subcat_id'),
                            'pro_name'     => $this->input->post('pro_name'),
                            'description'     => $this->input->post('description'),
                            'mrp'     => $this->input->post('mrp'),
                            'selling_rate'     => $this->input->post('sell_price'),
                            'pro_tax'     => $this->input->post('pro_tax'),
                            'img'     => $img
                          );
                        if($this->admin_model->Update('products',$data,['id'=>$id])){
                            $saved = 2;
                        }
                    }
                    else
                    {
                        $imageCount = count($_FILES['img']['name']);
                        if (!empty($imageCount)) {
                            
                            for ($i = 0; $i < $imageCount; $i++) {
                                
                                $config['file_name'] = date('Ymd') . rand(1000, 1000000);
                                $config['upload_path'] = UPLOAD_PATH.'product/';
                                $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $_FILES['imgs']['name'] = $_FILES['img']['name'][$i];
                                $_FILES['imgs']['type'] = $_FILES['img']['type'][$i];
                                $_FILES['imgs']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                                $_FILES['imgs']['size'] = $_FILES['img']['size'][$i];
                                $_FILES['imgs']['error'] = $_FILES['img']['error'][$i];
                                if ($this->upload->do_upload('imgs')) {
                                
                                    $imageData = $this->upload->data();
                                    if($_FILES['imgs']['type']=='image/webp')
                                        {
                                                $img =  imagecreatefromwebp(UPLOAD_PATH.'product/'. $imageData['file_name']);
                                                imagewebp($img, UPLOAD_PATH.'product/thumbnail/'. $imageData['file_name'],80);
                                                imagedestroy($img);
                                        }
                                        else
                                        {
                                            $config2 = array(
                                                'image_library' => 'gd2',
                                                'source_image' =>   UPLOAD_PATH.'product/'. $imageData['file_name'],
                                                'width' => 640,
                                                'height' => 360,
                                                'new_image' =>  UPLOAD_PATH.'product/thumbnail/'. $imageData['file_name'],
                                            );
                                            $this->load->library('image_lib');
                                            $this->image_lib->initialize($config2);
                                            $this->image_lib->resize();
                                            $this->image_lib->clear();
                                        }
    
                                    $images[] = "product/" . $imageData['file_name'];
                                    $images2[] = "product/thumbnail/" . $imageData['file_name'];
                                }
                            }
                        }
    
                            //application upload code
                            $config['file_name'] = rand(10000, 10000000000);    
                            $config['upload_path'] = UPLOAD_PATH.'product/thumbnail';
                            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
    
                            if (!empty($_FILES['application']['name'])) {
    
                                //upload images
                                $_FILES['applications']['name'] = $_FILES['application']['name'];
                                $_FILES['applications']['type'] = $_FILES['application']['type'];
                                $_FILES['applications']['tmp_name'] = $_FILES['application']['tmp_name'];
                                $_FILES['applications']['size'] = $_FILES['application']['size'];
                                $_FILES['applications']['error'] = $_FILES['application']['error'];
    
                                if ($this->upload->do_upload('applications')) {
                                    $image_data = $this->upload->data();
                                
                                    $fileName = "product/thumbnail/" . $image_data['file_name'];
                                }
                               $img =  $data['img'] = $fileName;
                            } else {
                                $img =  $data['img'] = "";
                            }
                            $data = array(
                                'cat_id'     => $this->input->post('cat_id'),
                                'sub_cat_id'     => $this->input->post('subcat_id'),
                                'pro_name'     => $this->input->post('pro_name'),
                                'description'     => $this->input->post('description'),
                                'mrp'     => $this->input->post('mrp'),
                                'selling_rate'     => $this->input->post('sell_price'),
                                'pro_tax'     => $this->input->post('pro_tax'),
                                'img'     => $img
                              );
                        if (!empty($images))
                        {     
                            if($insert_id = $this->admin_model->Save('products',$data)){
                                $saved = 1;
                                $this->load->library('zend');
                                $this->zend->load('Zend/Barcode');
                                
                                $order_id = uniqid('ORDER') . $insert_id;
                                $barcode_config = array(
                                    'text' => $order_id,
                                    'barHeight' => 30,
                                    'factor' => 2,
                                );
                                
                                // Generate the barcode
                                $barcodeImage = Zend_Barcode::factory('code128', 'image', $barcode_config)->draw();
                                
                                // Save the barcode image to a file
                                $barcodeImagePath = UPLOAD_PATH . 'barcodes/' . $order_id . '.png';
                                imagepng($barcodeImage, $barcodeImagePath);
                                imagedestroy($barcodeImage);

                                $prefix = 'PRO';
                                $formatted_id = sprintf('%05d', $insert_id);
                                $uniqueCode = $prefix . $formatted_id;
                                $update['pro_code'] = $uniqueCode;
                                $update['barcode_image_path'] = $barcodeImagePath;
                                $this->admin_model->Update('products',$update,['id'=>$insert_id]);
                            }
                            foreach (array_combine($images, $images2) as $file => $file2) {
                                    $file_data = array(
                                        'img' => $file,
                                        'thumbnail' => $file2,
                                        'item_id' => $insert_id
                                    );
                                    $this->db->insert('products_photo', $file_data);
                                }
                   
                        }
                         else
                        {
                            if($insert_id = $this->admin_model->Save('products',$data)){
                                $saved = 1;
                                $prefix = 'PRO';
                                $formatted_id = sprintf('%05d', $insert_id);
                                $uniqueCode = $prefix . $formatted_id;
                                $update['pro_code'] = $uniqueCode;
                                $this->admin_model->Update('products',$update,['id'=>$insert_id]);
                            }
                        }
                       
                    }
                    if ($saved == 2 ) 
                    {
                        $return['res'] = 'success';
                        $return['msg'] = 'Product Updated successfully.';
                    }
                    if ($saved == 1 ) 
                    {
                        $return['res'] = 'success';
                        $return['msg'] = 'Product added successfully.';
                    }
                }
                echo json_encode($return);
            break;
               case 'delete':
                $this->admin_model->_delete('products',['id'=>$p1]); 
                $data['products'] =   $this->admin_model->getData('products',['is_deleted'=>'NOT_DELETED', 'is_parent !='=>'0'],'asc','name');
                $this->session->set_flashdata('deletemsg','Product deleted.');
                $this->load->view('template/includes/header', $data);
                $this->load->view('template/inventory/product');
                $this->load->view('template/includes/footer');
            break;
            case 'qty':
                $id=$p1;
                $return['res'] = 'error';
                $return['msg'] = 'Not Saved!';
                $saved = 0;
                if ($this->input->server('REQUEST_METHOD')=='POST') 
                {
                   $add_qty = $this->input->post('add_qty');
                    $sub_qty =$this->input->post('sub_qty');
                   $pro_id = $this->input->post('pro_id');
                   $exist_qty = $this->input->post('exist_qty');
                    if($add_qty !='0' && $sub_qty=='0')
                    {
                        $finalqty = $exist_qty + $add_qty;
                    }elseif($add_qty =='0' && $sub_qty !='0')
                    {
                        $finalqty = $exist_qty - $sub_qty;
                    }else{
                        $finalqty = $exist_qty;
                    }
                    $data = array(
                      'pro_id'     => $this->input->post('pro_id'),
                      'qty'     => $finalqty
                    );
                    $count1= $this->lib_model->Counter('pro_stock_qty', array('pro_id'=> 
                    $pro_id));
                    if ($count1 > 0) {
                        if($this->admin_model->Update('pro_stock_qty',$data,['pro_id'=>$pro_id])){
                            $return['res'] = 'success';
                            $return['msg'] = 'Product Quantity Updated .';
                        }
                    }
                    else
                    {
                        if($item_id = $this->admin_model->Save('pro_stock_qty',$data)){
                            $return['res'] = 'success';
                            $return['msg'] = 'Product Quantity added successfully.';
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
    public function loadSubcategories()
    {
        $catId = $this->input->post('category_id');
        $subcategories  = $this->admin_model->getData('category',['is_parent'=>$catId]);
     //    $result = "<option><"
        
        echo json_encode($subcategories);
    }
      public function ViewBarcode()
      {
        $data['title'] 			= 'Product Master';
        $this->load->view('template/includes/header', $data);
        $this->load->view('template/inventory/ViewBarcode');
        $this->load->view('template/includes/footer');  
      }
    public function scanBarcode()
    {
        $barcode = $this->input->post('barcode');
        echo json_encode(['barcode' => $barcode]);
    }


}
