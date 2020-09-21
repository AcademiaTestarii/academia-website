<!-- Sectiune: Cursuri -->
    <section id="blog" class="bg-silver-light">
      <div class="container">
        <div class="section-title text-center titlu">
          <div class="row">
            <div class="col-md-12">
              <h2 class="line-bottom-double-line-centered mt-0">Programă  <span class="text-theme-colored2">cursuri</span></h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-3col owl-nav-top" data-nav="true">

<?php 	
// nu e final 
$sql_cursuri="
SELECT `selectie`.* FROM 
(
SELECT * FROM `classes` 
LEFT JOIN `main_classes` 
ON `classes`.`main_class_id`=`main_classes`.`id` 
ORDER BY `classes`.`registration_start_date` ASC
LIMIT 18446744073709551615
)
AS `selectie` 
WHERE `selectie`.`registration_start_date`>NOW()
AND `selectie`.`is_active`=1
GROUP BY `main_class_id`
ORDER BY `selectie`.`registration_start_date` ASC
";
$query_cursuri=mysqli_query($link,$sql_cursuri);
while ($row_cursuri=mysqli_fetch_assoc($query_cursuri)) {
?>
                <div class="item">
                  <article class="post clearfix mb-30">
                    <div class="entry-header">
                      <div class="post-thumb thumb"> 
                        <img src="images/cursuri/<?php echo $row_cursuri['image'];?>" alt="" class="img-responsive img-fullwidth">
                      </div>                    
                      <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
					<?php if ($row_cursuri['is_planned']==1) { ?>
                        <ul>
							<li class="font-16 text-white font-weight-600">în</li>
							<li class="font-12 text-white text-uppercase">curând</li>
                        </ul>
					<?php } else { ?>
						<ul>
							<li class="font-16 text-white font-weight-600"><?php echo strftime("%e", strtotime($row_cursuri['registration_start_date']));?></li>
							<li class="font-12 text-white text-uppercase"><?php echo strftime("%B", strtotime($row_cursuri['registration_start_date']));?></li>
                        </ul>
					<?php } ?>
                      </div>
                    </div>
                    <div class="entry-content p-20 bg-white">
                      <div class="entry-meta media mt-0 mb-10">
                        <div class="media-body pl-0">
                          <div class="event-content pull-left flip">
                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="curs.php?id=<?php echo $row_cursuri['main_classes.id'];?>"><?php echo $row_cursuri['main_classes.title'];?></a></h4>
							<?php if (strlen($row_cursuri['classes.title'])<32) {echo "<br />";} ?>
							<p><?php echo $row_cursuri['short_description'];?></p>
							
							<? if ($row_cursuri['discount_price']!="" && $row_cursuri['discount_price']!=0) { ?>
							<div class="price">Taxa de înscriere: <del><span class="amount"><?php echo $row_cursuri['price'];?> Lei</span></del> <strong><span class="amount"><?php echo $row_cursuri['discount_price'];?> Lei</span></strong> </div>
							<?php } else { ?>
							<div class="price">Taxa de înscriere: <strong><span class="amount"><?php echo $row_cursuri['price'];?> Lei</span></strong> </div>
							<?php } ?>
							
							<?php if ($row_cursuri['is_planned']==1) { ?>
							<span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-calendar mr-5 text-theme-colored"></i>Data va fi anunţata ulterior</span>
							<?php } else { ?>
							
                            <span class="mb-0 text-gray-darkgray mr-10 font-13">Următorul curs: <br /><i class="fa fa-calendar mr-5 text-theme-colored"></i><?php if ($row_cursuri['registration_start_date']!="0000-00-00") { echo strftime("%e %B", strtotime($row_cursuri['registration_start_date']))." - ".strftime("%e %B %Y", strtotime($row_cursuri['registration_end_date']));} else {echo "Data va fi anunţata ulterior";}?></span>
							<?php } ?><br />
							<?php 	$sqlInscrisi=mysqli_query($link,"SELECT * FROM `class_students` WHERE `class_id`=".$row_cursuri['id']);
									$cati=mysqli_num_rows($sqlInscrisi);
							?>
							<span class="mb-10 text-gray-darkgray mr-10 font-13">Locuri disponibile: <?php echo $row_cursuri['students']-$cati;?></span>
							
							<?php
							$datesSql2=mysqli_query($link,"SELECT `id` AS `urmatorul`,`weekend` FROM `classes` WHERE `main_class_id`=".$row_cursuri['main_classes.id']." AND  `registration_start_date` > NOW() AND `id` != ".$row_cursuri['id']." ORDER BY `registration_start_date` ASC LIMIT 1");
							if (mysqli_num_rows($datesSql2)>0) {
							$datesRow2=mysqli_fetch_assoc($datesSql2);
							$datesSql3=mysqli_query($link,"SELECT MIN(`date`) AS `start`, MAX(`date`) AS `end` FROM `class_dates` WHERE `class_id`=".$datesRow2['urmatorul']);
							$datesRow3=mysqli_fetch_assoc($datesSql3);
							?> 
							<hr class="mb-0" />
							<span class="mb-10 text-gray-darkgray mr-10 font-13">Cursuri viitoare: <br /><i class="fa fa-calendar mr-5 text-theme-colored"></i> <?php if ($datesRow3['start']!="0000-00-00") { echo strftime("%e %B", strtotime($datesRow3['start']))." - ".strftime("%e %B %Y", strtotime($datesRow3['end'])); echo ($datesRow2['weekend']==1) ? " (in weekend)":"";} else {echo "Data va fi anunţată ulterior";}?></span>
							<?php } else { ?>
							<hr class="mb-0" />
							<span class="mb-10 text-gray-darkgray mr-10 font-13">Cursuri viitoare: <br /><i class="fa fa-calendar mr-5 text-theme-colored"></i> Data va fi anunţată ulterior</span>
							<?php } ?>
							
                          </div>
                        </div>
                      </div>
                      <!--p class="mt-5"><?php if ($row_cursuri['weekend']==0) {echo "In timpul saptamanii";} else {echo "In weekend";}?></p-->
                      <a class="btn btn-dark btn-theme-colored2" href="curs.php?id=<?php echo $row_cursuri['id_curs_main'];?>"> Detalii curs</a>
					  <a href="inscriere-curs.php?curs=<?php echo $row_cursuri['id'];?>" class="btn btn-dark btn-theme-colored pull-right">Înscrie-te</a>
                    </div>
                  </article>
                </div>

				<?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- Sectiune: Cursuri -->