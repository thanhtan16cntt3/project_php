<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <a href="/Project_web_admin/">Home</a>/
                </li>
                <li>
                    <a href="/Project_web_admin/products">Products</a>/
                </li>
                <li class="active">
                    Add Product
                </li>
            </ol>
        </div>
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="msg">
                        <?php
                            if (!empty($data['error'])) {
                                echo $data['error'];
                            }
                        ?>
                    </div>
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="/Project_web_admin/AddProduct/addProduct" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="name">Product Name
                                </label>
                                <input id="name" name="productName" type="text" class="form-control validate" />
                            </div>
                            <div style="color: red;">
                                <?php
                                    if (!empty($data['productName_ERROR'])) {
                                        echo $data['productName_ERROR'];
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="Brand">Brand</label>
                                <select class="custom-select tm-select-accounts" id="brand" name="brandName">
                                    <option selected>Select Brand</option>
                                    <?php $brand = $data['brand']?>
                                    <?php while ($row = mysqli_fetch_array($brand)): ?>
                                    <option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option>
                                    <?php endwhile?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="custom-select tm-select-accounts" id="category" name="categoryName">
                                    <option selected>Select category</option>
                                    <?php $category = $data['category']?>
                                    <?php while ($row = mysqli_fetch_array($category)): ?>
                                    <option value="<?php echo $row['categories_id']; ?>" ><?php echo strtoupper($row['categories_name']); ?></option>
                                    <?php endwhile?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="expire_date">Price
                                    </label>
                                    <input name="price" type="number" class="form-control validate"/>
                                    <div style="color: red;">
                                        <?php
                                            if (!empty($data['price_ERROR'])) {
                                                echo $data['price_ERROR'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="stock">Quantity
                                    </label>
                                    <input name="quantity" type="number" class="form-control validate"  />
                                    <div style="color: red;">
                                        <?php
                                            if (!empty($data['quantity_ERROR'])) {
                                                echo $data['quantity_ERROR'];
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="custom-file mt-3 mb-3">
                        <!-- <input type="file" class="form-control" name="images" > -->
                            <input type="file" name="images" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" />
                        </div>
                        <div style="color: red;">
                            <?php
                                if (!empty($data['img_ERROR'])) {
                                    echo $data['img_ERROR'];
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="add" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
