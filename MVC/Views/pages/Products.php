<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb" >
            <li><a href="home.php">Home</a></li>/
            <li class="active">Products</li>
        </ol>

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="message">
                </div>
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width:10%;">Photo</th>
                            <th>Product Name</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                    <?php $r = $data['data']?>
                    <?php while ($row = mysqli_fetch_array($r)): ?>
                    <tr>
                        <th><img width="80" src="<?php echo $row['product_image']; ?>"></th>
                        <th><?php echo $row['product_name'] ?></th>
                        <th><?php echo number_format($row['rate']) . " VND" ?></th>
                        <th><?php echo $row['quantity'] ?></th>
                        <th><?php echo strtoupper($row['brand_name']) ?></th>
                        <th><?php echo strtoupper($row['categories_name']) ?></th>
                        <?php if ($row['status'] == 1): ?>
                        <th>
                            <label class='label label-success'>Available</label>
                        </th>
                        <?php else: ?>
                        <th><label class='label label-danger'>Not Available</label></th>
                        <?php endif?>
                        <th>
                            <a href="add-edit-product.php?edit=<?php echo $row['product_id'] ?> " ><i class="glyphicon glyphicon-edit"></i>Edit</a>
                            <a href="php_action/processProduct.php?delete=<?php echo $row['product_id'] ?>" style="color: red;"> <i class="glyphicon glyphicon-trash"></i> Remove</a>
                        </th>
                    </tr>
                    <?php endwhile?>
                </table>
            </div>
        </div>
    </div>
</div>