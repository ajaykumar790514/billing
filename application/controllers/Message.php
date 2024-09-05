<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Admin_model');
        $this->load->model('lib_model');
        $this->load->library('Lib');
        $this->load->model('Messagemodel');
        
        $admin = $this->session->userdata('MUserId');
        if(empty($admin))
        {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'login/index');
        }
    }
	public function index()
	{  
		$admin = $this->session->userdata('MUserId');
		$data['title'] 		= 'Chat';
        $data['users']      = $this->Admin_model->findusers($admin);
        $this->load->view('template/includes/header', $data);
        $this->load->view('template/message/message');
        $this->load->view('template/includes/footer');
	}
	public function ownerDetails(){
		$admin = $this->session->userdata('MUserId');
		$res = $this->Messagemodel->ownerDetails($admin);
		print_r(json_encode($res));
	}
	public function allUser(){
		$admin = $this->session->userdata('MUserId');
		$data['data'] = $this->Messagemodel->allUser($admin);
		$data['last_msg'] = array();
		$this->load->helper('url');
		if(!is_array($data['data'])){
			echo "<p class='text-center'>No user available.</p>";
		}else{
			$count = count($data['data']);
			for($i = 0; $i < $count; $i++){
				$unique_id = $data['data'][$i]['id'];
				$msg = $this->Messagemodel->getLastMessage($admin,$unique_id);
				for($j = 0; $j < count($msg); $j++){

					$time = explode(" ",$msg[0]['time']); //00:00:00.0000
					$time = explode(".", $time[1]);//00:00:00
					$time = explode(":",$time[0]);//00 00 00
					if((int)$time[0] == 12){
						$time = $time[0].":".$time[1]." PM";
					}
					elseif((int)$time[0] > 12){
						$time = ($time[0] - 12).":".$time[1]." PM";
					}else{
						$time = $time[0].":".$time[1]." AM";
					}

					array_push($data['last_msg'],array(
						'message' => $msg[0]['message'],
						'sender_id' => $msg[0]['sender_message_id'],
						'receiver_id' => $msg[0]['receiver_message_id'],
						'time' => $time //00:00
					));
				}
			}
			$this->load->view('template/message/sampleDataShow',$data);
		}
		
	}
	public function getIndividual(){
		
		$returnVal = $this->Messagemodel->getIndividual($_POST['data']);
		print_r(json_encode($returnVal,true));
	}
	
	public function getMessage(){
		$admin = $this->session->userdata('MUserId');
		if(isset($_POST['data']) && isset($admin)){
			$data['data'] = $this->Messagemodel->getmessage($admin,$_POST['data']);
			$data['image'] = $_POST['image'];
			$this->load->view('template/message/sampleMessageShow',$data);
		}
	}
	public function setNoMessage(){
		$data['image'] = $_POST['image'];
		$data['name'] = $_POST['name'];
		$this->load->view('template/message/notmessageyet',$data);
	}
	public function sendMessage(){
		$admin = $this->session->userdata('MUserId');
		if(isset($_POST['data']) && isset($admin)){
		$jsonDecode = json_decode($_POST['data'],true);
		$uniq = $admin;
		$arr = array(
			'time' => $jsonDecode['datetime'],
			'sender_message_id' => $uniq,
			'receiver_message_id' => $jsonDecode['uniq'],
			'message' => $jsonDecode['message'],
			'type' => 'admin',
		);
			$this->Messagemodel->sentMessage($arr);
		}
	}
}