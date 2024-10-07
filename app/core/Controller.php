<?php
Namespace Controller;
// Ini adalah kontroller utama yang akan mengatur semua kontroller
class Controller {
    // Menampilkan presentasi layout
    public function view($view, $data = []){
        require_once "../app/views/$view.php";
    }

    public function repository($repository){
          require_once "../app/repositories/$repository.php";
          return new $repository;
    }
}