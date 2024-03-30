<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $product_name = $_GET["product_name"];
    $sales_date_created_at = $_GET["sales_date_created_at"];
    $DBCRUDAPI->selectleftjoin("sales", "products", "product_id", "product_id", [
        "products.product_name",
        "sales.*",
    ], "products.product_name ='$product_name' && sales.sales_date_created_at ='$sales_date_created_at'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}

?>