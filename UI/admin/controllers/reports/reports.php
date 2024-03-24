<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset ($_GET['getData'])) {
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
}



?>