<div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
              <a href="index.html" class="logo">
                <img src="assets/img/logo1.png" width="40" height="40" alt="" />
                <span class="text-uppercase">EMONG</span>
              </a>
            </div>
            <ul class="sidebar-ul">
              <li class="menu-title">Menu</li>
              <li class="active">
                <a href="index.php">
                    <img src="assets/img/sidebar/icon-1.png" alt="icon" />
                    <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a href="products.php">
                    <img src="assets/img/sidebar/icon-14.png" alt="icon" />
                    <span>Products</span>
                </a>
              </li>
              <li>
                <a href="products.php">
                    <img src="assets/img/sidebar/icon-14.png" alt="icon" />
                    <span>Reports</span>
                </a>
              </li>
              <!-- <li class="submenu">
                <a href="#"
                  ><img src="assets/img/sidebar/icon-2.png" alt="icon" />
                  <span>PRODUCTS</span> <span class="menu-arrow"></span
                ></a>
                <ul class="list-unstyled" style="display: none">
                  <li>
                    <a href="all-teachers.html"><span>Regular</span></a>
                  </li>
                  <li>
                    <a href="add-teacher.html"><span>JUMBO</span></a>
                  </li>
                  <li>
                    <a href="edit-teacher.html"><span>Edit Teacher</span></a>
                  </li>
                  <li>
                    <a href="about-teacher.html"><span>About Teacher</span></a>
                  </li>
                </ul>
              </li> -->
              
            </ul>
          </div>
        </div>
      </div>

<script>
    const sidebarUl = document.querySelector('.sidebar-ul');
    const sidebarLinks = sidebarUl.querySelectorAll('a');

    sidebarLinks.forEach(link => {
        if (window.location.href.includes(link.href)) {
            link.parentElement.classList.add('active');
        }

        link.addEventListener('click', () => {
            sidebarLinks.forEach(link => link.parentElement.classList.remove('active'));
            link.parentElement.classList.add('active');
        });
    });
</script>