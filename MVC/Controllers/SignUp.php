<?php  

	class SignUp extends Controller{

		public $userModel;

		public function __construct(){
			$this->userModel = $this->Model("UserModel");
		}

		public function index(){
			$this->View("Master_login",[
				'page' => 'signup'
			]);
		}

		public function processSignUp(){
			if(isset($_POST['signup'])){
				$userData = [
					'username' => $_POST['username'],
					'fullname' => $_POST['fullname'],
					'email' => $_POST['email'],
					'password' => $_POST['password'], 
					'usernameError' => '',
					'emailError' => '',
					'passwordError' =>''
				];
				//Kiem tra username, email, password
				if(empty($userData['username'])){
					$userData['usernameError'] = 'Username is required';
				}else{
					$result =  $this->userModel->checkUser($userData['username']);
					if(!$result){
						$userData['usernameError'] = 'Username is already exist';	
					}
				}
				if(empty($userData['email'])){
					$userData['emailError'] = 'Email is required';
				}
				if(empty($userData['password'])){
					$userData['passwordError'] = 'Password is required!';
				}else if(strlen($userData['password']) < 5){
					$userData['passwordError'] = 'Password must be 5 characters long!';
				}

				if(empty($userData['usernameError']) && empty($userData['emailError']) && empty($userData['passwordError'])){
					$password = password_hash($userData['password'], PASSWORD_DEFAULT);
					$result = $this->userModel->InsertNewUser($userData['username'],$userData['fullname'],$userData['email'],$password);
					if($result){
						$this->setFlash("accountCreated", "Your account has been created successful");
						$this->redirect('SignIn');

					}
					
				}else{
					
					$this->View("Master_login",[
						'page' => 'signup', 
						'username' => $_POST['username'],
						'fullname' => $_POST['fullname'],
						'email' => $_POST['email'],
						'password' => $_POST['password'], 
						'usernameError' => $userData['usernameError'],
						'emailError' => $userData['emailError'],
						'passwordError' => $userData['passwordError']
					]);
				}
				// $result = $this->userModel->InsertNewUser($username,$fullname,$email,$password);

				
			}
		}
	}
?>