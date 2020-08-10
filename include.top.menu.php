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
$sql_cursuri="SELECT * FROM `cursuri` 
LEFT JOIN `curs_main` 
ON `cursuri`.`parent`=`curs_main`.`id_curs_main` 
WHERE `start_inscriere`>NOW() AND `activ`=1
GROUP BY `parent`
ORDER BY `curs_main`.`order` ASC";
$query_cursuri=mysqli_query($link,$sql_cursuri);
while ($row_cursuri=mysqli_fetch_assoc($query_cursuri)) { 
?>
                  <li><a href="curs.php?id=<?php echo $row_cursuri['id_curs_main'];?>"><?php echo $row_cursuri['nou']==0 ? str_replace("<br />","",$row_cursuri['titlu_main']) : "<strong>NOU!</strong> ".str_replace("<br />","",$row_cursuri['titlu_main']);?></a></li>
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