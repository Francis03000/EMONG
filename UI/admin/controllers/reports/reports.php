<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getReport'])) {
    $product_id = htmlspecialchars($_GET['product_id']);
    $DBCRUDAPI->selectleftjoin(
        "sales",
        "products",
        "product_id",
        "product_id",
        [
            "products.product_name",
            "sales.*",
        ],
        "sales.product_id = '$product_id'"
    );
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
} else if (isset($_GET['getDataDenominationAm'])) {
    $sales_id = htmlspecialchars($_GET['sales_id']);

    $DBCRUDAPI->select("denomination", "*", "sales_id = '$sales_id'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataDenominationPm'])) {
    $sales_id = htmlspecialchars($_GET['sales_id']);

    $DBCRUDAPI->select("denomination", "*", "sales_id = '$sales_id'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}



?>