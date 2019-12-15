<?php
class AddProduct extends Controller
{
    public $Category;
    public $Brand;
    private $ProductModel;

    public function __construct()
    {
        if (null === $this->getSession('userID')) {
            $this->redirect('SignIn');
        }

        $this->ProductModel = $this->Model('ProductManager');
        $this->category = $this->ProductModel->showCategories();
        $this->brand = $this->ProductModel->showBrands();
    }
    public function index()
    {
        $this->View('Master_page', [
            'page' => 'addProduct',
            'category' => $this->category,
            'brand' => $this->brand,
        ]);
    }

    public function addProduct()
    {
        if (isset($_POST['add'])) {

            $max_size = 100000;
            $url = '';
            $nameImages = $_FILES['images']['name'];
            $tmpImages = $_FILES['images']['tmp_name'];

            $product_name = $_POST['productName'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $brand_name = $_POST['brandName'];
            $category_name = $_POST['categoryName'];

            if (isset($nameImages) && !empty($nameImages)) {
                $extension = substr($nameImages, strpos($nameImages, '.') + 1);
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
                    $location = "../Project_web_admin/Public/images/product/";
                    $target = $location . basename($nameImages);
                    $url = 'Public/images/product/' . basename($nameImages);
                }
            }

            $dataProduct = [
                'category' => $this->category,
                'brand' => $this->brand,
                'productName' => $product_name,
                'quantity' => $quantity,
                'price' => $price,
                'brandName' => $brand_name,
                'categoryName' => $category_name,
                'img' => $url,
                'productName_ERROR' => '',
                'quantity_ERROR' => '',
                'price_ERROR' => '',
                'brandName_ERROR' => '',
                'categoryName_ERROR' => '',
                'img_ERROR' => '',
            ];

            if (empty($dataProduct['productName'])) {
                $dataProduct['productName_ERROR'] = 'Name product is required';
            }
            if (empty($dataProduct['quantity'])) {
                $dataProduct['quantity_ERROR'] = 'Quantity is required';
            }
            if (empty($dataProduct['price'])) {
                $dataProduct['price_ERROR'] = 'Price is required';
            }
            if (empty($dataProduct['brandName'])) {
                $dataProduct['brandName_ERROR'] = 'Name brand is required';
            }
            if (empty($dataProduct['categoryName'])) {
                $dataProduct['categoryName_ERROR'] = 'Name category is required';
            }
            if (empty($dataProduct['img'])) {
                $dataProduct['img_ERROR'] = 'Image is required';
            }

            if (empty($dataProduct['productName_ERROR']) && empty($dataProduct['quantity_ERROR']) && empty($dataProduct['price_ERROR']) && empty($dataProduct['brandName_ERROR']) && empty($dataProduct['categoryName_ERROR']) && empty($dataProduct['img_ERROR'])) {
                $result = $this->ProductModel->addProduct($dataProduct['productName'], $dataProduct['quantity'], $dataProduct['price'], $dataProduct['brandName'], $dataProduct['categoryName'], $dataProduct['img']);
                if ($result['status'] == 'ok') {
                    move_uploaded_file($tmpImages, $target);
                    $this->redirect('products');
                } else {
                    $this->View('Master_page', [
                        'page' => 'addProduct',
                        'error' => $result['status'],
                        'category' => $category,
                        'brand' => $brand,
                    ]);
                }
            } else {
                $this->View('Master_page', [
                    'page' => 'addProduct',
                    'category' => $dataProduct['category'],
                    'brand' => $dataProduct['brand'],
                    'productName_ERROR' => $dataProduct['productName_ERROR'],
                    'quantity_ERROR' => $dataProduct['quantity_ERROR'],
                    'price_ERROR' => $dataProduct['price_ERROR'],
                    'brandName_ERROR' => $dataProduct['brandName_ERROR'],
                    'categoryName_ERROR' => $dataProduct['categoryName_ERROR'],
                    'img_ERROR' => $dataProduct['img_ERROR'],
                ]);
            }
        }
    }

}
