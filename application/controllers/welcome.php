<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
	    $topid = 5;
        $this -> load -> model('music_model');
        $result = $this -> music_model -> get_music_type_by_topid($topid);
        $this -> session -> set_userdata('Music',$result);
        $this->load->view('index');
    }
    public function login()
    {
        $topid = $this -> input -> get('topid');
        $this -> load -> model('music_model');
        $result = $this -> music_model -> get_music_type_by_topid($topid);
        if($result){
            echo  $result;
        }else{
            echo 'fail';
        }
    }


}
