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
  $("#sales_info").hide();

  $(".back-button").click(function () {
    backToMenu();
  });

  function backToMenu() {
    $("#mainForm").trigger("reset");
    $("#sales_info").hide();
    $("#sales_contain").show();
  }
  let selectedProductId;
  $("body").on("click", ".product-item", function (e) {
    const name = $(e.currentTarget).data("name");
    const price = $(e.currentTarget).data("price");
    const item_per_plantsa = $(e.currentTarget).data("item_per_plantsa");

    selectedProductId = $(e.currentTarget).data("id");
    sales_details(selectedProductId, name, price, item_per_plantsa);
  });

  function sales_details(selectedProductId, name, price, item_per_plantsa) {
    $("#sales_contain").hide();
    $("#sales_info").show();

    total = 0;

    function updateTotalAmount() {
      var totalPlancha = parseFloat($("#total_plancha").val()) || 0;
      total_pcs = totalPlancha * item_per_plantsa;
      total_pcs * price;
      var bo = parseFloat($("#bo").val()) || 0;
      var gas = parseFloat($("#gas").val()) || 0;

      total = total_pcs * price;
      $("#totalAmount").text(total.toFixed(2));
      checkTotalMatch();
    }
    $("#total_plancha, #bo, #gas").on("input", updateTotalAmount);
    updateTotalAmount();
  }

  $(".denomination").on("input", function () {
    updateAmounts();
  });

  function updateAmounts() {
    var totalAmount = 0;
    $(".denomination").each(function () {
      var value = $(this).val().trim();
      if (value === "") {
        value = "0";
      }

      var pcs = parseInt(value);
      pcs = Math.max(0, pcs);
      $(this).val(pcs);

      var denomination = parseFloat($(this).closest("tr").data("denomination"));
      var amount = pcs * denomination;
      $(this).closest("tr").find(".amount").text(amount.toFixed(2));
      totalAmount += amount;
    });
    $(".total-amount").text(totalAmount.toFixed(2));

    checkTotalMatch();
  }

  function submitForm() {
    var totalAmount = parseFloat($("#totalAmount").text());
    var denomination_total = parseFloat($(".total-amount").text());
    if (total === totalAmount) {
      var totalAmount = parseFloat($("#totalAmount").text()) || 0;
      rider_commission = totalAmount * 0.08;
      owner_commission = totalAmount * 0.07;
      subTotal = rider_commission + owner_commission;

      let mainForm = {
        product_id: selectedProductId,
        total_plantsa: $("#total_plancha").val(),
        bo: $("#bo").val(),
        gas: $("#gas").val(),
        sales_total: totalAmount,
        rider_commission: rider_commission.toFixed(2),
        owner_commission: owner_commission.toFixed(2),
        subTotal: subTotal,
        onek: $("#onek").val(),
        fiveh: $("#fiveh").val(),
        twoh: $("#twoh").val(),
        oneh: $("#oneh").val(),
        fiftyp: $("#fiftyp").val(),
        twentyp: $("#twentyp").val(),
        tenp: $("#tenp").val(),
        fivep: $("#fivep").val(),
        onep: $("#onep").val(),
        denomination_total: denomination_total,
        addNew: "addNew",
      };
      $.post({
        url: "controllers/products/products.php",
        data: mainForm,
        success: function (data) {
          if (data) {
            $("#mainForm").trigger("reset");
            alert("successful");
            backToMenu();
          }
        },
      });
    } else if (totalAmount > total) {
      alert("Total exceeds the total amount!");
    } else if (totalAmount < total) {
      alert("Total does not meet the total amountx!");
    }
  }

  $("#submit-btn").attr("disabled", "disabled");

  function checkTotalMatch() {
    var total = parseFloat($("#totalAmount").text()) || 0;
    var totalAmount = parseFloat($(".total-amount").text()) || 0;

    if (total === totalAmount && total !== 0) {
      $("#submit-btn").prop("disabled", false);
    } else {
      $("#submit-btn").prop("disabled", true);
    }
  }
  checkTotalMatch();
  $("#submit-btn").click(function () {
    submitForm();
  });
});
