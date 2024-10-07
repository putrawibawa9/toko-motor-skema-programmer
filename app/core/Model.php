<?php
// Mendefinisikan model dasar
abstract class Model
{
    protected static $table;
    protected static $primaryKey;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public static function search(){
        $instance = new static();
        $instance->db->query('SELECT * FROM ' . static::$table . ' WHERE nama LIKE :query');
        $instance->db->bind(':query', '%' . $_POST['query'] . '%');
        return $instance->db->resultSet();
    }

    public static function saleWithProduk(){
        $instance = new static();
        $instance->db->query('SELECT sale.id, sale.date, sale.jumlah, produk.nama, sale.produk_id, produk.harga, produk.gambar FROM sale JOIN produk ON sale.produk_id = produk.id');
        return $instance->db->resultSet();
    }

    public static function calculateStock(){
        $instance = new static();
        $instance->db->query('SELECT SUM(stok) as total FROM ' . static::$table);
        return $instance->db->single();
    }

    public static function decreseStock($id, $quantity){
        $instance = new static();
        $instance->db->query('UPDATE ' . static::$table . ' SET stok = stok - :quantity WHERE '. static::$primaryKey. '=:id');
        $instance->db->bind(':quantity', $quantity);
        $instance->db->bind(':id', $id);
        $instance->db->execute();
        return $instance->db->rowCount();
    }

    public static function all()
    {
        $instance = new static();
        $instance->db->query('SELECT * FROM ' . static::$table);
        return $instance->db->resultSet();
    }

    public static function find($id)
    {
        $instance = new static();
        $instance->db->query('SELECT * FROM ' . static::$table .' WHERE '. static::$primaryKey. '=:id');
        $instance->db->bind(':id', $id);
        return $instance->db->single();
        
    }

    public static function delete($id)
    {
        $instance = new static();
        $instance->db->query('DELETE FROM ' . static::$table . ' WHERE '. static::$primaryKey. '=:id');
        $instance->db->bind(':id', $id);
        $instance->db->execute();
        return $instance->db->rowCount();
    }

    public function insert()
    {
        $fields = get_object_vars($this);
        unset($fields['db']);

        $columns = implode(', ', array_keys($fields));
        $placeholders = ':' . implode(', :', array_keys($fields));

        $sql = 'INSERT INTO ' . static::$table . ' (' . $columns . ') VALUES (' . $placeholders . ')';
        $this->db->query($sql);
        foreach ($fields as $field => $value) {
            $this->db->bind(':' . $field, $value);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }

     public function update()
    {
        $fields = get_object_vars($this);
        unset($fields['db']);


        $setString = '';
        foreach ($fields as $field => $value) {
            $setString .= $field . ' = :' . $field . ', ';
        }
        $setString = rtrim($setString, ', ');

        $sql = 'UPDATE ' . static::$table . ' SET ' . $setString . ' WHERE '. static::$primaryKey. '=:id';
        $this->db->query($sql);
        foreach ($fields as $field => $value) {
            $this->db->bind(':' . $field, $value);
        }
        $this->db->bind(':id', $fields['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($data){

    $this->db->query("SELECT * FROM admin WHERE username = :username");
    $this->db->bind('username', $data['username']);
    $passDB = $this->db->single();
    if(isset($passDB['password'])){
        $passwordVerify = password_verify($data['password'], $passDB['password']);
    }
    if($passwordVerify){
        return $data['username'];
    }
}
}
?>
