<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    public function get_by_name_pass($username, $password)
    {
        $query = $this -> db-> get_where('t_user',array(
            'username' => $username,
            'password' => $password
        ));
        return $query -> row();
    }
    public function get_by_name($username){
        return $this -> db -> get_where('t_user',array(
            'username' => $username
        )) ->row();
    }

    public function get_by_user($user_id){
        return $this -> db -> get_where('t_user',array(
            'user_id' => $user_id
        )) ->row();
    }
    public function save_name_pwd($email,$user,$pwd,$gender,$province,$city){
        return $this -> db -> insert('t_user',array(
            'email' => $email,
            'username' => $user,
            'password' => $pwd,
            'sex' => $gender,
            'province' =>$province,
            'city' => $city
        )) -> affected_rows();

    }
    public function check_pwd_by_user($pwd,$user_id){
        return $this -> db -> get_where('t_user',array(
            'user_id' => $user_id,
            'password' => $pwd
        ))-> row() ;


    }

    public function update_pwd_by_user($pwd,$user_id){
        $this -> db -> where('user_id',$user_id);
        $this -> db -> update('t_user',array(
            'password' => $pwd
        ));
        return $this -> db -> affected_rows();
    }
    public function update_personal_data_by_user($username,$gender,$birthday,$province,$city,$mood,$user_id){
        $this -> db -> where('user_id',$user_id);
        $this -> db -> update('t_user',array(
            'username' => $username,
            'sex' => $gender,
            'birthday' => $birthday,
            'province' => $province,
            'city' => $city,
            'mood' => $mood
        ));
        return $this -> db -> affected_rows();

    }
    public function update_mood_by_user($mood,$user_id){
        $this -> db -> where('user_id',$user_id);
        $this -> db -> update('t_user',array(
            'mood' => $mood
        ));
        return $this -> db -> affected_rows();
    }

}

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/12
 * Time: 10:11
 */