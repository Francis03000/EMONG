$(document).ready(function () {
  let sampleArray = [];
  getAllData();

  function getAllData() {
    sampleArray = [];
    $.get({
      url: "controllers/products/products.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let sales_contain = $("#sales_contain");
        newData.forEach((product, i) => {
          sampleArray.push(product);

          let product_name = product.product_name;
          let product_price = product.product_price;
          let item_per_plantsa = product.item_per_plantsa;

          sales_contain.append(
            `<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 product-item" data-name="${product_name}" data-item_per_plantsa="${item_per_plantsa}" data-price="${product_price}">
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
  $("#sales_info").hide();

  $(".back-button").click(function () {
    $("#mainForm").trigger("reset");
    $("#sales_info").hide();
    $("#sales_contain").show();
  });

  $("body").on("click", ".product-item", function (e) {
    const name = $(e.currentTarget).data("name");
    const price = $(e.currentTarget).data("price");
    const item_per_plantsa = $(e.currentTarget).data("item_per_plantsa");

    update(name, price, item_per_plantsa);
  });

  function update(name, price, item_per_plantsa) {
    $("#sales_contain").hide();
    $("#sales_info").show();

    function updateTotalAmount() {
      var totalPlancha = parseFloat($("#product_name").val()) || 0;
      var bo = parseFloat($("#item_per_plantsa").val()) || 0;
      var gas = parseFloat($("#product_price").val()) || 0;

      $("#totalAmount").text(total);
    }

    $("#product_name, #item_per_plantsa, #product_price").on(
      "input",
      updateTotalAmount
    );
  }

  $(".denomination").on("input", function () {
    updateAmounts();
  });

  function updateAmounts() {
    var totalAmount = 0;
    $(".denomination").each(function () {
      var value = $(this).val().trim();
      if (value.startsWith("0") && value.length > 1) {
        value = value.replace(/^0+/, "");
      }
      if (value === "") {
        value = "0";
      }
      $(this).val(value);

      var pcs = parseInt(value);
      var denomination = parseFloat($(this).closest("tr").data("denomination"));
      var amount = pcs * denomination;
      $(this).closest("tr").find(".amount").text(amount.toFixed(2));
      totalAmount += amount;
    });
    $(".total-amount").text(totalAmount.toFixed(2));
  }
});
