<?php
  $topSql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
  $topQuery = $connect->query($topSql);
?>

<div class="container-fluid top-deals-title">
  <nav aria-label="breadcrumb" class="text-light">
    <ol class="breadcrumb pt-2 pb-2 bg-primary">
      <li class="breadcrumb-item col-8 p-0">Top Deals</li>
      <a href="#" class="col-4 p-0 text-right text-light">SEE ALL</a>
    </ol>
  </nav>
</div>
<div class="container-fluid top-deals">
  <div class="row">
  <?php while($topDeals = mysqli_fetch_assoc($topQuery)) :?>
    <div class="col-6">
      <p class="discount">-30%</p>
      <img
        src="<?=$topDeals['image']?>"
        width=""
        alt="test top deal"
        onclick="details(<?=$topDeals['id'];?>)"
      >
      <p
        class="m-0 text-primary"
        onclick="details(<?=$topDeals['id'];?>)"
      >
        <?=$topDeals['name'];?>
      </p>
      <h6 class="m-0">Ksh. <?=$topDeals['price'];?></h6>
    </div>
  <?php endwhile; ?>
  </div><!-- row -->
</div><!-- Top Deals -->
<br>