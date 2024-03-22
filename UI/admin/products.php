<?php include('layouts/head.php'); ?>

<div class="main-wrapper">
    <?php include('layouts/header.php'); ?>
    <?php include('layouts/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content container-fluid" id="container_color">
           
            <div class="card" style="margin-top:2%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="table-header-color page-title mb-0">Roles List</h5>
                        </div>
                        <div class="col">
                            <button style="float:right;" type="button" class="btn btn-primary" id="add-new"> <i
                                    class="fas fa-plus"></i> Add </button>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col" >
                             <form id="modalMainForm">
                                <input type="hidden" id="method" name="update">
                                <input type="hidden" name="id" id="id">
                                <h2>Add Product</h2>
                                <div class="form-group">
                                    <label class="col-form-label">Product Name</label>
                                    <input type="text" class="form-control" id="display_name" name="display_name"
                                        placeholder="Add Role" style="border-color: #404040">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Product Price</label>
                                    <input type="number" class="form-control" id="display_name" name="display_name"
                                        placeholder="Add Role" style="border-color: #404040">
                                </div>

                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                                    <button type="button" id="btn-mul" name="addNew" class="btn btn-primary">Add</button>
                                </form> 
                        </div> 
                         <div class="col" >
                         <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-success " id="data_table">
                            <thead class=" bg-green">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Roles</th>

                                    <th scope="col" colspan="3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="bamsmsTable"></tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="js/roles.js"></script> -->
<?php include('layouts/footer.php'); ?>