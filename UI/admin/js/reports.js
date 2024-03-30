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

  let sampleArray = [];
  getAllData();
  function getAllData() {
    sampleArray = [];
    $.get({
      url: "controllers/reports/reports.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#reportsTable");
        newData.forEach((reports, i) => {
          sampleArray.push(reports);
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
        });

        $("#total_plantsa").text(totalPlantsa);
        $("#total_day_amount").text(totalDayAMount);
        $("#total_day_sales").text("₱" + totalDayAMount);
        $("#cash_count").text("₱" + totalDayAMount);
        $("#total_day_bo").text(totalBo);
      },
    });
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
      "table.reports th, table.reports td { border: 1px solid black; padding: 15px;  font-size: 15px;} " +
      "table.reports th { background-color: #f2f2f2; } " +
      "div.border table { border: 1px solid black; } " +
      "}</style>" +
      printContents;

    document.body.innerHTML = styledPrintContents;

    window.print();

    document.body.innerHTML = printContents;
    resetReportData();
    window.location.reload();
  });
});
