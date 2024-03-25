<?php include ('layouts/head.php') ?>
<link rel="stylesheet" href="css/index.css">


<div class="main-wrapper">

    <?php include ('layouts/header.php') ?>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Sales</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row " id="sales_contain">
                <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget dash-widget5">
                        <div class="dash-widget-info text-left d-inline-block">
                            <span id="product_name">REGULAR</span>
                            <h3>₱10</h3>
                        </div>
                        <span class="float-right"><img src="assets/img/dash/regular.jpg" width="80" alt="" /></span>
                    </div>
                </div> -->

            </div>
            <div id="sales_info">
                <button class="btn btn-success back-button" onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Back
                </button>

                <form id="mainForm" class="container">
                    <h2 class="text-center my-2">SALES DETAILS</h2>

                    <div class="form-group row">
                        <label for="product_name" class="col-form-label col-md-4">Total Plancha</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="0" id="total_plancha" name="total_plancha"
                                placeholder="Total Plantsa">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="item_per_plantsa" class="col-form-label col-md-4">B.O. (PCS)</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="bo" name="bo" value="0" placeholder="B.O.">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-form-label col-md-4">Gas</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="gas" value="0" name="gas" placeholder="GAS">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-form-label col-md-4 font-weight-bold">Total</label>
                        <div class="col-md-8">
                            <p id="totalAmount" class=" font-weight-bold"></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-form-label col-md-4 font-weight-bold">Rider's
                            Commission</label>
                        <div class="col-md-8">
                            <p id="rider_commission" class=" font-weight-bold"></p>
                        </div>
                    </div>



                    <div class="container mt-3">
                        <h2 class="text-center mb-4">DENOMINATION</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Denomination</th>
                                    <th>No. of Pcs</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-denomination="1000">
                                    <td>1000.00</td>
                                    <td><input type="number" id="onek" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="500">
                                    <td>500.00</td>
                                    <td><input type="number" id="fiveh" class="form-control denomination" value="0">
                                    </td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="200">
                                    <td>200.00</td>
                                    <td><input type="number" id="twoh" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="100">
                                    <td>100.00</td>
                                    <td><input type="number" id="oneh" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="50">
                                    <td>50.00</td>
                                    <td><input type="number" id="fiftyp" class="form-control denomination" value="0">
                                    </td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="20">
                                    <td>20.00</td>
                                    <td><input type="number" id="twentyp" class="form-control denomination" value="0">
                                    </td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="10">
                                    <td>10.00</td>
                                    <td><input type="number" id="tenp" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="5">
                                    <td>5.00</td>
                                    <td><input type="number" id="fivep" class="form-control denomination" value="0">
                                    </td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="1">
                                    <td>1.00</td>
                                    <td><input type="number" id="onep" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="font-weight-bold">Total</td>

                                    <td class="total-amount font-weight-bold">0.00</td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="text-center">
                                        <button type="button" id="submit-btn" class="btn btn-primary"
                                            disabled>SUBMIT</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </form>
            </div>




        </div>

    </div>
    <script src="js/index.js"></script>

    <?php include ('layouts/footer.php') ?>