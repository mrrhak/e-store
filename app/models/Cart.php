<?php
class Cart {
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
      return $this->db->execute();
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }
  public function find($cartId,$status){
    $this->db->query("SELECT *,carts.qty as 'cart_qty' FROM carts join products on carts.product_id = products.id where carts.status = :status and carts.cart_id = :cartId");
    $this->db->bind(':cartId', $cartId);
    $this->db->bind(':status', $status);
    $results = $this->db->single() ;
    return $results ;
  }
  public function deleteCart($id) {
    try {
      $this->db->query("DELETE FROM carts where cart_id = :id");
      $this->db->bind(':id', $id);
      return $this->db->execute();
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }
  public function getAllCart($userId,$status) {
    try {
      $this->db->query("SELECT *,carts.qty as 'cart_qty' FROM carts join products on carts.product_id = products.id where carts.status = :status and carts.user_id = :userId");
      $this->db->bind(':userId', $userId);
      $this->db->bind(':status', $status);
      return $this->db->resultSet();
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
  public function updateStatusCart($id,$status) {
    try {
      $this->db->query("UPDATE carts SET status = :status WHERE cart_id = :id");
      $this->db->bind(':id', $id);
      $this->db->bind(':status', $status);
      // Execute function
      if ($this->db->execute()) return true;  else return false;
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }
  public function getCartByProductIdAndUserId($id,$userId,$status) {
    $this->db->query('SELECT * FROM carts WHERE product_id = :id AND user_id = :userId AND status = :status');
    $this->db->bind(':id', $id);
    $this->db->bind(':userId', $userId);
    $this->db->bind(':status', $status);
    $result = $this->db->single();
    return $result;
  }
  public function countCartByUserId($user_id,$status) {
    try {
      $this->db->query('SELECT COUNT(*) FROM carts JOIN users ON carts.user_id = users.id WHERE id = :user_id AND status = :status');
      $this->db->bind(':user_id', $user_id);
      $this->db->bind(':status', $status);
      return $this->db->count();
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }    
  }

}