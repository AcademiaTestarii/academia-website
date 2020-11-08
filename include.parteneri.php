<!-- Sectiune Parteneri -->
    <section class="bg-silver-light">
      <div class="container pt-10 pb-0">
        <div class="section-title text-center titlu">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="line-bottom-double-line-centered mt-10">Partenerii  <span class="text-theme-colored2">noştri</span></h2>
            </div>
          </div>
        </div>	  
        <div class="row mb-40">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-3col text-center">
<?php
$sql_parteneri="SELECT * FROM `partners` ORDER BY `name`";
$query_parteneri=mysqli_query($link,$sql_parteneri);
while ($row_parteneri=mysqli_fetch_array($query_parteneri)) {
?>			
              <div class="item"> <a href="<?php echo $row_parteneri['url'];?>" target="_blank"><img src="<?php echo $crmHost;?>/partners/<?php echo $row_parteneri['logo'];?>" alt="<?php echo $row_parteneri['name'];?>"></a></div>
<?php } ?>
            </div>
          </div>
        </div>
      </div>
</section> 