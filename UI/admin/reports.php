<?php include ('layouts/head.php'); ?>
<style>
    .row {
        margin-left: 0px;
    }

    .reports tbody tr,
    th,
    td {
        height: 10px;
    }

    .col-4 {
        padding-left: 5px;
        padding-right: 5px;
        margin-bottom: 0;
    }

    table,
    th,
    td {
        border: 1px solid;
    }

    .form-control {
        height: 20px;
    }
</style>
<div class="main-wrapper">
    <?php include ('layouts/header.php'); ?>
    <?php include ('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid" id="container_color">

            <div class="card" style="margin-top:2%;" id="reportDetails">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Reports List</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped reports table-striped table-success"
                            id="data_table">
                            <thead class="bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Rider's Commission</th>
                                    <th scope="col">Owner's Commission</th>
                                    <th scope="col">GAS</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Report Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="reportsTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card" style="margin-top:2%;" id="reportPrint">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Reports Details</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="table-responsive">
                                <table class="reports" id="data_table">
                                    <p>Emong Malunggay Pandesal</p>
                                    <p>Branch Outlet: <span id="product_name"></span></p>
                                    <p>Sales and Production Report</p>
                                </table>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="table-responsive">
                                <table class="reports" id="data_table">
                                    <tr>
                                        <th>DATE</th>
                                        <td colspan="4" id="report_date"></td>
                                        <th>TOTAL PLANCHA</th>
                                        <td id="total_plantsa"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>TIME: (BENTA) </td>
                                        <th>AM</th>
                                        <td>TIME: (BENTA) PM</td>
                                        <th>PM</th>
                                        <th>TOTAL</th>
                                        <th>TOTAL SACK</th>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>AM (AMOUNT)</td>
                                        <td id="am_amount"></td>
                                        <th>PM (AMOUNT)</th>
                                        <th id="pm_amount">₱0.00</th>
                                        <th>₱638.00</th>
                                        <th>AVERAGE:</th>
                                        <td></td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="table-responsive text-center">
                            <table class="reports " style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th rowspan="2">DELIVERIES</th>
                                        <th rowspan="2">DATE NG MASA</th>
                                        <th colspan=" 3">NO. OF PRODUCTION FOR SALE</th>
                                        <th colspan="2">B.O.</th>
                                        <th colspan="2">SOLD</th>
                                        <th colspan="2">PESO VALUE</th>
                                        <th></th>

                                    </tr>
                                    <tr>
                                        <th>SACK</th>
                                        <th>PLANCHA</th>
                                        <th>PCS.</th>
                                        <th>PLANCHA</th>
                                        <th>PCS.</th>
                                        <th>PLANCHA</th>
                                        <th>PCS.</th>
                                        <th>SP</th>
                                        <th>VALUE</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1ST DELIVERY</td>
                                        <td id="am_date"></td>
                                        <td></td>
                                        <td id="plantsa_am"></td>
                                        <td id="total_pcs_am"></td>
                                        <td id="bo_am"></td>
                                        <td id="total_bo_am"></td>
                                        <td id="pcs_am"></td>
                                        <td id="total_pcs_sold_am"></td>
                                        <td></td>
                                        <td id="total_am_value">750.00</td>
                                        <td id="total_am_deduction">112</td>




                                    </tr>
                                    <tr>
                                        <td>2ND DELIVERY</td>
                                        <td>03/23/24</td>
                                        <td></td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0 + 0</td>
                                        <td>0</td>
                                        <td>0 + 0</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0.00</td>
                                        <td>0</td>




                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-4 border border-dark text-center  " style="height: 300px">
                            <div class="font-weight-bold d-inline-block">EMONG</div>
                        </div>
                        <div class="col-4 text-center">
                            <table class="reports">
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
                                        <td><input type="number" id="onek" class="form-control denomination" value="0">
                                        </td>
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
                                        <td><input type="number" id="twoh" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="100">
                                        <td>100.00</td>
                                        <td><input type="number" id="oneh" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="50">
                                        <td>50.00</td>
                                        <td><input type="number" id="fiftyp" class="form-control denomination"
                                                value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="20">
                                        <td>20.00</td>
                                        <td><input type="number" id="twentyp" class="form-control denomination"
                                                value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="10">
                                        <td>10.00</td>
                                        <td><input type="number" id="tenp" class="form-control denomination" value="0">
                                        </td>
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
                                        <td><input type="number" id="onep" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="font-weight-bold">AM Total</td>

                                        <td class="total-amount font-weight-bold">0.00</td>
                                    </tr>


                                </tbody>
                            </table>
                            <table class="reports">
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
                                        <td><input type="number" id="onek" class="form-control denomination" value="0">
                                        </td>
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
                                        <td><input type="number" id="twoh" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="100">
                                        <td>100.00</td>
                                        <td><input type="number" id="oneh" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="50">
                                        <td>50.00</td>
                                        <td><input type="number" id="fiftyp" class="form-control denomination"
                                                value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="20">
                                        <td>20.00</td>
                                        <td><input type="number" id="twentyp" class="form-control denomination"
                                                value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>
                                    <tr data-denomination="10">
                                        <td>10.00</td>
                                        <td><input type="number" id="tenp" class="form-control denomination" value="0">
                                        </td>
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
                                        <td><input type="number" id="onep" class="form-control denomination" value="0">
                                        </td>
                                        <td class="amount">0.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="font-weight-bold">PM Total</td>

                                        <td class="total-amount font-weight-bold">0.00</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="col-4">

                        </div>
                    </div>

                </div>

            </div>
            <button class="btn btn-primary" id="printReport">PRINT</button>

        </div>
    </div>
</div>
<script src="js/reports.js"></script>
<?php include ('layouts/footer.php'); ?>