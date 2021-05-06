<?php
class Orders extends Controller {
	private $authUser;
	public  function __construct() {
		parent::__construct();
		$this->orderModel = $this->model('Order');
    $this->CartModel = $this->model('Cart');
    $this->userModel = $this->model('User');
    if ($userId = $this->session->get('user_id')) {
        $this->authUser = $this->userModel->findUserById($userId);
        if($this->authUser == null){
          $this->logout();
        }
    }
	}
  public function index(){
    $data = [
      'title' => 'Orders/Create',
      'page' => "orders",
      'orders' => $this->orderModel->getInfos(),
      'user' => $this->authUser ?? null,
    ];
    $this->view('backend/products/order', $data);

  }
  
  public function updateStatusOrder($id,$status){
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
      if($this->orderModel->updateStatus($id,$status))
        echo json_encode(['success' => 'Successfuly!']); 
      else 
        echo json_encode(['errors' => 'Failed!']);
    }    
  }

  public function ajaxPlaceOrder(){
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);      
      try {
        $cartIds = isset($_POST['cartIds']) ? $_POST['cartIds'] : '';
        $carts = [];
        if($cartIds!=''){
          foreach ($cartIds as $key => $value) {  
            $result = $this->CartModel->find($value,0);        
            if($result!=null) array_push($carts,$result);
          }
        }      
        $data = [ 
          'userId' => $this->session->get('user_id'),
          'carts' => empty($carts) ? '' : $carts, 
          'totalAmount' => isset($_POST['totalAmount']) ? $_POST['totalAmount'] : '', 
        ];        
        $result = $this->orderModel->store($data);
        if($result) foreach ($cartIds as $key => $id) $this->CartModel->updateStatusCart($id,1);
        echo json_encode(['success' => 'Place order successfuly!']);
      } catch (\Throwable $th) {
        echo json_encode(['errors'=>$th->getMessage()]) ;
      }
    }
  }
}