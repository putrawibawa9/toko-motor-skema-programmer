<?php
// Semua Controller untuk kebutuhan produk
use Controller\Controller;

class UserDashboard extends Controller{
    public function index(){
        $data['produk'] = Produk_model::all();
        $this->view('user/dashboard', $data);
    }

      public function create(){
        $this->view('produk/create');
    }

      public function store(){
       $gambar = $this->uploadGambar();
        if (!$gambar) {
            return false;
        }
    
        $produk = new Produk_model;
        $produk->nama = $_POST['nama'];
        $produk->deskripsi = $_POST['deskripsi'];
        $produk->harga = $_POST['harga'];
        $produk->stok = $_POST['stok'];
        $produk->gambar = $gambar;
        
        if($produk->insert() > 0){
         header('Location: '. BASEURL . '/produk/index');
        }
    }

       public function delete($id){
        if(Produk_model::delete($id) > 0){
           header('Location: '. BASEURL . '/produk/index');
        }
    }

      public function show($id){
        $data['produk'] = Produk_model::find($id);
        $this->view('produk/show', $data);

    }



     public function update()
    {

        $gambarLama = $_POST['gambarLama'];    
        $produk = new Produk_model;
          if($_FILES['gambar']['error']===4){
            $produk->gambar = $gambarLama;
        }else{
            $produk->gambar = $this->uploadGambar();
        }
        $produk->id = $_POST['id'];
        $produk->nama = $_POST['nama'];
        $produk->deskripsi = $_POST['deskripsi'];
        $produk->stok = $_POST['stok'];
        $produk->harga = $_POST['harga'];   
              //check whether user pick a new image or not
      
         if( $produk->update() > 0){
           header('Location: '. BASEURL . '/produk/index');
        }
    }

       public function uploadGambar(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile =  $_FILES['gambar']['size'];
        $error =  $_FILES['gambar']['error'];  
        $tmp =  $_FILES['gambar']['tmp_name'];  
      
        //cek apakah user sudah menambah gambar
      
        if($error ===4){
          echo "<script>
              alert ('Silahkan pilih gambar');
                </script>";
                return false;
        }
      
        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid =['jpg','jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile); 
        $ekstensiGambar = strtolower(end($ekstensiGambar)); 
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
          echo "<script>
              alert ('format gambar salah!');
                </script>";
                return false;
        }
      
        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000){
          echo "<script>
              alert ('Ukuran terlalu besar');
                </script>";
        }
      
        //generate nama file random
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
      
      
       //lolos semua hasil cek, lalu dijalankan
       move_uploaded_file($tmp, UPLOADGAMBAR  . $namaFileBaru);


      
        return $namaFileBaru;
    }

}