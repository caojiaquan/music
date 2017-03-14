<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function adminIndex()
    {
        $this -> load -> view('admin_index');
    }
//    public function blogs(){
//        $this -> load -> view('blogs');
//    }
    public function new_blog(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('article_model');
        $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);
        $this -> load -> view('new_blog',array(
            'articles' => $articles
        ));
    }
    public function post_blog(){
        $loginUser = $this -> session -> userdata('loginUser');
        $title = $this -> input -> post('title');
        $content = $this -> input -> post('content');

        $type_id = $this -> input -> post('type_id');
        $this -> load -> model('article_model');
        $rows = $this -> article_model -> save_article($title,$content,$type_id,$loginUser -> user_id);

        if($rows){

            $loginUser = $this -> session -> userdata('loginUser');
            $this -> load -> model('article_model');
            $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);
            $this -> load -> view('blogs',array(
                'articles' => $articles
            ));
        }else{
            echo 'fail';
        }
    }
    public function delete_articles(){
        $ids = $this -> input -> get('ids');

        $this -> load -> model('article_model');
        $rows = $this ->article_model -> delete_article($ids);

//        var_dump($rows);
//        die();
        if($rows>0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function blogs(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('article_model');
        $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);

        $this -> load -> model('article_type_model');
        $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
        if($articles){
            $this -> load -> view('blogs',array(
                'articles' => $articles,
                'types' => $types
            ));
        }
//        $this -> load -> view('blogs');
    }

    public function edit(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('article_model');
        $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);

        $this -> load -> model('article_type_model');
        $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
        if($articles){
            $this -> load -> view('edit',array(
                'articles' => $articles,
                'types' => $types
            ));
        }
    }
    public function add_type(){
        $loginUser = $this -> session -> userdata('loginUser');
        $type_name = $this -> input -> post('type_name');
        $this -> load -> model('article_type_model');
        $rows = $this -> article_type_model -> add_type_by_user($type_name,$loginUser -> user_id);
        if($rows > 0){
            $loginUser = $this -> session -> userdata('loginUser');
            $this -> load -> model('article_model');
            $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);

            $this -> load -> model('article_type_model');
            $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
            if($articles){
                $this -> load -> view('edit',array(
                    'articles' => $articles,
                    'types' => $types
                ));
            }
        }else{
            echo 'fail';
        }
    }
    public function delete_type(){
//        $loginUser = $this -> session -> userdata('loginUser');
        $type_id = $this -> input ->get('type_id');
        $this -> load -> model('article_type_model');
        $rows = $this -> article_type_model -> delete_type_by_user($type_id);
        if($rows > 0){
            $loginUser = $this -> session -> userdata('loginUser');
            $this -> load -> model('article_model');
            $articles = $this -> article_model -> get_articles_by_user($loginUser -> user_id);

            $this -> load -> model('article_type_model');
            $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
            if($articles){
                $this -> load -> view('edit',array(
                    'articles' => $articles,
                    'types' => $types
                ));
            }
        }else{
            echo 'fail';
        }
    }

    public function blog_comments() {
        $user_id = $this -> session -> userdata('loginUser')->user_id;
        $this -> load -> model('comment_model');
        $results = $this -> comment_model -> get_comment_by_user($user_id);
        $this -> load -> view('blog_comments',array(
            'results' => $results
        ));
    }
    public function change_pwd(){
        $this -> load -> view('change_pwd');
    }

    public function change_password(){
        $loginUser = $this -> session -> userdata('loginUser');
        $pwd = $this -> input -> post('pwd');
        $this -> load -> model('user_model');
        $row = $this -> user_model -> check_pwd_by_user($pwd,$loginUser -> user_id);
        if($row){
            $newpwd = $this -> input -> post('newpwd');
            $newpwd2 = $this -> input -> post('newpwd2');
            if($newpwd == $newpwd2){
                $this -> load -> model('user_model');
                $rows = $this -> user_model -> update_pwd_by_user($newpwd,$loginUser -> user_id);
                if($rows){
                    redirect('welcome/login');
                }else{
                    echo 'fail';
                }
            }

        }else{
            echo "密码输入错误";
        }
    }
    public function check_pwd(){
        $pwd = $this -> input -> get('pwd');
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('user_model');
        $row = $this -> user_model -> check_pwd_by_user($pwd,$loginUser -> user_id);
        if($row){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function profile(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('user_model');
        $row = $this -> user_model -> get_by_user($loginUser -> user_id);
        if($row){
            $this -> session -> unset_userdata('loginUser');
            $this -> session -> set_userdata('loginUser',$row);
            $this -> load -> view('profile');
        }else{
            echo 'fail';
        }

    }
    public function save_personal_data(){
        $loginUser = $this -> session -> userdata('loginUser');
        $username = $this -> input -> post('username');
        $gender = $this -> input -> post('gender');

        $y = $this -> input -> post('y');
        $m = $this -> input -> post('m');
        $d = $this -> input -> post('d');
        $birthday = $y .'-'.$m .'-'.$d;
        $province = $this -> input -> post('province');
        $city = $this -> input -> post('city');
        $mood = $this -> input -> post('mood');
        $this -> load -> model('user_model');
        $rows = $this -> user_model -> update_personal_data_by_user($username,$gender,$birthday,$province,$city,$mood,$loginUser->user_id);
        if($rows){
            redirect('admin/profile');
        }else{
            $this -> load -> view('profile');
        }


    }
    public function userSettings(){
        $this -> load -> view('userSettings');
    }
    public function change_userSettings(){
        $loginUser = $this -> session -> userdata('loginUser');
        $mood = $this -> input -> post('mood');
        $this -> load -> model('user_model');
        $row = $this -> user_model -> update_mood_by_user($mood,$loginUser->user_id);
        if($row){
            $up = $this -> user_model -> get_by_user($loginUser -> user_id);
            $this -> session -> unset_userdata('loginUser');
            $this -> session -> set_userdata('loginUser',$up);
            $this -> load -> view('userSettings');
        }else{
            $this -> load -> view('userSettings');
        }
    }

    public function inbox(){
        $this -> load -> view('inbox');
    }
    public function viewPost_comment(){
        $loginUser = $this -> session -> userdata('loginUser');
        $id = $this -> input -> get('id');
        $this -> load -> model('article_model');
        $prev =$next=null;
        $articles = $this -> article_model -> get_articles_by_user($loginUser->user_id);
        if($articles){
            foreach($articles as $k=>$article){
                if($articles[$k]->article_id == $id){
                        if($k-1<0){
                        }else{
                            $prev = $articles[$k - 1];
                        }
                        if($k+1>count($articles)-1){
                        }else{
                            $next =$articles[$k + 1];
                        }
                }
            }
        }
        $row = $this -> article_model -> get_article_by_id($id);
        if($row){
            $this -> load -> model('comment_model');
            $results = $this -> comment_model -> get_comment($row-> article_id);
            $this -> load -> view('viewPost_comment',array(
                'row' => $row,
                'prev' => $prev,
                'next' => $next,
                'results' => $results
            ));
        }else{
            echo 'fail';
        }


    }
    public function save_comment(){
        $user_id = $this -> session -> userdata('loginUser') -> user_id;
        $content = $this -> input -> post('content');
        $article_id = $this -> input -> post('article_id');
        $this -> load -> model('comment_model');
        $rows = $this -> comment_model -> save_comment($user_id,$content,$article_id);
        if($rows>0){

            redirect("admin/viewPost_comment?id=$article_id");
        }
    }
    public function delete_article_by_id(){
        $id = $this -> input -> get('id');
        $this -> load -> model('article_model');
        $rows = $this -> article_model -> delete_article_by_id($id);
        if($rows >0){
            redirect("viewPost_comment?id=$id");
        }
    }

}