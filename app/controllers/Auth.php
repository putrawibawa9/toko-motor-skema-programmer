<?php
// Semua Controller untuk kebutuhan autentikasi
use Controller\Controller;
class Auth extends Controller{
    public function login(){
      $this->view('auth/login');
    }

    public function signin(){
        $auth = new Auth_model;
        if($auth->login($_POST)){
          $admin = $auth->login($_POST);
          setcookie("admin", $admin, time() + 3600, '/');
            header('Location: '. BASEURL . '/produk/index');
      }else{
        header("Location: ../index.php?status=0");
        exit();
      };
    }

    public function logout(){
        session_destroy();
        header('Location: '. BASEURL . '/auth/login');
    }

    public function register(){
      $auth = new Auth_model;
      $auth->username = $_POST['username'];
      $auth->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if($auth->insert() > 0){
           header('Location: '. BASEURL . '/auth/login');
        }
    }

}