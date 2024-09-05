<?php
class Messagemodel extends CI_model{
	public function ownerDetails($id){
			$this->db->select('*');
			$this->db->where('id',$id);
			$res = $this->db->get('admins')->result_array();
			return $res;
	}
	public function allUser($id){
		if(isset($id)){
			$mysession = $id;
			$this->db->select('*');
			$this->db->where('is_deleted','NOT_DELETED');
			$data = $this->db->get('customers');
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}
	}
	public function logoutUser($status, $date){
		if(isset($_SESSION['uniqueid'])){
			$currentSession = $_SESSION['uniqueid'];
			$this->db->query("UPDATE user SET user_status = '$status' , last_logout = '$date' WHERE 
			unique_id = '$currentSession'");
		}
	}
	public function sentMessage($data){
		$this->db->insert('user_messages',$data);
	}
	public function getmessage($id,$data){
		$this->db->select('*');
		$session_id = $id;
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		// $this->db->order_by('time', 'ASC');
		$result = $this->db->get('user_messages')->result_array();
		return $result;
	}
	public function getLastMessage($id,$data){
		$this->db->select('*');
		$session_id = $id;
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
		return $result;
	}
	public function getIndividual($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$res = $this->db->get('customers')->result_array();
		return $res;
	}
    public function get_photo($id)
    {
        $this->db->select("mtb.*")
        ->from('customers mtb')
        ->where(['mtb.id'=>$id,'is_deleted'=>'NOT_DELETED']);
        return $this->db->get()->row();
    }
    
}


?>