<?php
  $locale = "Home";
  include "core/init.php";
  include "includes/head.php";
  include "includes/navbar.php";
  include "includes/header.php";
  include "includes/slideshow_one.php";
  include "includes/featured_cats.php";
  include "includes/top_deals.php";
  include "includes/top_picks.php";
?>

    <!--
    <div class="container items">
      <div class="row">
        <div class="col-4">
          <a href="#"><img src="src/img/test_sq.png" alt="test"></a>
        </div>
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
          <p class="text-primary m-0 rating" id="rating-main">
            <i class="far fa-star rateStar"></i>
            <i class="far fa-star rateStar"></i>
            <i class="far fa-star rateStar"></i>
            <i class="far fa-star rateStar"></i>
            <i class="far fa-star rateStar"></i>
            (1)
          </p>
        </div>
      </div>
    </div>
    <hr class="after"> -->
    <?php
      /*$command = escapeshellcmd('python test.py');
      $output = shell_exec($command);
      echo $output;*/
      echo "PRODUCTS DUMP";
      $testSql = "SELECT * FROM products";
      $testQuery = $connect->query($testSql);
      while ($test = mysqli_fetch_assoc($testQuery)) {
        $code = $test['id'];
        $name = $test['name'];
        $price = $test['price'];
        $cartArray = array(
          $code=>array(
            'name'=>$name,
            'code'=>$code,
            'price'=>$price,
            'quantity'=>1)
        );
        $eecho = $cartArray[$code];
        echo $eecho['name'];
      }
    ?>
    <?=$_SESSION['cart'][21]['quantity'];?>

    <!--Scripts at end of page to ensure page loads faster -->
<?php
  include "includes/foot.php";
  include "includes/footer.php";
?>