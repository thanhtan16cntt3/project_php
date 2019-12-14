<?php
class Home extends Controller
{
    public function index()
    {
        $this->View("Master_page", [
            'page' => 'Home',
        ]);
    }

    public function __construct()
    {
        if (null === $this->getSession('userID')) {
            $this->redirect('SignIn');
        }
    }

    public function Logout()
    {
        $this->unsetSession('userID');
        $this->destroySession();
        $this->redirect('SignIn');
    }
}
