<?php
  $topSql = "SELECT * FROM categories WHERE parent != 0";
  $top = $connect->query($topSql);
  $test = 0;
?>
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-primary text-light pt-0 pb-0 mb-1">
      <li class="breadcrumb-item p-0 mt-2 mb-2">Top Picks For You</li>
    </ol>
  </nav>
</div>

<!--Tryna pass data to python-->
<!-- This be a mile STONE -->
<div>
<?php
  #$foods = array("pizza", "french-fries");
  #$command = escapeshellcmd('python includes/testing.py ' . $foods[0] .' '.$foods[1]);
  #$result = shell_exec($command);
  #echo $result;
?>
</div>
<?php
  /*while ($a = mysqli_fetch_assoc($top)) {
    $testA = "try me";
    $command = escapeshellcmd('python includes/test.py $testA');
    $result = shell_exec($command);
    echo $result;
  } */
?>
<div class="container-fluid">
  <div class="owl-carousel owl-theme top-picks">
    <?php while($topPicks = mysqli_fetch_assoc($top)) : ?>
      <?php
        $title = $topPicks['category'];
        $title = substr($title, 0, 13)."...";
      ?>
      <div class="item">
        <img src="/projects/shop/src/img/test_sq.png" alt="">
        <p class="m-0 text-muted topPicksBrand">Test Brand</p>
        <h6 class="m-0 topPicksName"><?=$title;?></h6>
        <p class="m-0 text-center topPicksPrice">Ksh. 100</p>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<div>
<!-- We will Re-visit this-->
</div>