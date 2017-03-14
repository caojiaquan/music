<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model
{
    public function save_message($sender, $receiever, $content)
    {
        $this -> db -> insert('t_message',array(
            'sender'=>$sender,
            'receieve' => $receiever,
            'content' => $content
        ));
        return $this -> db -> affected_rows();
    }
}