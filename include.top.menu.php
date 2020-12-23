<div class="header-nav">
  <div class="header-nav-wrapper navbar-scrolltofixed">
    <div class="container">
      <nav id="menuzord-right" class="menuzord yellow ">
        <a class="menuzord-brand pull-left flip" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php"><img src="images/logo-academia-testarii.png" alt=""></a>
        <ul class="menuzord-menu">

          <li <?php if ($page == "home") {
                echo 'class="home active"> <a href="#up">';
              } else {
                echo 'class="home"><a href="https://' . $_SERVER['HTTP_HOST'] . '/index.php">';
              } ?><i class="fa fa-home"></i></a></li>

          <li <?php if ($page == "despre") {
                echo 'class="active"';
              } ?>><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/despre-noi.php">Despre noi</a></li>

          <li <?php if ($page == "cursuri") {
                echo 'class="active"';
              } ?>><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/cursuri.php">Cursuri pentru tine </a>
            <ul class="dropdown">
              <?php
              $sql_cursuri = "SELECT main_classes.* FROM `main_classes`
JOIN `classes`
ON `classes`.`main_class_id`=`main_classes`.`id`
WHERE main_classes.`is_active`=1";

              if (isset($academiaTestariiTrainerProvider)) {
                $sql_cursuri .= " AND main_classes.trainer_provider_id = $academiaTestariiTrainerProvider";
              }

              $sql_cursuri .= " AND classes.is_active = 1
GROUP by main_classes.id
ORDER BY `main_classes`.`order` ASC";
              $query_cursuri = mysqli_query($link, $sql_cursuri);
              while ($row_cursuri = mysqli_fetch_assoc($query_cursuri)) {
              ?>
                <li><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/curs/<?php echo $row_cursuri['id'] . '/' . strtolower(str_replace(" ", "-", iconv('utf-8', 'ascii//TRANSLIT', $row_cursuri['title']))) ?>">
                    <?php echo ($row_cursuri['is_new'] == 0) ? (str_replace("<br />", "", $row_cursuri['title'])) : ("<strong>NOU!</strong> " . str_replace("<br />", "", $row_cursuri['title'])); ?></a>
                </li>
              <?php } ?>
            </ul>
          </li>

          <li <?php if ($page == "firme") {
                echo 'class="active"';
              } ?>><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/pentru-companii.php">Servicii pentru Companii</a></li>

          <li <?php if ($page == "blog") {
                echo 'class="active"';
              } ?>><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/blog.php">Blog</a></li>

          <li <?php if ($page == "contact") {
                echo 'class="active"';
              } ?>><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/contact.php">Contact</a></li>

        </ul>
      </nav>
    </div>
  </div>
</div>
