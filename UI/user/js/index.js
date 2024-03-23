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

          sales_contain.append(
            `<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 product-item" data-name="${product_name}">
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

  $("body").on("click", ".product-item", function () {
    update($(this).data("name"));
  });

  function update(name) {
    alert(name);
  }

  $(".denomination").on("input", function () {
    updateAmounts();
  });

  function updateAmounts() {
    var totalAmount = 0;
    $(".denomination").each(function () {
      var pcs = parseInt($(this).val());
      var denomination = parseFloat($(this).closest("tr").data("denomination"));
      var amount = pcs * denomination;
      $(this).closest("tr").find(".amount").text(amount.toFixed(2));
      totalAmount += amount;
    });
    $(".total-amount").text(totalAmount.toFixed(2));
  }
});
