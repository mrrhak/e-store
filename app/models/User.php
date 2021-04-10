<?php
class User
{

  public string $username = '';
  public string $email = '';
  public string $role = '';

  private Database $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUsers()
  {
    $this->db->query("SELECT * FROM users");
    $result = $this->db->resultSet();
    return $result;
  }

  public function register($data)
  {
    $this->db->query("INSERT INTO users (username, email, role, password) VALUES (:username, :email, :role, :password)");
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':role', $data['role'] ?? 'customer');
    $this->db->bind(':password', $data['password']);

    // Execute function
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($username, $password)
  {
    $this->db->query('SELECT * FROM users WHERE username = :username');

    //Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->single();
    if($row){
      $hashedPassword = $row->password;
      if (password_verify($password, $hashedPassword)) {
        return $row;
      }
    }
    return false;
  }

  public function findUserByEmail($email)
  {
    //Prepared statement
    $this->db->query('SELECT * FROM users WHERE email = :email');

    //Email param will be binded with the email variable
    $this->db->bind(':email', $email);

    $this->db->execute();

    //Check if email is already registered
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByUsername($username)
  {
    //Prepared statement
    $this->db->query('SELECT * FROM users WHERE username = :username');
    $this->db->bind(':username', $username);
    $this->db->execute();

    //Check if username is already registered
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserById($id)
  {
    //Prepared statement
    $this->db->query('SELECT * FROM users WHERE id = :id');

    //Email param will be binded with the email variable
    $this->db->bind(':id', $id);

    $result = $this->db->single();
    return $result;
  }

  public function updateById($data, $id)
  {
    $this->db->query("UPDATE users SET username = :username, email = :email, role = :role, password = :password WHERE id = :id");
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':role', $data['role']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':id', $id);

    // Execute function
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteById($id)
  {
    //Prepared statement
    $this->db->query("DELETE FROM users WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
    return $this->db->rowCount();// 1, 0
  }

  
}