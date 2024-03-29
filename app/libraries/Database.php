<?php
  class Database{
    private $dbHost = DB_HOST;
    //private $dbPort = DB_PORT;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;

    private $statement;
    private $dbHandlerl;
    private $error;

    public function __construct(){
      $conn = 'mysql:host='.$this->dbHost.';dbname='.$this->dbName;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try{
        $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
      }
      catch (PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Query
    public function query($sql){
      $this->statement = $this->dbHandler->prepare($sql);
    }

    // Bind values
    public function bind($parameter, $value, $type = null){
      switch (is_null($type)){
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }

      $this->statement->bindValue($parameter, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
      return $this->statement->execute();
    }

    // Return an array
    public function resultSet():array{
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Return a specific row as an object
    public function single(){
      $this->execute();
      return $this->statement->fetch(PDO::FETCH_OBJ);
    }
    
    public function count(){
      $this->execute();
      return $this->statement->fetchColumn();
    }

    // Get's row count
    public function rowCount(){
      return $this->statement->rowCount();
    }
    
    public function lastInsertId(){
      return $this->dbHandler->lastInsertId();
    }
  }
