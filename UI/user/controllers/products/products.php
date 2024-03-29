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
} else {
    if (isset($_POST['addNew'])) {
        $product_id = htmlspecialchars($_POST["product_id"]);
        $am_pm = htmlspecialchars($_POST["am_pm"]);
        $total_plantsa = htmlspecialchars($_POST["total_plantsa"]);
        $bo = htmlspecialchars($_POST["bo"]);
        $gas = htmlspecialchars($_POST["gas"]);
        $sales_total = htmlspecialchars($_POST["sales_total"]);
        $rider_commission = htmlspecialchars($_POST["rider_commission"]);
        $owner_commission = htmlspecialchars($_POST["owner_commission"]);
        $subTotal = htmlspecialchars($_POST["subTotal"]);

        $last_inserted_id = $DBCRUDAPI->insertReturnId('sales', [
            'product_id' => $product_id,
            'am_pm' => $am_pm,
            'total_plantsa' => $total_plantsa,
            'bo' => $bo,
            'gas' => $gas,
            'sales_total' => $sales_total,
            'rider_commission' => $rider_commission,
            'owner_commission' => $owner_commission,
            'subTotal' => $subTotal
        ]);

        if ($last_inserted_id !== false) {
            $onek = htmlspecialchars($_POST["onek"]);
            $fiveh = htmlspecialchars($_POST["fiveh"]);
            $twoh = htmlspecialchars($_POST["twoh"]);
            $oneh = htmlspecialchars($_POST["oneh"]);
            $fiftyp = htmlspecialchars($_POST["fiftyp"]);
            $twentyp = htmlspecialchars($_POST["twentyp"]);
            $tenp = htmlspecialchars($_POST["tenp"]);
            $fivep = htmlspecialchars($_POST["fivep"]);
            $onep = htmlspecialchars($_POST["onep"]);
            $denomination_total = htmlspecialchars($_POST["denomination_total"]);

            $result = $DBCRUDAPI->insert('denomination', [
                'sales_id' => $last_inserted_id,
                'am_pm' => $am_pm,
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
    } else if (isset($_POST['update'])) {

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