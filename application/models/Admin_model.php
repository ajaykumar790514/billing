<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getByUsername($username)
    {
        $this->db->where('username', $username);
        $admin = $this->db->get('admins')->row_array();
        return $admin;
    }
    function Save($tb,$data){
		if($this->db->insert($tb,$data)){
			return $this->db->insert_id();
		}
		return false; 
	}
    
	function getData($tb,$data=0,$order=null,$order_by=null,$limit=null,$start=null) {

		if ($order!=null) {
			if ($order_by!=null) {
				$this->db->order_by($order_by,$order);
			}
			else{
				$this->db->order_by('id',$order);
			}
		}

		if ($limit!=null) {
			$this->db->limit($limit, $start);
		}

		if ($data==0 or $data==null) {
			return $this->db->get($tb)->result();
		}
		if (@$data['search']) {
			$search = $data['search'];
			unset($data['search']);
		}
		return $this->db->get_where($tb,$data)->result();
	}



	function getRow($tb,$data=0) {
		if ($data==0) {
			if($data=$this->db->get($tb)->row()){
				return $data;
			}
			else {
				return false;
			}
		}
		elseif(is_array($data)) {
			if($data=$this->db->get_where($tb, $data)){
				return $data->row();
			}
			else {
				return false;
			}
		}
		else {
			if($data=$this->db->get_where($tb,array('id'=>$data))){
				return $data->row();
			}
			else {
				return false;
			}
		}
	}

	function Update($tb,$data,$cond) {
		$this->db->where($cond);
	 	if($this->db->update($tb,$data)) {
	 		return true;
	 	}
	 	return false;
	}
    function _delete($tb,$data) {
		if (is_array($data)){
			$this->db->where($data);
			if($this->db->update($tb,['is_deleted'=>'DELETED'])){
				return true;
			}
		}
		else{
			$this->db->where('id',$data);
			if($this->db->update($tb,['is_deleted'=>'DELETED'])){
				return true;
			}
		}
		return false;
	}

	function getAtt()
	{
	  $this->db->select('u.*,t1.emp_name,t1.mobile,t2.name as dept_name')
     ->from('emp_att u')
	 ->join('emp_details t1','t1.id=u.emp_id','left')
	 ->join('department t2','t2.id=t1.department','left')
	 ->where(['t1.is_deleted'=>'NOT_DELETED','u.punch_date'=>date('Y-m-d')]);
	return $this->db->get()->result();
	}
	function getAllProduct()
	{
	  $this->db->select('t1.*,t2.name as cat_name,t3.name as sub_cat_name')
     ->from('products t1')
	 ->join('category t2','t2.id=t1.cat_id','left')
	 ->join('category t3','t3.id=t1.sub_cat_id','left')
	 ->where(['t1.is_deleted'=>'NOT_DELETED','t2.is_deleted'=>'NOT_DELETED','t3.is_deleted'=>'NOT_DELETED']);
	return $this->db->get()->result();
	}

	
    // public function getProductByCode($pro_code) {
    // 	$this->db->select('products.*, pro_stock_qty.qty');
    //     $this->db->from('products');
    //     $this->db->join('pro_stock_qty', 'products.id = pro_stock_qty.pro_id', 'left');
    //     $this->db->where(['products.pro_code'=>$pro_code,'products.is_deleted'=>'NOT_DELETED','products.status'=>'1']);

    //     $query = $this->db->get();

    //     return $query->row();
    // }

	public function getProductByCode($id) {
    	$this->db->select('products.*, pro_stock_qty.qty');
        $this->db->from('products');
        $this->db->join('pro_stock_qty', 'products.id = pro_stock_qty.pro_id', 'left');
        $this->db->where(['products.pro_code'=>$id,'products.is_deleted'=>'NOT_DELETED','products.status'=>'1']);
		$this->db->order_by('products.id','asc');
        $query = $this->db->get();

        return $query->result();
    }

	public function getProductByCategory($id) {
    	$this->db->select('products.*, pro_stock_qty.qty');
        $this->db->from('products');
        $this->db->join('pro_stock_qty', 'products.id = pro_stock_qty.pro_id', 'left');
        $this->db->where(['products.cat_id'=>$id,'products.is_deleted'=>'NOT_DELETED','products.status'=>'1']);
        $this->db->order_by('products.id','asc');
        $query = $this->db->get();

        return $query->result();
    }

       public function getProductBySubCategory($id) {
    	$this->db->select('products.*, pro_stock_qty.qty');
        $this->db->from('products');
        $this->db->join('pro_stock_qty', 'products.id = pro_stock_qty.pro_id', 'left');
        $this->db->where(['products.sub_cat_id'=>$id,'products.is_deleted'=>'NOT_DELETED','products.status'=>'1']);
		$this->db->order_by('products.id','asc');
        $query = $this->db->get();

        return $query->result();
    }
    
	


	public function invoice_details($oid)
    {
        $query = $this->db
        ->select('t1.*,t2.pro_name,a.qty,a.amount as product_amount,t2.pro_code,t2.mrp,t2.selling_rate,t2.pro_tax,t3.name as cus_name,t3.permanant_number as cus_permanant_number,t3.email as cus_email,t3.alternate_number as cus_alternate_number,t3.address_country as cus_address_country,t3.address_state as  cus_address_state,t3.address_city as cus_address_city,t3.address_pincode as cus_address_pincode,t3.address1 as cus_address1,t3.address_landmark as cus_address_landmark,t3.shipping_address as cus_shipping_address,t3.shipping_country as cus_shipping_country,t3.shipping_state as cus_shipping_state,t3.shipping_city as cus_shipping_city,t3.shipping_pincode as cus_shipping_pincode,t3.shipping_landmark as cus_shipping_landmark,t4.permanant_number as sup_permanant_number,t4.name as sup_name,t4.alternate_number as sup_alternate_number,t4.email as sup_email,t4.country as sup_country,t4.state as sup_state,t4.city as sup_city,t4.pincode as sup_pincode,t4.address as sup_address,t5.name as user_name,t5.country as user_country,t5.address as user_address,t5.state as user_state,t5.city as user_city,t5.pincode as user_pincode,t5.mobile as user_mobile,t5.gst as user_gst,t5.logo')
        ->from('orders t1')
		->join('order_items a', 'a.order_id = t1.id','left')
        ->join('products t2', 't2.id = a.product_id','left') 
        ->join('customers t3', 't3.id = t1.customer_id','left')        
        ->join('suppliers t4', 't4.id = t1.supplier_id','left') 
		->join('admins t5', 't5.id = t1.user_id','left')  
        ->where(['t2.is_deleted' => 'NOT_DELETED','t1.invoice_no'=>$oid])  
		->get();   
		return $query->result_array();
    }
	
	public function salary_invoice($oid)
    {
        $query = $this->db
        ->select('ed.* , es.*')
        ->from('emp_details ed')
        ->join('emp_salary es', 'es.emp_id = ed.id','left') 
        ->where(['ed.is_deleted' => 'NOT_DELETED','es.salary_no'=>$oid])  
		->get();   
		return $query->result_array();
    }

	public function invoice_details_normal($oid)
    {
        $query = $this->db
        ->select('t1.*,t1.amount as Tamount,t3.pro_name,t3.pro_code,t3.mrp,t3.pro_tax,t3.selling_rate as pro_selling_rate,t2.tax,t2.amount,t2.qty,t5.name as user_name,t5.country as user_country,t5.address as user_address,t5.state as user_state,t5.city as user_city,t5.pincode as user_pincode,t5.mobile as user_mobile,t5.gst as user_gst,t5.logo')
        ->from('individual_orders t1')
        ->join('individual_orders_items t2', 't2.order_id = t1.id','left')  
		->join('products t3', 't3.id = t2.product_id','left')
		->join('admins t5', 't5.id = t1.user_id','left')  
        ->where(['t3.is_deleted' => 'NOT_DELETED','t1.invoice_no'=>$oid])  
		->get();   
		return $query->result_array();
    }

	public function getNormalSales()
    {
        $query = $this->db
        ->select('t1.*,t1.amount as Tamount,t3.pro_name,t3.pro_code,t3.mrp,t3.pro_tax,t3.selling_rate as pro_selling_rate,t2.tax,t2.amount,t2.qty,t5.name as user_name,t5.country as user_country,t5.address as user_address,t5.state as user_state,t5.city as user_city,t5.pincode as user_pincode,t5.mobile as user_mobile,t5.gst as user_gst,t5.logo')
        ->from('individual_orders t1')
        ->join('individual_orders_items t2', 't2.order_id = t1.id','left')  
		->join('products t3', 't3.id = t2.product_id','left')
		->join('admins t5', 't5.id = t1.user_id','left')  
        ->where(['t3.is_deleted' => 'NOT_DELETED'])  
		->get();   
		return $query->result();
    }

	public function getClientSales()
    {
        $query = $this->db
        ->select('t1.*,t1.amount as Tamount,t3.pro_name,t3.pro_code,t3.mrp,t3.pro_tax,t3.selling_rate as pro_selling_rate,t2.tax,t2.amount,t2.qty,t5.name as user_name,t5.country as user_country,t5.address as user_address,t5.state as user_state,t5.city as user_city,t5.pincode as user_pincode,t5.mobile as user_mobile,t5.gst as user_gst,t5.logo')
        ->from('orders t1')
        ->join('order_items t2', 't2.order_id = t1.id','left')  
		->join('products t3', 't3.id = t2.product_id','left')
		->join('admins t5', 't5.id = t1.user_id','left')  
        ->where(['t3.is_deleted' => 'NOT_DELETED'])  
		->get();   
		return $query->result();
    }
	public function get_data_by_date_range($start_date, $end_date)
	{
		$this->db->where('date >=', $start_date);

		if ($end_date != '') {
			$this->db->where('date <=', $end_date);
		}

		$query = $this->db->get('emp_salary');
	//    echo $this->db->last_query();die();
		return $query->result();
	}
	public function getYearSales($year) {
    $monthlyData = [];

    for ($month = 1; $month <= 12; $month++) {
        $this->db->select('MONTH(t1.order_date) as month, SUM(t1.amount) as total, COUNT(t1.id) as order_count');
        $this->db->from('orders t1');
        $this->db->where('YEAR(t1.order_date)', $year);
        $this->db->where('MONTH(t1.order_date)', $month);
        $this->db->group_by('MONTH(t1.order_date)');
        $query = $this->db->get();

        $result = $query->row();
        if (!$result) {
            $result = (object) [
                'month' => $month,
                'total' => 0,
                'order_count' => 0,
            ];
        }

        // Get the month name
        $result->month_name = date("F", strtotime("$year-$month-01"));

        $monthlyData[] = $result;
    }

    return $monthlyData;
}
// Model function to get total purchase for the current month
public function getCurrentMonthPurchase() {
    $this->db->select_sum('total', 'Total');
    $this->db->from('purchase');
    $this->db->where('MONTH(date)', date('m')); // Current month
    $this->db->where('YEAR(date)', date('Y')); // Current year

    $query = $this->db->get();
    $result = $query->row();

    return intval($result->Total) ?? 0;
}
// Model function to get total purchase for the last month
public function getLastMonthPurchase() {
    $lastMonth = date('m', strtotime('-1 month'));
    $lastYear = date('Y');

    $this->db->select_sum('total', 'Total');
    $this->db->from('purchase');
    $this->db->where('MONTH(date)', $lastMonth);
    $this->db->where('YEAR(date)', $lastYear);

    $query = $this->db->get();
    $result = $query->row();

    return intval($result->Total) ?? 0;
}
public function getCurrentMonthSales() {
	$this->db->select('SUM(amount) as total_sales');
	$this->db->from('orders');
	$this->db->where('MONTH(order_date)', date('m'));
	$this->db->where('YEAR(order_date)', date('Y'));
	
	$query = $this->db->get();
	$result = $query->row();

	return intval($result->total_sales) ?? 0;
}

public function getLastMonthSales() {
	$lastMonth = date('m', strtotime('-1 month'));
	$lastYear = date('Y');

	$this->db->select('SUM(amount) as total_sales');
	$this->db->from('orders');
	$this->db->where('MONTH(order_date)', $lastMonth);
	$this->db->where('YEAR(order_date)', $lastYear);

	$query = $this->db->get();
	$result = $query->row();

	return intval($result->total_sales) ?? 0;
}

public function findusers($id)
    {
        $query = $this->db
        ->select('t1.*')
        ->from('customers t1')       
        ->where(['t1.is_deleted' => 'NOT_DELETED','t1.id'=>$id])
        ->get();
		return $query->row();
       
    }

	}


?>