<?php
  $sql = "SELECT * FROM categoriesRevamp";
  $cats = $connect->query($sql);
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
  <a class="navbar-brand mr-auto mr-lg-0" href="http://localhost/projects/shop/index.php">OUR SHOP</a>
  <span class="user">
    <button
      type="button"
      class="navbar-toggler border-0 pt-3 pr-3 text-light"
      tabindex="0"
      data-toggle="popover"
      data-placement="bottom"
      data-content="<?=(!isset($_SESSION['username'])) ? login() : loggedIn();?>"
    >
     <i class="fas fa-user"></i>
    </button>
  </span>
  <button class="navbar-toggler" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse bg-primary" id="navbarsExampleDefault">
    <p class="navbar-text mb-0 ml-5 text-light">Categories</p>
    <ul class="navbar-nav mr-auto">
      <hr class="m-0 bg-light" />
      <?php while($category = mysqli_fetch_assoc($cats)) : ?>
        <li class="nav-item dropdown p-0">
          <p
            class="text-light p-1 m-0"
            onclick=category(<?=$category['id'];?>)
          >
            <?=$category['category'];?>
          </p>
          <hr class="mt-1 mb-0 bg-light"/>
          <?php endwhile; ?>
        </li>
    </ul>
    <p class="navbar-text text-primary">&copy;</p>
  </div>
</nav>