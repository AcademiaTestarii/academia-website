<!-- Divider: Testimoniale -->
    <section class="divider layer-overlay overlay-theme-colored-5" data-background-ratio="0.5" data-bg-img="images/testimoniale.jpg">
      <div class="container pb-50">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="line-bottom-double-line-centered text-white mt-0">Ce spun <span class="text-theme-colored2">absolvenții</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-10">
            <div class="owl-carousel-2col" data-dots="true">
			
			<?php 	$sql_absolventi="SELECT * FROM `testimonials` where deleted_at is null AND is_active=1 ORDER BY rand()";
					$query_absolventi=mysqli_query($link,$sql_absolventi);
					while ($row_absolventi=mysqli_fetch_assoc($query_absolventi)) {
			?>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="text-white">
                    <?php echo $row_absolventi['testimonial'];?>
                    <p class="author mt-10">- <span class="text-theme-colored2"><?php echo $row_absolventi['name'];?></span> <em class="text-gray-lightgray"><?php echo $row_absolventi['position'];?></em></p>
                  </div>
                </div>
              </div>
			  
			<?php } ?>  

            </div> 
          </div>
        </div>
      </div>
    </section>
<!-- END Divider: Testimoniale -->