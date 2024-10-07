<?php
namespace App;
class App{
    // Menginisiasi variabel yang akan digunakan
    protected $controller = "auth";
    protected $method = "login";
    protected $params = [];

    // Constructor untuk mengatur controller, method, dan params
    public function __construct(){
        $url = $this->parseURL();

        // Get Controller Name
        if($url !== null && isset($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Mendapatkan method dari controller
        require_once "../app/controllers/$this->controller.php";
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Mendapatkan params dari url jika ada
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // Menjalankan controller, method, dan params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    // Fungsi untuk memparsing URL
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);    
            return $url;
        }
    }
}