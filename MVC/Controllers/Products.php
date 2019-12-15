<?php
class Products extends Controller
{
    public $productModel;
    public function __construct()
    {
        if (null === $this->getSession('userID')) {
            $this->redirect('SignIn');
        }

        $this->productModel = $this->Model('ProductManager');
    }

    public function index()
    {
        $r = $this->productModel->showProducts();
        $this->View("Master_page", [
            'page' => 'products',
            'data' => $r,
        ]);

    }

}
