<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model
{
    public function save_comment($user_id,$content,$article_id)
    {
        $this -> db -> insert('t_comment',array(
            'user_id' => $user_id,
            'content' => $content,
            'article_id' => $article_id
        ));

        return $this->db -> affected_rows();
    }

    public function get_comment($article_id){
        $sql = "select c.*, u.username from t_comment c , t_user u where u.user_id =c.user_id  and article_id=$article_id";

        return $this -> db -> query($sql)  -> result();
//        return $this -> db -> get_where('t_comment',array(
//            'article_id' => $article_id
//        )) -> result();

    }

    public function get_comment_by_user($user_id){
        $sql = "select c.*,u.username,a.title from t_comment c,t_user u,t_article a where u.user_id=c.user_id and c.user_id=a.user_id and c.article_id=a.article_id and 'user_id'=$user_id";
        return $this -> db -> query($sql)->result();
    }
}