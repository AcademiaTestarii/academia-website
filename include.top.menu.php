    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="container">
          <nav id="menuzord-right" class="menuzord yellow ">
            <a class="menuzord-brand pull-left flip" href="index.php"><img src="images/logo-academia-testarii.png" alt=""></a>
            <ul class="menuzord-menu">
			
              <li <?php if($page=="home") {echo'class="home active"> <a href="#up">';} else {echo'class="home"><a href="index.php">';}?><i class="fa fa-home"></i></a></li>
			  
              <li <?php if($page=="despre") {echo'class="active"';}?>><a href="despre-noi.php">Despre noi</a></li>
			  
              <li <?php if($page=="cursuri") {echo'class="active"';}?>><a href="cursuri.php">Cursuri pentru tine </a>
                <ul class="dropdown">
<?php	
$sql_cursuri="SELECT * FROM `classes` 
LEFT JOIN `main_classes` 
ON `classes`.`main_class_id`=`main_classes`.`main_classes` 
WHERE `registration_start_date`>NOW() AND `is_active`=1
GROUP BY `main_class_id`
ORDER BY `main_classes`.`order` ASC";
$query_cursuri=mysqli_query($link,$sql_cursuri);
while ($row_cursuri=mysqli_fetch_assoc($query_cursuri)) { 
?>
                  <li><a href="curs.php?id=<?php echo $row_cursuri['main_class_id'];?>"><?php echo $row_cursuri['is_new']==0 ? str_replace("<br />","",$row_cursuri['main_classes.title']) : "<strong>NOU!</strong> ".str_replace("<br />","",$row_cursuri['main_classes.title']);?></a></li>
				<?php } ?>
                </ul>
              </li>
			  
              <li <?php if($page=="firme") {echo'class="active"';}?>><a href="pentru-companii.php">Servicii pentru Companii</a></li>
			  
			  <li <?php if($page=="blog") {echo'class="active"';}?>><a href="blog.php">Blog</a></li>
			  
              <li <?php if($page=="contact") {echo'class="active"';}?>><a href="contact.php">Contact</a></li>
			  
            </ul>
          </nav>
        </div>
      </div>
    </div>