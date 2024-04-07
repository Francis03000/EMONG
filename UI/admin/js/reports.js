$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => {
    const report_date = $(e.currentTarget).data("report_date");
    const product_name = $(e.currentTarget).data("product_name");
    const am_pm = $(e.currentTarget).data("am_pm");

    view(report_date, product_name, am_pm);
  });

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#productsTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  getAllData1();
  function getAllData1() {
    $.get({
      url: "controllers/products/products.php",
      data: { getData1: "getData1" },
      success: function (data) {
        let newData = JSON.parse(data);
        let sales_contain = $("#sales_contain");
        newData.forEach((product, i) => {
          let product_name = product.product_name;
          let product_price = product.product_price;
          let item_per_plantsa = product.item_per_plantsa;
          let product_id = product.product_id;

          sales_contain.append(
            `<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 product-item" data-id="${product_id}" data-name="${product_name}" data-item_per_plantsa="${item_per_plantsa}" data-price="${product_price}">
              <div class="dash-widget dash-widget5">
                <div class="dash-widget-info text-left d-inline-block">
                  <span>${product_name}</span>
                  <h3>₱${product_price}</h3>
                </div>
                <span class="float-right">
                  <img src="assets/img/dash/regular.jpg" width="90" alt="" class="rounded-circle" />
                </span>
              </div>
            </div>`
          );
        });
      },
    });
  }

  $("body").on("click", ".product-item", function (e) {
    const name = $(e.currentTarget).data("name");
    const price = $(e.currentTarget).data("price");
    const item_per_plantsa = $(e.currentTarget).data("item_per_plantsa");

    selectedProductId = $(e.currentTarget).data("id");
    getReportDetails(selectedProductId);
  });

  function getReportDetails(selectedProductId) {
    $("#sales_contain").hide();
    $("#reportDetails").show();

    $("#reportsTable").empty();
    $.get({
      url: "controllers/reports/reports.php",
      data: { getReport: "getReport", product_id: selectedProductId },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#reportsTable");
        newData.forEach((reports, i) => {
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: reports.product_name,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: reports.sales_total,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: reports.rider_commission,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: reports.owner_commission,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: reports.gas,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: reports.subTotal,
          }).appendTo(tableRow);
          var dateString = reports.sales_date_created_at;
          var date = new Date(dateString);

          date.setDate(date.getDate() - 1);

          var options = {
            year: "numeric",
            month: "long",
            day: "numeric",
          };

          var formattedDate = date.toLocaleDateString("en-US", options);

          var timePart = date.toLocaleTimeString([], {
            hour: "2-digit",
            minute: "2-digit",
            hour12: true,
          });

          // var formattedDateTime = formattedDate + ", " + timePart;
          var formattedDateTime = formattedDate;

          $("<td>", {
            class: "text-wrap",
            text: formattedDateTime + ", " + reports.am_pm,
          }).appendTo(tableRow);

          let tableData = $("<td>", { class: "text-wrap" });

          $("<button>", {
            class: "btn btn-success mx-1 fa fa-eye ",
            "data-report_date": reports.sales_date_created_at,
            "data-product_name": reports.product_name,
            "data-am_pm": reports.am_pm,
            id: "view",
            html: "",
          }).appendTo(tableData);

          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }
  function resetReportData() {
    $("#report_date").text("");
    $("#am_date").text("");
    $("#pm_date").text("");
    $("#product_name").text("");

    $("#am_amount").text("");
    $("#pm_amount").text("");
    $("#total_plantsa").text("");
    $("#total_day_amount").text("");
    $("#total_day_sales").text("₱");
    $("#cash_count").text("₱");
    $("#total_day_bo").text("");

    $("#plantsa_am").text("");
    $("#total_pcs_am").text("");
    $("#bo_am").text("");
    $("#total_bo_am").text("");
    $("#total_bo_am2").text("");
    $("#pcs_am").text("");
    $("#total_pcs_sold_am").text("");
    $("#total_am_value").text("");
    $("#total_am_deduction").text("");
    $("#total_cash_am").text("₱");

    $("#plantsa_pm").text("");
    $("#total_pcs_pm").text("");
    $("#bo_pm").text("");
    $("#total_bo_pm").text("");
    $("#total_bo_pm2").text("");
    $("#pcs_pm").text("");
    $("#total_pcs_sold_pm").text("");
    $("#total_pm_value").text("");
    $("#total_pm_deduction").text("");
    $("#total_cash_pm").text("₱");
  }
  $("#sales_report").hide();
  $("#reportDetails").hide();

  function view(report_date, product_name, am_pm) {
    resetReportData();
    $("#sales_report").show();
    $("#reportDetails").hide();
    var totalPlantsa = 0;
    var totalDayAMount = 0;
    var totalBo = 0;
    $.get({
      url: "controllers/reports/reports.php",
      data: {
        getDataReport: "getDataReport",
        report_date: report_date,
        product_name: product_name,
        am_pm: "AM",
      },
      contentType: "application/json",
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((reports, i) => {
          var dateString = reports.sales_date_created_at;
          var date = new Date(dateString);

          date.setDate(date.getDate() - 1);

          var options = {
            year: "numeric",
            month: "long",
            day: "numeric",
          };

          var formattedDate = date.toLocaleDateString("en-US", options);

          var timePart = date.toLocaleTimeString([], {
            hour: "2-digit",
            minute: "2-digit",
            hour12: true,
          });

          // var formattedDateTime = formattedDate + ", " + timePart;
          var formattedDateTime = formattedDate;
          $("#report_date").text(formattedDateTime);
          totalPlantsa += parseInt(reports.total_plantsa);
          $("#am_amount").text(reports.subTotal);
          totalDayAMount += parseInt(reports.subTotal);
          $("#product_name").text(reports.product_name);
          $("#am_date").text(formattedDate);
          var total_plantsa_am = reports.total_plantsa;
          var item_per_plantsa = reports.item_per_plantsa;

          var total_pcs_am =
            parseInt(total_plantsa_am) * parseInt(item_per_plantsa);

          $("#plantsa_am").text(total_plantsa_am);
          $("#total_pcs_am").text(total_pcs_am);

          var bo_am = reports.bo;
          var bo_breakdown_am = Math.floor(bo_am / item_per_plantsa);

          var bo_remainder_am = bo_am % item_per_plantsa;

          $("#bo_am").text(bo_breakdown_am + " + " + bo_remainder_am);
          $("#total_bo_am").text(bo_am);
          $("#total_bo_am2").text(bo_am);
          totalBo += parseInt(bo_am);

          var total_pcs_sold_am = total_pcs_am - bo_am;
          var plantsa_pcs_breakdown_am = Math.floor(
            total_pcs_sold_am / item_per_plantsa
          );
          var remainder_times_total_pcs_am =
            plantsa_pcs_breakdown_am * item_per_plantsa;
          var plantsa_pcs_remainder_am =
            total_pcs_sold_am - remainder_times_total_pcs_am;

          $("#pcs_am").text(
            plantsa_pcs_breakdown_am + " + " + plantsa_pcs_remainder_am
          );
          $("#total_pcs_sold_am").text(total_pcs_sold_am);

          var total_am_value = reports.subTotal;
          var total_am = reports.sales_total;
          var total_am_deduction =
            parseInt(total_am) - parseInt(total_am_value);

          $("#total_am_value").text(total_am_value);
          $("#total_am_deduction").text(total_am_deduction);

          $("#total_cash_am").text("₱" + total_am_value);

          $.get({
            url: "controllers/reports/reports.php",
            data: {
              getDataDenominationAm: "getDataDenominationAm",
              sales_id: reports.sales_id,
            },
            contentType: "application/json",
            success: function (data) {
              let newData = JSON.parse(data);
              newData.forEach((denominationAm, i) => {
                // $deduction = 1505;
                // $onek = denominationAm.onek;
                // $oneKtotal = $onek * 1000;
                // if($onek){

                // }
                $("#onekAm").val(denominationAm.onek);
                $("#fivehAm").val(denominationAm.fiveh);
                $("#twohAm").val(denominationAm.twoh);
                $("#onehAm").val(denominationAm.oneh);
                $("#fiftypAm").val(denominationAm.fiftyp);
                $("#twentypAm").val(denominationAm.twentyp);
                $("#tenpAm").val(denominationAm.tenp);
                $("#fivepAm").val(denominationAm.fivep);
                $("#onepAm").val(denominationAm.onep);
              });

              updateAmountsAM();
            },
          });

          function updateAmountsAM() {
            var totalAmount = 0;
            $(".denominationAm").each(function () {
              var value = $(this).val().trim();
              if (value === "") {
                value = "0";
              }

              var pcs = parseInt(value);
              pcs = Math.max(0, pcs);
              $(this).val(pcs);

              var denomination = parseInt(
                $(this).closest("tr").data("denomination")
              );
              var amount = pcs * denomination;
              $(this).closest("tr").find(".amount").text(amount.toFixed(2)); // Update amount with 2 decimal places
              totalAmount += amount;
            });
            $("#amTotal").text(totalAmount.toFixed(2)); // Update total amount with 2 decimal places
          }
        });
        $("#total_plantsa").text(totalPlantsa);
        $("#total_day_amount").text(totalDayAMount);
        $("#total_day_sales").text("₱" + totalDayAMount);
        $("#cash_count").text("₱" + totalDayAMount);
        $("#total_day_bo").text(totalBo);
      },
    });

    $.get({
      url: "controllers/reports/reports.php",
      data: {
        getDataReport: "getDataReport",
        report_date: report_date,
        product_name: product_name,
        am_pm: "PM",
      },
      contentType: "application/json",
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((reports, i) => {
          var dateString = reports.sales_date_created_at;
          var date = new Date(dateString);

          date.setDate(date.getDate() - 1);

          var options = {
            year: "numeric",
            month: "long",
            day: "numeric",
          };

          var formattedDate = date.toLocaleDateString("en-US", options);

          var timePart = date.toLocaleTimeString([], {
            hour: "2-digit",
            minute: "2-digit",
            hour12: true,
          });

          // var formattedDateTime = formattedDate + ", " + timePart;
          var formattedDateTime = formattedDate;
          $("#report_date").text(formattedDateTime);
          totalPlantsa += parseInt(reports.total_plantsa);
          $("#pm_amount").text(reports.subTotal);
          totalDayAMount += parseInt(reports.subTotal);
          $("#product_name").text(reports.product_name);
          $("#pm_date").text(formattedDate);
          var total_plantsa_am = reports.total_plantsa;
          var item_per_plantsa = reports.item_per_plantsa;

          var total_pcs_am =
            parseInt(total_plantsa_am) * parseInt(item_per_plantsa);

          $("#plantsa_pm").text(total_plantsa_am);
          $("#total_pcs_pm").text(total_pcs_am);

          var bo_am = reports.bo;
          totalBo += parseInt(bo_am);

          var bo_breakdown_am = Math.floor(bo_am / item_per_plantsa);

          var bo_remainder_am = bo_am % item_per_plantsa;

          $("#bo_pm").text(bo_breakdown_am + " + " + bo_remainder_am);
          $("#total_bo_pm").text(bo_am);
          $("#total_bo_pm2").text(bo_am);

          var total_pcs_sold_am = total_pcs_am - bo_am;
          var plantsa_pcs_breakdown_am = Math.floor(
            total_pcs_sold_am / item_per_plantsa
          );
          var remainder_times_total_pcs_am =
            plantsa_pcs_breakdown_am * item_per_plantsa;
          var plantsa_pcs_remainder_am =
            total_pcs_sold_am - remainder_times_total_pcs_am;

          $("#pcs_pm").text(
            plantsa_pcs_breakdown_am + " + " + plantsa_pcs_remainder_am
          );
          $("#total_pcs_sold_pm").text(total_pcs_sold_am);

          var total_am_value = reports.subTotal;
          var total_am = reports.sales_total;
          var total_am_deduction =
            parseInt(total_am) - parseInt(total_am_value);

          $("#total_pm_value").text(total_am_value);
          $("#total_pm_deduction").text(total_am_deduction);

          $("#total_cash_pm").text("₱" + total_am_value);

          $.get({
            url: "controllers/reports/reports.php",
            data: {
              getDataDenominationPm: "getDataDenominationPm",
              sales_id: reports.sales_id,
            },
            contentType: "application/json",
            success: function (data) {
              let newData = JSON.parse(data);
              newData.forEach((denominationAm, i) => {
                $("#onekPm").val(denominationAm.onek);
                $("#fivehPm").val(denominationAm.fiveh);
                $("#twohPm").val(denominationAm.twoh);
                $("#onehPm").val(denominationAm.oneh);
                $("#fiftypPm").val(denominationAm.fiftyp);
                $("#twentypPm").val(denominationAm.twentyp);
                $("#tenpPm").val(denominationAm.tenp);
                $("#fivepPm").val(denominationAm.fivep);
                $("#onepPm").val(denominationAm.onep);
              });

              updateAmountsPM();
            },
          });

          function updateAmountsPM() {
            var totalAmount = 0;
            $(".denominationPm").each(function () {
              var value = $(this).val().trim();
              if (value === "") {
                value = "0";
              }

              var pcs = parseInt(value);
              pcs = Math.max(0, pcs);
              $(this).val(pcs);

              var denomination = parseInt(
                $(this).closest("tr").data("denomination")
              );
              var amount = pcs * denomination;
              $(this).closest("tr").find(".amount").text(amount.toFixed(2)); // Update amount with 2 decimal places
              totalAmount += amount;
            });
            $("#pmTotal").text(totalAmount.toFixed(2)); // Update total amount with 2 decimal places
          }
        });

        $("#total_plantsa").text(totalPlantsa);
        $("#total_day_amount").text(totalDayAMount);
        $("#total_day_sales").text("₱" + totalDayAMount);
        $("#cash_count").text("₱" + totalDayAMount);
        $("#total_day_bo").text(totalBo);
      },
    });
  }
  $(".back-button1").click(function () {
    backToMenu1();
  });

  function backToMenu1() {
    $("#sales_contain").show();
    $("#reportDetails").hide();
  }
  $(".back-button").click(function () {
    backToMenu();
  });

  function backToMenu() {
    resetReportData();
    $("#sales_report").hide();
    $("#reportDetails").show();
  }
  $("#printReport").click(function () {
    $("#footer_btn").hide();
    const printContents = document.getElementById("reportPrint").innerHTML;

    const styledPrintContents =
      "<style>@media print { " +
      "table.reports { border-collapse: collapse; width: 100%; } " +
      "table.reports th, table.reports td { border: 1px solid black; padding: 2px;  font-size: 23px;} " +
      "table.reports th { background-color: #f2f2f2; } " +
      "div.border table { border: 1px solid black; } " +
      "#emong_box { height: 500px !important;} " +
      "#blank_person {height: 40px !important;}" +
      "}</style>" +
      printContents;

    document.body.innerHTML = styledPrintContents;

    window.print();

    document.body.innerHTML = printContents;
    resetReportData();
    window.location.reload();
  });
});
