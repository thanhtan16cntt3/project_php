<?php
class ProductManager extends Database
{
    public function showProducts()
    {
        $query = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
		 		product.categories_id, product.quantity, product.price , product.status,
		 		brands.brand_name, categories.categories_name
		 		FROM product
				INNER JOIN brands ON product.brand_id = brands.brand_id
				INNER JOIN categories ON product.categories_id = categories.categories_id
                WHERE product.status = 1";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function showBrands()
    {
        $query = "SELECT brand_id, brand_name FROM brands";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function showCategories()
    {
        $query = "SELECT categories_id, categories_name FROM categories";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function addProduct($productName, $quantity, $price, $brandName, $categoryName, $img)
    {
        $query = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, price)
                  VALUES ('$productName', '$img', '$brandName', '$categoryName', '$quantity', '$price')";

        if (mysqli_query($this->conn, $query)) {
            return ['status' => 'ok'];
        } else {
            $err = mysqli_error($this->conn);
            return ['status' => $err];
        }
    }
}
