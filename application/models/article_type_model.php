<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_type_model extends CI_Model{
    public function get_types_by_user($user_id){
        $sql ="select t.*,(select count(*) from t_article a where a.type_id = t.type_id) num from t_article_type t where t.user_id = $user_id";
        return $this -> db -> query($sql) -> result();
    }


    public function add_type_by_user($type_name,$user_id){
        $this ->db -> insert('t_article_type',array(
            'type_name' => $type_name,
            'user_id' => $user_id
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_type_by_user($type_id){
//        $this -> db -> delete('t_article_type',array(
//            'type_id' => $type_id
//        ));
        $sql = "delete from t_article_type where type_id='$type_id'";
        $this -> db -> query($sql);
        return $this -> db ->affected_rows();
    }
}