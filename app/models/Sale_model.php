<?php
// Definisi dari table produk
class Sale_model extends Model
{
    // Table
    protected static $table = 'sale';
    protected static $primaryKey = 'id';


    // Fields
    public $produk_id;
    public $date;
    public $jumlah;
}
?>
