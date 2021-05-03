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
    $this->db->query("INSERT INTO carts (user_id, product_id, qty) VALUES (:carts, :product_id, :qty, :password)");
    $this->db->bind(':carts', $data['carts']);
    $this->db->bind(':product_id', $data['product_id']);
    $this->db->bind(':qty', $data['qty']);
    // Execute function
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

}