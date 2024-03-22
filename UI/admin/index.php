<?php include('layouts/head.php') ?>
<div class="main-wrapper">

    <?php include('layouts/header.php') ?>
    <?php include('layouts/sidebar.php') ?>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="page-title mb-0">Dashboard</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb mb-0 p-0 float-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
              <div class="dash-widget dash-widget5">
                <span class="float-left"
                  ><img src="assets/img/dash/dash-1.png" alt="" width="80"
                /></span>
                <div class="dash-widget-info text-right">
                  <span>Students</span>
                  <h3>60,000</h3>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
              <div class="dash-widget dash-widget5">
                <div class="dash-widget-info text-left d-inline-block">
                  <span>Teachers</span>
                  <h3>12,000</h3>
                </div>
                <span class="float-right"
                  ><img src="assets/img/dash/dash-2.png" width="80" alt=""
                /></span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
              <div class="dash-widget dash-widget5">
                <span class="float-left"
                  ><img src="assets/img/dash/dash-3.png" alt="" width="80"
                /></span>
                <div class="dash-widget-info text-right">
                  <span>Parents</span>
                  <h3>20,000</h3>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
              <div class="dash-widget dash-widget5">
                <div class="dash-widget-info d-inline-block text-left">
                  <span>Total Earnings</span>
                  <h3>$20,000</h3>
                </div>
                <span class="float-right"
                  ><img src="assets/img/dash/dash-4.png" alt="" width="80"
                /></span>
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-lg-6 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="page-title">Students Survay</div>
                    </div>
                    <div class="col text-right">
                      <div class="mt-sm-0 mt-2">
                        <button
                          class="btn btn-light"
                          type="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Action</a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"
                            >Something else here</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="chart1"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="page-title">Student Performance</div>
                    </div>
                    <div class="col text-right">
                      <div class="mt-sm-0 mt-2">
                        <button
                          class="btn btn-light"
                          type="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Action</a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"
                            >Something else here</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="chart2"></div>
                </div>
              </div>
            </div>
          </div> -->

            <!-- <div class="row">

                <div class="col-lg-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="page-title">
                                        Employee Attendance Chart
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="page-title">
                                        Employee Attendance Chart
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>






            </div> -->





        </div>

    </div>

    <?php include('layouts/footer.php') ?>
    <script src="js/attendance.js"></script>

    <script>
        $(document).ready(function () {
            $.get({
                url: "../controllers/user/userCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_user = user.total_users
                        $("#person_label").append(total_user - 1)



                    });
                },
            });
            $.get({
                url: "../controllers/yearlevels/yearlevelsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_g_s = user.total_g_s
                        $("#g_s_label").append(total_g_s)



                    });
                },
            });

            $.get({
                url: "../controllers/subjects/subjectsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_sub = user.total_sub
                        $("#sub_label").append(total_sub)



                    });
                },
            });

            $.get({
                url: "../controllers/rooms/roomsCrud.php",
                data: { getData2: "getData2" },
                success: function (data) {
                    let newData = JSON.parse(data);
                    newData.forEach((user, i) => {
                        var total_room = user.total_room
                        $("#room_label").append(total_room)



                    });
                },
            });
        });

    </script>