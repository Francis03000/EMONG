<?php

include_once ('../../../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset ($_GET['getData'])) {
    $DBCRUDAPI->select("products", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset ($_POST['addNew'])) {
        $product_id = $_POST["product_id"];
        $total_plantsa = $_POST["total_plantsa"];
        $bo = $_POST["bo"];
        $gas = $_POST["gas"];
        $sales_total = $_POST["sales_total"];
        $rider_commission = $_POST["rider_commission"];
        $owner_commission = $_POST["owner_commission"];
        $subTotal = $_POST["subTotal"];

        $last_inserted_id = $DBCRUDAPI->insertReturnId('sales', [
            'product_id' => $product_id,
            'total_plantsa' => $total_plantsa,
            'bo' => $bo,
            'gas' => $gas,
            'sales_total' => $sales_total,
            'rider_commission' => $rider_commission,
            'owner_commission' => $owner_commission,
            'subTotal' => $subTotal
        ]);

        if ($last_inserted_id !== false) {
            $onek = $_POST["onek"];
            $fiveh = $_POST["fiveh"];
            $twoh = $_POST["twoh"];
            $oneh = $_POST["oneh"];
            $fiftyp = $_POST["fiftyp"];
            $twentyp = $_POST["twentyp"];
            $tenp = $_POST["tenp"];
            $fivep = $_POST["fivep"];
            $onep = $_POST["onep"];
            $denomination_total = $_POST["denomination_total"];

            $result = $DBCRUDAPI->insert('denomination', [
                'sales_id' => $last_inserted_id,
                'onek' => $onek,
                'fiveh' => $fiveh,
                'twoh' => $twoh,
                'oneh' => $oneh,
                'fiftyp' => $fiftyp,
                'twentyp' => $twentyp,
                'tenp' => $tenp,
                'fivep' => $fivep,
                'onep' => $onep,
                'denomination_total' => $denomination_total,
            ]);

            if ($result) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset ($_POST['update'])) {

        $product_id = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $item_per_plantsa = $_POST["item_per_plantsa"];


        $DBCRUDAPI->update('products', ['product_name' => $product_name, 'item_per_plantsa' => $item_per_plantsa, 'product_price' => $product_price], "product_id='$product_id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset ($_POST['delete'])) {

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