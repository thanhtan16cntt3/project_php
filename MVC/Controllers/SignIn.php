<?php
class SignIn extends Controller
{
    public $userModel;
    public function __construct()
    {
        if (null !== $this->getSession('userID')) {
            $this->redirect('home');
        }
        $this->userModel = $this->Model('UserModel');
    }

    public function index()
    {
        $this->View("Master_login", [
            'page' => 'signin',
        ]);
    }

    public function processSignIn()
    {
        if (isset($_POST['signin'])) {
            $userData = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'usernameError' => '',
                'passwordError' => '',
            ];

            if (empty($userData['username'])) {
                $userData['usernameError'] = 'Username is required';
            }

            if (empty($userData['password'])) {
                $userData['passwordError'] = 'Password is required';
            }

            if (empty($userData['usernameError']) && empty($userData['passwordError'])) {
                $result = $this->userModel->userLogin($userData['username'], $userData['password']);

                if ($result['status'] === 'UsernameNotFound') {
                    $userData['usernameError'] = 'Sorry invalid username';
                    $this->View('Master_login', [
                        'page' => 'signin',
                        'username' => $_POST['username'],
                        'usernameError' => $userData['usernameError'],
                        'passwordError' => $userData['passwordError'],
                    ]);
                } else if ($result['status'] === 'PasswordNotMatched') {
                    $userData['passwordError'] = 'Password incorrect';
                    $this->View('Master_login', [
                        'page' => 'signin',
                        'username' => $_POST['username'],
                        'usernameError' => $userData['usernameError'],
                        'passwordError' => $userData['passwordError'],
                    ]);
                } else if ($result['status'] === 'ok') {
                    $this->setSession('userID', $result['userID']);
                    $this->redirect('Home');
                }

            } else {
                $this->View('Master_login', [
                    'page' => 'signin',
                    'username' => $_POST['username'],
                    'usernameError' => $userData['usernameError'],
                    'passwordError' => $userData['passwordError'],
                ]);
            }
        }

    }
}
