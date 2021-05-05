<?php
class Carts extends Controller {
	private $authUser;
	public  function __construct() {
		parent::__construct(); // For init session
		$this->userModel = $this->model('User');
		$this->productModel = $this->model('Product');
    $this->Cart = $this->model('Cart');
		if ($userId = $this->session->get('user_id')) {
			$this->authUser = $this->userModel->findUserById($userId);
			if($this->authUser == null){
				$this->logout();
			}
	  }
	}
  public function index(){
    $userId = $this->session->get('user_id');
    if (!$userId) {
      header('location: ' . URLROOT.'/users/login');
    }
    $carts = $this->Cart->getAllCart($userId,0);
    $data = [
      'userId' => $userId,
      'user' => $this->authUser,
      'carts' => $carts
    ];
    
    $this->view('frontend/cart-view',$data);
  }

  public function ajaxCreate(){
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // echo json_encode(['success'=>'request succesfuly!','data' => $_POST]); 
      try {
        $data = [
          'userId' => isset($_POST['userId']) ? $_POST['userId'] : '',
          'productId' => isset($_POST['productId']) ? $_POST['productId'] : '',
          'qty' => $_POST['qty']
        ];
        $errors = [];    
        if($data['userId'] == '') $errors['user'] = 'Please login fisrt...!';
        if($data['qty'] < 1) $errors['qty'] = "Quatity can't less than 1...!"; 
        if(!empty($errors)) {echo json_encode(['errors'=>$errors]); return;};
        $cart = $this->Cart->getCartByProductIdAndUserId($data['productId'],$this->session->get('user_id'),0);
        if($cart!=null) $this->Cart->updateQtyCart($cart->cart_id,$cart->qty+$data['qty']); 
        else $this->Cart->addCard($data);

        $data['countCart'] = $this->countCartByUserId();

        echo json_encode(['success' => 'Product was add to cart successfuly','data' => $data]);
      } catch (\Throwable $th) {
        echo json_encode($th->getMessage()) ;
      }
    }
  }

  public function ajaxRemove($id){
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
      try {
        $result = $this->Cart->deleteCart($id);
        echo json_encode(['success' => 'remove product from cart success!']);
        //echo json_encode($result);
      } catch (\Throwable $th) {
        echo json_encode($th->getMessage()) ;
      }
    }
  }
  public function ajaxUpdateCartQty($id,$qty){
    $userId = $this->session->get('user_id');
    if (!$userId) {
      header('location: ' . URLROOT.'/users/login');
    }
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
      try {
        $data = $this->Cart->updateQtyCart($id,$qty);
        if($data!=null) echo json_encode(['success' => 'update quantity success!','data'=>$data]);
        else echo json_encode(['errors' => 'update quantity was failed!']);
      } catch (\Throwable $th) {
        echo json_encode($th->getMessage()) ;
      }
    }
  }

  public function countCartByUserId(){
    header('Content-type: application/json');
    $userId = $this->session->get('user_id');
    if(!$userId) return;
    $result = $this->Cart->countCartByUserId($userId,0);
    if($_SERVER['REQUEST_METHOD'] == 'GET') echo json_encode(['countCart'=> $result]);
    else return $result;
  }
	public function logout() {
    $this->session->remove('user_id');
    $this->session->remove('username');
    header('location:' . URLROOT . '/users/login');
  }
}