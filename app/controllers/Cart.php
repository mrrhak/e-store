<?php
class Cart extends Controller {
	public  function __construct() {
		parent::__construct(); // For init session
    $this->Cart = $this->model('Cart');
		// $this->db = new Database();
		if ($this->session->get('user_id')) {
			if ($this->user->role != 'admin') {
				header('location: ' . URLROOT);
			}
		} else {
			header('location: ' . URLROOT . '/auth/login');
		}
	}
  public function create(){
    header('Content-type: application/json');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'user_id' => strtolower(trim($_POST['user_id'])),
        'product_id' => strtolower(trim($_POST['product_id'])),
        'qty' => trim($_POST['qty']),
      ];

      $errors = [];
      if((int)$data['qty']<1){
        $errors['qtyError'] = 'Please enter username';
      }
      if(empty($errors)){
        // Register user from model function
        if($this->Cart->store($data)){
          // Redirect to the login page
          http_response_code(201);
          echo json_encode($data);
        }
      }
      else{
        http_response_code(404);
        echo json_encode([
            'errors' => $errors
        ]);
      }

    }
  }

}