<?php
class Order {
  private Database $db;
  public function __construct(){
    $this->db = new Database;
  }
  
  public function getInfos(){
    $this->db->query('SELECT orders.order_id,orders.status,orders.total_amount,orders.order_date, users.username,users.phone,users.email FROM orders join users on users.id = orders.user_id ORDER BY orders.order_date DESC');
    return $this->db->resultSet();
  }

  public function updateStatus($id,$status){
    try {
      $this->db->query("UPDATE orders SET status = :status WHERE order_id = :id");
      $this->db->bind(':id', $id);
      $this->db->bind(':status', $status);
      // Execute function
      if ($this->db->execute()) return true;  else return false;
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    } 
  }

  public function store($data){
    try {
      $this->db->query("INSERT INTO orders (user_id, total_amount,order_date) VALUES (:userId, :totalAmount,:order_date)");
      $this->db->bind(':userId', $data['userId']);
      $this->db->bind(':order_date', date("Y-m-d H:i:s"));
      $this->db->bind(':totalAmount', $data['totalAmount']);
      if($this->db->execute()){
        $orderId = $this->db->lastInsertId();
        $carts = $data['carts'];
        foreach ($carts as $key => $carts) {
          $this->db->query("INSERT INTO order_details (order_id, product_id, product_qty, product_unit_price, amount) VALUES (:orderId,:productId,:productQty,:productUnitPrice,:amount)");
          $this->db->bind(':orderId', $orderId);
          $this->db->bind(':productId', $carts->product_id);
          $this->db->bind(':productQty', $carts->cart_qty);
          $this->db->bind(':productUnitPrice', $carts->price);
          $this->db->bind(':amount', $carts->cart_qty*$carts->price);
          $this->db->execute();
        }
        return true;
      }else return false;
    } catch (\Throwable $th) {
      throw new Exception($th->getMessage());
    }  
  }

  public function countOrder(){
    $this->db->query('SELECT * FROM orders');
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function getOrderByUserId($id){
    $this->db->query('SELECT orders.order_id,orders.status,orders.total_amount,orders.order_date, users.username,users.phone,users.email FROM orders join users on users.id = orders.user_id where users.id = :id');
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }

  public function getLatestOrders($limit){
    $this->db->query('SELECT orders.order_id,orders.status,orders.total_amount,orders.order_date, users.username,users.phone,users.email FROM orders join users on users.id = orders.user_id ORDER BY orders.order_date DESC LIMIT :limitNumber');
    $this->db->bind(':limitNumber', $limit);
    return $this->db->resultSet();
  }

  public function getProductBelongToOrderId($id){
    $this->db->query('SELECT orders.order_id,orders.status,orders.total_amount,orders.order_date,products.name,products.id as product_id,products.image,products.description,order_details.product_qty,order_details.product_unit_price,order_details.amount FROM `orders` JOIN order_details on orders.order_id = order_details.order_id JOIN products on order_details.product_id = products.id WHERE orders.order_id = :id');
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }


}