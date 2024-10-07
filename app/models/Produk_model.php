<?php
// Definisi dari table produk
class Produk_model extends Model
{
    // Table
    protected static $table = 'produk';
    protected static $primaryKey = 'id';


    // Fields
    public $id;
    public $nama;
    public $deskripsi;
    public $harga;
    public $stok;
    public $gambar;
}
?>
