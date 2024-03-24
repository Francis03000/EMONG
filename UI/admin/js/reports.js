$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

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
            html: reports.subTotal,
          }).appendTo(tableRow);

          var dateString = reports.sales_date_created_at;
          var date = new Date(dateString);

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

          var formattedDateTime = formattedDate + ", " + timePart;

          $("<td>", {
            class: "text-wrap",
            text: formattedDateTime,
          }).appendTo(tableRow);

          let tableData = $("<td>", { class: "text-wrap" });

          $("<button>", {
            class: "btn btn-success mx-1 fa fa-eye ",
            "data-id": i,
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
});
