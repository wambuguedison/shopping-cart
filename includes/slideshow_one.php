<?php
  $testSql = "SELECT * FROM posters WHERE featured = 1";
  $test = $connect->query($testSql);
  $no = 0;
?>
<div class="owl-carousel owl-theme mt-5 posters">
  <?php while($testing = mysqli_fetch_assoc($test)) : ?>
  <div class="item">
    <h6 class="poster_title"><?=$testing['title'];?></h6>
    <img src="<?=$testing['image'];?>" alt="<?=$testing['title']?>" />
  </div>
  <?php endwhile; ?>
  <!-- <div class="item">
    <img src="src/img/test_rect.png" alt="2" />
    <h4>2</h4>
  </div>
  <div class="item">
    <img src="src/img/test_rect.png" alt="3" />
    <h4>3</h4>
  </div>
  <div class="item">
    <img src="src/img/test_rect.png" alt="4" />
    <h4>4</h4>
  </div> -->
</div>

