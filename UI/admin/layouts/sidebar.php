<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <div class="header-left">
        <a href="index.php" class="logo">
          <img src="assets/img/dash/emonglogo.jpg" width="50" height="50" alt="" class="rounded-circle" />
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