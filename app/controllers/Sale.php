<?php
// Semua Controller untuk kebutuhan produk
use Controller\Controller;

class Sale extends Controller{
    public function index(){
        $data['produk'] = Produk_model::all();
        $data['totalStok'] = Produk_model::calculateStock();
        $this->view('produk/index', $data);
    }

      public function create(){
        $this->view('produk/create');
    }

      public function store(){
        // add new data to sale table
        $quantity = $_POST['quantity'];
        $sale = new Sale_model;
        $sale->produk_id = $_POST['produk_id'];
        $sale->date = date('Y-m-d');
        $sale->jumlah = $_POST['quantity'];
        // decrese the stock of the product
        $produk = Produk_model::find($sale->produk_id);
        Produk_model::decreseStock($sale->produk_id, $quantity);
         if($sale->insert() > 0){
      $data['success'] = 'Pesanan berhasil ditambahkan';
         $data['produk'] = Produk_model::all();
        $this->view('user/dashboard', $data);
        }
    }

        public function update()
    {
        $produk = new Produk_model;
       
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

       public function delete($id){
        if(Produk_model::delete($id) > 0){
           header('Location: '. BASEURL . '/produk/index');
        }
    }

      public function show($id){
        $data['produk'] = Produk_model::find($id);
        $this->view('produk/show', $data);

    }

    public function printPDF(){
        $data['sale'] = Sale_model::saleWithProduk();
        $this->view('produk/print-pdf', $data);
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