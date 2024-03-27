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

    view(report_date, product_name);
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
            text: formattedDateTime,
          }).appendTo(tableRow);

          let tableData = $("<td>", { class: "text-wrap" });

          $("<button>", {
            class: "btn btn-success mx-1 fa fa-eye ",
            "data-report_date": reports.sales_date_created_at,
            "data-product_name": reports.product_name,
            id: "view",
            html: "",
          }).appendTo(tableData);

          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  $("#printReport").click(function () {
    const printContents = document.getElementById("reportPrint").innerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    window.location.reload();
  });

  function view(report_date, product_name) {
    $.get({
      url: "controllers/reports/reports.php",
      data: {
        getDataReport: "getDataReport",
        report_date: report_date,
        product_name: product_name,
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
          $("#total_plantsa").text(reports.total_plantsa);
          $("#am_amount").text(reports.subTotal);
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

          var bo_remainder_am = bo_am % total_plantsa_am;
          $("#bo_am").text(bo_breakdown_am + " + " + bo_remainder_am);
          $("#total_bo_am").text(bo_am);

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
        });
      },
    });
  }
});
