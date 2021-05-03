<?php
class Category
{
  function __construct() {
    $this->db = new Database();
  }

  function getAllCategory() {
    $this->db->query("SELECT category_name,cate_id,status,created_at,updated_at,username FROM categories JOIN users ON categories.user_id = users.id ORDER BY created_at DESC");
    $resault  =  $this->db->resultSet();
    return $resault;
  }

  //  this function create category
  public function create($data) {
    $this->db->query("INSERT INTO categories ( category_name, status, user_id,created_at) VALUES (:category_name, :status, :user_id,:created_at )");
    $this->db->bind(':category_name', $data['category_name']);
    $this->db->bind(':status', $data['status']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':created_at', date("Y-m-d H:i:s"));

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //update product by id 
  public function updateCategoryById($data, $cate_id) {
    $nowStr = date("Y-m-d H:i:s");
    $this->db->query('UPDATE categories SET category_name =:category_name , user_id =:user_id , updated_at=:updated_at WHERE cate_id=:cate_id');
    $this->db->bind(':category_name', $data['category_name']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':cate_id',  $cate_id);
    $this->db->bind(':updated_at', $nowStr);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //create function delete product
  public function deleteCategoryById($cate_id) {
    $this->db->query('DELETE FROM categories  WHERE cate_id=:cate_id');
    $this->db->bind(':cate_id', $cate_id);
    $this->db->execute();
    return $this->db->rowCount();
  }

  //find pdouct by id
  public function findCategoryById($cate_id) {
    $this->db->query('SELECT * FROM categories WHERE cate_id = :cate_id');
    $this->db->bind(':cate_id', $cate_id);
    $result = $this->db->single();
    return $result;
  }
}
