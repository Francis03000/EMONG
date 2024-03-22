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
      url: "controllers/products/products.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let table = $("#productsTable");
        newData.forEach((products, i) => {
          sampleArray.push(products);
          let tableRow = $("<tr>", { id: newData.id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: products.product_name,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: products.item_per_plantsa,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: products.product_price,
          }).appendTo(tableRow);

          let tableData = $("<td>", { class: "text-wrap" });

          $("<button>", {
            class: "btn btn-warning mx-1 far fa-edit ",
            "data-id": i,
            id: "edit",
            html: "",
          }).appendTo(tableData);

          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  $("#clr-btn").click(function () {
    $("#mainForm").trigger("reset");
    $("#btn-mul").show();
    $("#product_id").val("");
    $("#update-btn").hide();
    $("#method").attr("name", "addNew");
  });

  $("#btn-mul").click(function () {
    let mainForm = $("#mainForm").serializeArray();
    $.post({
      url: "controllers/products/products.php",
      data: mainForm,
      success: function (data) {
        if (data) {
          $("#mainForm").trigger("reset");
          $("#productsTable").empty();
          // sampleArray.empty();
          getAllData();
        }
      },
    });
  });

  $("#update-btn").hide();

  function update(index) {
    $("#method").attr("name", "update");
    let models = sampleArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });
    $("#update-btn").show();
    $("#btn-mul").hide();
  }

  $("#update-btn").click(function () {
    var product_id = $("#product_id").val();
    if (product_id == "") {
      return;
    }

    let mainForm = $("#mainForm").serializeArray();
    $.post({
      url: "controllers/products/products.php",
      data: mainForm,
      success: function (data) {
        if (data) {
          $("#method").attr("name", "addNew");

          $("#mainForm")[0].reset();
          $("#btn-mul").show();
          $("#product_id").val("");
          $("#update-btn").hide();
          $("#productsTable").empty();
          getAllData();
        }
      },
    });
  });
});
