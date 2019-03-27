<?php
  $id = $_POST['categoryId'];
  $id = (int)$id;
  include "../core/init.php";
?>
<?php
  $productsSql = "SELECT * FROM products WHERE category = {$id}";
  $productsQuery = $connect->query($productsSql);
?>
<?php ob_start(); ?>
<div class="category mb-5">
  <?php
    $results = 0;
    $br = '';
    if(mysqli_num_rows($productsQuery) === 0) {
      $results = 0;
      $br = "margin-bottom: 438px;";
    } else {
      $results = mysqli_num_rows($productsQuery);
    }
  ?>
  <a href="index.php<?='';?>" class="go-back"><i class="fas fa-angle-double-left"></i> Go Back To <?='';?></a>
  <p class="float-right"></p>
  <hr class="m-1" />
  <div class="container-fluid">
    <div class="d-flex flex-row justify-content-around">
      <div class="bd-highlight" id="options">
        <p class="btn btn-link border-0 p-0 m-0" onclick="stack_list()"> <i class="fas fa-grip-vertical" id="stack_list"></i> </p>
      </div>
      <div class="bd-highlight">
        <div class="dropdown">
          <a
          href="#"
          class="dropdown-toggle"
          role="button"
          id="filter"
          data-toggle="dropdown"
          >
            Filter <i class="fas fa-filter"></i>
          </a>
          <div class="dropdown-menu">
            <a href="#" class="dropdown-item">Price</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="m-1" />
  <div class="products">
    <p class="text-center" style="<?=$br;?>"><?=$results." results found.";?></p>
    <!-- cubes style -->
    <div class="row text-center">
    <?php while($products = mysqli_fetch_assoc($productsQuery)) :?>
      <div class="col-6">
        <!-- <p class="discount">-30%</p> -->
        <img
          src="<?=$products['image']?>"
          width="100px"
          alt="<?=$products['name'];?>"
          onclick="details(<?=$products['id'];?>)"
        >
        <p
          class="m-0 text-primary"
          onclick="details(<?=$products['id'];?>)"
        >
          <?=$products['name'];?>
        </p>
        <h6 class="m-0">Ksh. <?=$products['price'];?></h6>
      </div>
    <?php endwhile; ?>
    </div><!-- row -->
    <!--list style -->
    <!--remember to edit those links to normal p's -->
    <div class="container items d-none">
      <div class="row">
        <div class="col-4">
          <a href="#"><img src="src/img/test_sq.png" alt="test"></a>
        </div><!--col-->
        <div class="col-8">
          <a href="#" onclick="details(1)">
            <h6 class="felx-column-1 mb-0">Test Brand</h6>
          </a>
          <a href="#">
            <h5 class="flex-column-2 mb-0">Test Item</h5>
          </a>
          <p class="d-inline-flex">Kshs 100</p>
          <p id="old" class="d-inline-flex">Ksh 150</p>
          <p id="p" class="d-inline-flex">-30%</p>
        </div><!--col -->
      </div><!--row-->
      <hr class="m-1">
    </div><!--container-->
  </div>
</div>