<?php
/**
* PDO Singleton Class v.1.0
*
* @author Ademílson F. Tonato
* @link https://twitter.com/ftonato
*
*/
class DB {

	protected static $instance;
	protected function __construct() {}

	public static function getInstance() {

		if(empty(self::$instance)) {
			$db_info = array(
				"db_host" => DB_HOST,
				"db_port" => "3306",
				"db_user" => DB_USER,
				"db_pass" => DB_PASS,
				"db_name" => DB_NAME,
				"db_charset" => "UTF-8");
			try {
        $options = array(
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
				self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass'],$options);				
			} catch(PDOException $error) {
				echo $error->getMessage();
			}
		}
		return self::$instance;
	}

}

?>

<!-- $pdo_edit_product = $db->prepare('UPDATE products SET productCode = :product_code,productName = :product_name,
                                            listPrice = :product_price , categoryID = :category_id 
                                        WHERE productID = :product_id' );
    $pdo_edit_product->execute(array(':product_code' => $product_code ,':product_name' => $product_name , 
                                    ':product_price' => $product_price , ':category_id' => $category_id , 
                                    ':product_id' => $product_id));
    $pdo_edit_product->closeCursor(); -->