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

        margin-bottom: 0;
    }

    table,
    th,
    td {
        border: 1px solid;
    }

    . {
        height: 20px;
    }

    .text-right {
        text-align: right;
    }

    @media print {
        .print-table {
            border: 1px solid #000;
            /* Add border */
            padding: 10px;
            /* Add padding for better readability */
        }
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
            <div id="sales_report">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Reports Details</h5>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top:2%; " id="reportPrint">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="table-responsive">
                                    <table class="reports" id="data_table">
                                        <h3>Emong Malunggay Pandesal</h3>
                                        <h3>Branch Outlet: <span id="product_name"></span></h3>
                                        <h3>Sales and Production Report</h3>
                                    </table>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="table-responsive">
                                    <table class="reports m-0 p-0" id="data_table" style="width: 100%">
                                        <tr>
                                            <th>DATE</th>
                                            <td colspan="4" id="report_date"></td>
                                            <th>TOTAL PLANCHA</th>
                                            <td id="total_plantsa"></td>
                                        </tr>
                                        <tr>
                                            <td>TIME: (BENTA) </td>
                                            <th>AM</th>
                                            <td>TIME: (BENTA) PM</td>
                                            <th>PM</th>
                                            <th>TOTAL</th>
                                            <th>TOTAL SACK</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>AM (AMOUNT)</td>
                                            <td id="am_amount"></td>
                                            <th>PM (AMOUNT)</th>
                                            <th id="pm_amount"></th>
                                            <th id="total_day_amount"></th>
                                            <th>AVERAGE:</th>
                                            <td></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <div class="">
                            <div class="table-responsive text-center">
                                <table class="reports " style="width: 100%; ">
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
                                            <td id="total_am_value"></td>
                                            <td id="total_am_deduction"></td>




                                        </tr>
                                        <tr>
                                            <td>2ND DELIVERY</td>
                                            <td id="pm_date"></td>
                                            <td></td>
                                            <td id="plantsa_pm"></td>
                                            <td id="total_pcs_pm"></td>
                                            <td id="bo_pm"></td>
                                            <td id="total_bo_pm"></td>
                                            <td id="pcs_pm"></td>
                                            <td id="total_pcs_sold_pm"></td>
                                            <td></td>
                                            <td id="total_pm_value"></td>
                                            <td id="total_pm_deduction"></td>




                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="row border border-dark" style="margin-left: 0; margin-right: 0;">
                            <div class="col-4 p-0">
                                <div class=" border border-dark text-center  " style="height: 289px">
                                    <div class="font-weight-bold d-inline-block">EMONG</div>

                                </div>
                                <table style="width: 100%;" class="reports">
                                    <tbody>
                                        <tr>
                                            <td>TOTAL CASH SALES (1ST DELIVERY)</td>
                                            <td id="total_cash_am"></td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL CASH SALES (2ND DELIVERY)</td>
                                            <td id="total_cash_pm"></td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL SALES</td>
                                            <td id="total_day_sales"></td>
                                        </tr>
                                        <tr>
                                            <td>LESS EXPENSES (if any)</td>
                                            <td>₱0.00</td>
                                        <tr>
                                            <td>CASH BALANCE</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CASH COUNT</td>
                                            <td id="cash_count"></td>
                                        </tr>
                                        <tr>
                                            <td>SHORT/OVER</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>DATE DEPOSITED</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-4 p-0 text-center">
                                <table class="reports" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Denomination</th>
                                            <th>No. of Pcs</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-denomination="1000">
                                            <td class="col-4 p-0">1000.00</td>
                                            <td class="col-4 p-0"><input type="number" id="onek"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="500">
                                            <td class="col-4 p-0">500.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fiveh"
                                                    class=" text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="200">
                                            <td class="col-4 p-0">200.00</td>
                                            <td class="col-4 p-0"><input type="number" id="twoh"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="100">
                                            <td class="col-4 p-0">100.00</td>
                                            <td class="col-4 p-0"><input type="number" id="oneh"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="50">
                                            <td class="col-4 p-0">50.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fiftyp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="20">
                                            <td class="col-4 p-0">20.00</td>
                                            <td class="col-4 p-0"><input type="number" id="twentyp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="10">
                                            <td class="col-4 p-0">10.00</td>
                                            <td class="col-4 p-0"><input type="number" id="tenp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="5">
                                            <td class="col-4 p-0">5.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fivep"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="1">
                                            <td class="col-4 p-0">1.00</td>
                                            <td class="col-4 p-0"><input type="number" id="onep"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="font-weight-bold">AM Total</td>

                                            <td class="total-col-4 p-0 amount font-weight-bold">0.00</td>
                                        </tr>


                                    </tbody>
                                </table>
                                <table class="reports" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Denomination</th>
                                            <th>No. of Pcs</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-denomination="1000">
                                            <td class="col-4 p-0">1000.00</td>
                                            <td class="col-4 p-0"><input type="number" id="onek"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="500">
                                            <td class="col-4 p-0">500.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fiveh"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="200">
                                            <td class="col-4 p-0">200.00</td>
                                            <td class="col-4 p-0"><input type="number" id="twoh"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="100">
                                            <td class="col-4 p-0">100.00</td>
                                            <td class="col-4 p-0"><input type="number" id="oneh"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="50">
                                            <td class="col-4 p-0">50.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fiftyp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="20">
                                            <td class="col-4 p-0">20.00</td>
                                            <td class="col-4 p-0"><input type="number" id="twentyp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="10">
                                            <td class="col-4 p-0">10.00</td>
                                            <td class="col-4 p-0"><input type="number" id="tenp"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="5">
                                            <td class="col-4 p-0">5.00</td>
                                            <td class="col-4 p-0"><input type="number" id="fivep"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>
                                        <tr data-denomination="1">
                                            <td class="col-4 p-0">1.00</td>
                                            <td class="col-4 p-0"><input type="number" id="onep"
                                                    class="text-center denomination" style="width: 100%;" value="0">
                                            </td>
                                            <td class="col-4 p-0 amount">0.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="font-weight-bold">PM Total</td>

                                            <td class="total-col-4 p-0 amount font-weight-bold">0.00</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4 p-0">
                                <div class=" border border-dark text-center  " style="height: 289px">

                                </div>
                                <div></div>
                                <table style="width: 100%;" class="reports">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%">PREPARED BY: AM</td>
                                            <td style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">JEANE AGAPITO</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">PREPARED BY: PM</td>
                                            <td style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">JEANE AGAPITO</td>

                                        </tr>
                                        <tr>
                                            <td style="width: 50%">RECEIVED BY: </td>
                                            <td style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right" style="height: 23px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">CHECKED BY: </td>
                                            <td style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right" style="height: 23px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">APPROVED BY: </td>
                                            <td style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right" style="height: 23px;"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div>
                            <table style="width: 100%" class="reports">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th colspan="2" class="text-center">STATEMENT OF BAD ORDER</th>
                                        <th>TOTAL B.O.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MGA GINAWA</td>
                                        <td>FIRST DELIVERY</td>
                                        <td>SECOND DELIVERY</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>AKTUWAL NA ORAS NG PAGBENTA</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>AKTUWAL NA ORAS NG B.O.</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>AKTUWAL NA BILANG NG B.O.</td>
                                        <td id="total_bo_am2"></td>
                                        <td id="total_bo_pm2"></td>
                                        <td id="total_day_bo"></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>



                    </div>

                </div>
                <!-- <div class="row" >
                    <div class="col-4" ></div>
                    <div class="col-4" ></div>
                </div> -->
                <button class="btn btn-success back-button">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
                <button class="btn btn-primary" id="printReport">PRINT</button>

            </div>


        </div>
    </div>
</div>
<script src="js/reports.js"></script>
<?php include ('layouts/footer.php'); ?>