<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("products", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData1'])) {
    $DBCRUDAPI->select("products", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        $product_name = htmlspecialchars($_POST["product_name"]);
        $product_price = htmlspecialchars($_POST["product_price"]);
        $item_per_plantsa = htmlspecialchars($_POST["item_per_plantsa"]);


        $DBCRUDAPI->insert('products', ['product_name' => $product_name, 'item_per_plantsa' => $item_per_plantsa, 'product_price' => $product_price]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $product_id = htmlspecialchars($_POST["product_id"]);
        $product_name = htmlspecialchars($_POST["product_name"]);
        $product_price = htmlspecialchars($_POST["product_price"]);
        $item_per_plantsa = htmlspecialchars($_POST["item_per_plantsa"]);


        $DBCRUDAPI->update('products', ['product_name' => $product_name, 'item_per_plantsa' => $item_per_plantsa, 'product_price' => $product_price], "product_id='$product_id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('roles', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>