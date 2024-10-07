<?php
if(!session_id()) session_start();
// menrequire semua file penting yang dibutuhkan oleh aplikasi
require_once '../app/init.php';
use App\App;
$app = new App;