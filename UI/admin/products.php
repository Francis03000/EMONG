<?php include ('layouts/head.php'); ?>

<div class="main-wrapper">
    <?php include ('layouts/header.php'); ?>
    <?php include ('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid" id="container_color">

            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Roles List</h5>
                        </div>


                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <form id="mainForm">
                                <input type="hidden" id="method" name="addNew">
                                <input type="hidden" name="product_id" id="product_id">
                                <h2>Add Product</h2>
                                <div class="form-group">
                                    <label class="col-form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Product Name" style="border-color: #404040">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Item Per Plantsa</label>
                                    <input type="number" class="form-control" id="item_per_plantsa"
                                        name="item_per_plantsa" placeholder="Product Price"
                                        style="border-color: #404040">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Product Price</label>
                                    <input type="number" class="form-control" id="product_price" name="product_price"
                                        placeholder="Product Price" style="border-color: #404040">
                                </div>




                                <button type="button" class="btn btn-secondary" id="clr-btn"
                                    name="clrButton">Clear</button>
                                <button type="button" id="btn-mul" name="addNew" class="btn btn-primary">Add</button>
                                <button type="button" id="update-btn" name="update"
                                    class="btn btn-primary">Update</button>

                            </form>
                        </div>
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped table-success " id="data_table">
                                    <thead class=" bg-green">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Item Per Plantsa</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productsTable"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/products.js"></script>
<?php include ('layouts/footer.php'); ?>