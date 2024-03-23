<?php include ('layouts/head.php') ?>
<style>
    #sales_info {
        width: 100%;
        max-width: 600px;
        margin: auto;
        padding: 20px;
        margin-top: 50px;
        box-shadow: 0 4px 6px rgba(01, 0, 0, 0.1);
    }

    @media (min-width: 992px) {

        #sales_info {
            width: 50%;
        }
    }

    .back-button {
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #28a745;
        border-color: #28a745;
    }

    .back-button:hover .fas {
        color: white;
    }
</style>

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
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget dash-widget5">
                        <div class="dash-widget-info text-left d-inline-block">
                            <span id="product_name">JUMBO</span>
                            <h3>₱10</h3>
                        </div>
                        <span class="float-right"><img src="assets/img/dash/jumbo.jpg" width="80" alt="" /></span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget dash-widget5">
                        <div class="dash-widget-info text-left d-inline-block">
                            <span id="product_name">SPANISH</span>
                            <h3>₱10</h3>
                        </div>
                        <span class="float-right"><img src="assets/img/dash/spanish.jpg" width="80" alt="" /></span>
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
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="Total Plantsa">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="item_per_plantsa" class="col-form-label col-md-4">B.O.</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="item_per_plantsa" name="item_per_plantsa"
                                placeholder="B.O.">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-form-label col-md-4">Gas</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="product_price" name="product_price"
                                placeholder="GAS">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-form-label col-md-4 font-weight-bold">Total</label>
                        <div class="col-md-8">
                            <p id="totalAmount" class=" font-weight-bold"></p>
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
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="500">
                                    <td>500.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="200">
                                    <td>200.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="100">
                                    <td>100.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="50">
                                    <td>50.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="20">
                                    <td>20.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="10">
                                    <td>10.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="5">
                                    <td>5.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>
                                <tr data-denomination="1">
                                    <td>1.00</td>
                                    <td><input type="number" class="form-control denomination" value="0"></td>
                                    <td class="amount">0.00</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="font-weight-bold">Total</td>

                                    <td class="total-amount font-weight-bold">0.00</td>
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