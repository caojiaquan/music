<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function sendMsg(){
        $this -> load -> view('sendMsg');
    }
    public function  save_sendMsg(){
        $sender = $this -> session -> userdata('loginUser') -> user_id;
        $receiever = $this -> session -> userdata('loginUser') -> user_id;
        $content = $this -> input -> post('content');
        $this -> load -> model('message_model');
        $rows = $this -> message_model -> save_message($sender,$receiever,$content);
        if($rows > 0){
            $this -> load -> view('sendMsg',array(
                'rows' => $rows
            ));
        }else{
            echo 'fail';
        }
    }
}