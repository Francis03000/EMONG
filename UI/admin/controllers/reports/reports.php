<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectleftjoin("sales", "products", "product_id", "product_id", [
        "products.product_name",
        "sales.*",
    ]);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataReport'])) {
    $sales_date_created_at = htmlspecialchars($_GET['report_date']);
    $product_name = htmlspecialchars($_GET['product_name']);
    $am_pm = htmlspecialchars($_GET['am_pm']);


    $DBCRUDAPI->selectleftjoin("sales", "products", "product_id", "product_id", [
        "products.*",
        "sales.*",
    ], "sales_date_created_at = '$sales_date_created_at' && product_name = '$product_name' && am_pm = '$am_pm'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}



?>