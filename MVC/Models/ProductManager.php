<?php
class ProductManager extends Database
{
    public function showProducts()
    {
        $query = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id,
		 		product.categories_id, product.quantity, product.rate , product.status,
		 		brands.brand_name, categories.categories_name
		 		FROM product
				INNER JOIN brands ON product.brand_id = brands.brand_id
				INNER JOIN categories ON product.categories_id = categories.categories_id
                WHERE product.status = 1";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }
}
