<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    
<?php
// Reading data from Json
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://dummyjson.com/products');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);

$product_details = $obj->products;

?>
<!-- Prodct listing start -->
<div class="container">
    <div class="row">

    <?php if(!empty($product_details)) {

        foreach($product_details as $product_dt) { ?>
            <div class="col-sm-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $product_dt->thumbnail?>" class="card-img-top" alt="product image">
                    <div class="card-body">
                        <h3 class="card-title">#<?= $product_dt->id ?></h3>
                        <h4 class="card-title"> <?= $product_dt->title ?></h4>
                        <h5 class="card-title"><?= '$ '. $product_dt->price ?></h5>
                        <p class="card-text"><?=  $product_dt->description ?></p>
                    </div>
                </div>
            </div>
        <?php   
        }

    }

    ?>
       
    </div>
</div>
<!-- Prodct listing end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>