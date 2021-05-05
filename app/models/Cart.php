<?php
class Cart {

  public int $cart_id;
  public int $user_id;
  public int $product_id;
  public int $qty;
  public int $created_at;
  public int $status = 0;

  private Database $db;

  public function __construct(){
    $this->db = new Database;
  }
  
  public function addCard($data) {
    try {
      $this->db->query("INSERT INTO carts (user_id, product_id, qty) VALUES (:user_id, :product_id, :qty)");
      $this->db->bind(':user_id', $data['userId']);
      $this->db->bind(':product_id', $data['productId']);
      $this->db->bind(':qty', $data['qty']);
      // Execute function
      if ($this->db->execute()) return true;  else return false;
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }
  public function updateQtyCart($id,$qty) {
    try {
      $this->db->query("UPDATE carts SET qty = :qty WHERE cart_id = :id");
      $this->db->bind(':id', $id);
      $this->db->bind(':qty', $qty);
      // Execute function
      if ($this->db->execute()) return true;  else return false;
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }
  public function getCartByProductId($id) {
    $this->db->query('SELECT * FROM carts WHERE product_id = :id');
    $this->db->bind(':id', $id);
    $result = $this->db->single();
    return $result;
  }
  public function countCartByUserId($user_id) {
    try {
      $this->db->query('SELECT COUNT(*) FROM carts JOIN users ON carts.user_id = users.id WHERE id = :user_id');
      $this->db->bind(':user_id', $user_id);
      return $this->db->count();
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }

}