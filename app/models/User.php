<?php
class User
{

  public string $username = '';
  public string $email = '';

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
    print('Here');
    $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':email', $data['email']);
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

    $hashedPassword = $row->password;

    if (password_verify($password, $hashedPassword)) {
      return $row;
    } else {
      return false;
    }
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
      print($this->db->rowCount());
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
}
