<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Admin_model');
    }

    public function chatApi($value=array())
    {
        $content = $this->input->post();
        $params1['userid'] = $content['userid'];
        $res = $this->Admin_model->getRow('customers',['id'=>$params1['userid']]);
        
        if ($res) {
        $rs = $this->Admin_model->getData('user_messages',['receiver_message_id'=>$res->id]);
           foreach($rs as $r){
            $data['userid'] = $params1['userid'];
            $data['username'] = $res->name;
            $data['useremail'] = $res->email;
            $data['receiver_message_id'] = $r->receiver_message_id;
            $data['sender_message_id'] = $r->sender_message_id;
            $data['time']=$r->time;
            $data['message']=$r->message;
            $data['userimage'] = base_url(@$res->photo);
             $data['type'] = $r->type;
             echo json_encode(array("status"=>"success","data"=>$data));      
         }  
           
        }
        else{
            
            $this->output
                 ->set_status_header(401) // Setting the status code to 401
                 ->set_content_type('application/json', 'utf-8')
                 ->set_output(json_encode(array("status"=>"failure","message"=>'Invalid credentials, please check and try again.')))
                 ->_display();
            exit;
        }
    
    }
   
}