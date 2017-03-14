<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_model extends CI_Model{
    public function get_articles_by_user(){
        $this->db->select('a.*,t.type_name');
        $this->db->from('t_article a');
        $this->db->join('t_article_type t', 'a.type_id = t.type_id');
//        $this ->db ->where('a.user_id',$user_id);

        return $this->db->get() -> result();
    }
    public function save_article($title,$content,$type_id,$user_id){
        $this -> db -> insert('t_article',array(
            'title' => $title,
            'content' => $content,
            'type_id' => $type_id,
            'user_id' => $user_id
        ));
        return $this -> db -> affected_rows();
    }
    public function delete_article($ids){
        $sql ="delete from t_article where article_id in($ids)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_article_by_id($id){

        $sql = "update t_article set click=click+1 where article_id=$id";
        $this -> db -> query($sql);
        return $this -> db -> get_where('t_article',array(
            'article_id'=> $id
        ))->row();

    }
    public function delete_article_by_id($id){
        $sql ="delete from t_article where article_id in($id)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }



}