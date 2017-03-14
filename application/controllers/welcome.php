<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *g
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
//        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('article_model');
        $articles =  $this -> article_model -> get_articles_by_user();
        $this->load->view('zhuye',array(
            'articles' => $articles
        ));


//        $this->load->view('zhuye');
    }

    public function person()
    {
        $loginUser = $this ->session -> userdata('loginUser');

        $this -> load -> model('article_model');
        $articles =  $this -> article_model -> get_articles_by_user($loginUser -> user_id);

        $this -> load -> model('article_type_model');
        $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
        $this -> load ->view('index',array(
            'types' => $types,
            'articles' => $articles
        ));
    }


    public function login()
    {
       $this -> load -> view('login');
    }
    public function login_out()
    {
        $this -> session -> unset_userdata('loginUser');
        redirect('welcome/login');
    }

    public function reg()
    {
        $this->load->view('reg');
    }
    public function check_login()
    {
        $username = $this -> input -> post('username');
        $password = $this -> input -> post('password');
        $submit = true;
        $arr = array();
        if($username == ''){
            $arr['error_name'] = "输入用户名不能为空";
            $submit = false;
        }
        if($password == ''){
            $arr['error_pass'] = "输入密码不能为空";
        }
        $arr = array(
            'username' => $username
        );
        if($submit){
            $this -> load -> model('user_model');
            $row = $this -> user_model -> get_by_name_pass($username,$password);
            if($row){

                $this -> session -> set_userdata('loginUser',$row);

                $loginUser = $this -> session -> userdata('loginUser');
                $this -> load -> model('article_model');
                $articles =  $this -> article_model -> get_articles_by_user($loginUser -> user_id);

                $this -> load -> model('article_type_model');
                $types = $this -> article_type_model -> get_types_by_user($loginUser -> user_id);
                $this -> load ->view('index',array(
                    'types' => $types,
                    'articles' => $articles
                ));
            }else{
                echo 'fail';
            }
        }else{
            $this -> load -> view('login',$arr);
        }

    }

    public function check_name()
    {
        $username = $this -> input -> get('username');
        $this -> load -> model('user_model');
       $result =  $this -> user_model -> get_by_name($username);
       if($result){
            echo 'fail';
       }else{
           echo 'success';
       }
    }


    public function do_reg()
    {
        $email = $this -> input -> post('email');
        $username = $this ->input -> post('username');
        $password = $this -> input -> post('password');
        $gender = $this -> input -> post('gender');
        $province = $this -> input ->post('province');
        $city = $this -> input -> post('city');
        $this -> load -> model('user_model');
        $rows = $this -> user_model -> save_name_pwd($email,$username,$password,$gender,$province,$city);
        if($rows > 0){
            $this -> load -> view('login');
        }else{
            $this -> load -> view('reg');
        }
    }

}
//	public function login()
//	{
//		$this->load->view('login');
//	}
//	public function reg()
//	{
//		$this->load->view('reg');
//	}
//	public function save()
//	{
//		$username = $this->input->post('username');
//		$password = $this->input->post('password');
//		$repassword = $this->input->post('repassword');
//		$submit = true;
//		$data = array();
//		if($username == ''){
//			$data['err_name'] = "请输入用户名";
//			$submit = false;
//		}
//		if($password == ''){
//			$data['err_pass'] = "密码不能为空";
//			$submit = false;
//		}
//		else if($password != $repassword){
//			$data['err_pass'] = "密码输入不一致";
//			$submit = false;
//		}
//
//		if($submit){
//			$this -> load ->model('user_model');
//			$rows = $this -> user_model -> save($username,$password);
//			if($rows > 0){
//				echo "<script>alert('注册成功')</script>";
//				echo "<script>location='login'</script>";
//			}else{
//				echo "<script>alert('注册失败')</script>";
//			}
//
//		}else{
//			$this -> load -> view('reg',$data);
//		}
//	}
//	public function check()
//	{
//		$username = $this->input->post('username');
//		$password = $this->input->post('password');
//		$this -> load ->model('user_model');
//		$row = $this -> user_model -> get_by_name_pwd($username,$password);
//		$submit = true;
//		$data = array();
//		if($username == ''){
//			$data['err_name'] = "请输入用户名";
//			$submit = false;
//		}
//		if($password == ''){
//			$data['err_pass'] = "密码不能为空";
//			$submit = false;
//		}
//
//		if($submit){
//			if($row){
//				echo "<script>alert('登陆成功')</script>";
//				echo "<script>location='hello'</script>";
//			}else{
//				echo "<script>alert('登陆失败')</script>";
//			}
//		}else{
//			$this -> load -> view('login',$data);
//		}
//	}
//	public function hello()
//	{
//		$this->load->view('hello');
//	}
//}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */