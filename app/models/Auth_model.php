<?php
// Definisi dari table admin
class Auth_model extends Model
{
    // Table
    protected static $table = 'admin';
    protected static $primaryKey = 'id';


    // Fields
    public $username;
    public $password;
}
?>
