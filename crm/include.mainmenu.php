                <li <?php if (basename($_SERVER['PHP_SELF'])=="dashboard.php") { echo 'class="active"';} ?>>
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php if (basename($_SERVER['PHP_SELF'])=="cursuri.php" || basename($_SERVER['PHP_SELF'])=="curs.php" || basename($_SERVER['PHP_SELF'])=="vizualizare_curs.php") { echo 'class="active"';} ?>>
                    <a href="cursuri.php"><i class="fa fa-laptop"></i> <span class="nav-label">Cursuri</span></a>
                </li>
				<li <?php if (basename($_SERVER['PHP_SELF'])=="traineri.php" || basename($_SERVER['PHP_SELF'])=="trainer.php") { echo 'class="active"';} ?>>
                    <a href="traineri.php"><i class="fa fa-user"></i> <span class="nav-label">Traineri/Staff</span></a>
                </li>
                <li <?php if (basename($_SERVER['PHP_SELF'])=="clienti.php") { echo 'class="active"';} ?>>
                    <a href="clienti.php"><i class="fa fa-users"></i> <span class="nav-label">Cursanti</span></a>
                </li>
                <li <?php if (basename($_SERVER['PHP_SELF'])=="slider.php" || basename($_SERVER['PHP_SELF'])=="continut.php" || basename($_SERVER['PHP_SELF'])=="testimoniale.php" || basename($_SERVER['PHP_SELF'])=="testimonial.php" || basename($_SERVER['PHP_SELF'])=="noutati.php") { echo 'class="active"';} ?>>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Website CMS</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="slider.php") { echo 'class="active"';} ?>><a href="slider.php">Bannere home page</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php?id=1") { echo 'class="active"';} ?>><a href="continut.php?id=1">Home page</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php?id=2") { echo 'class="active"';} ?>><a href="continut.php?id=2">Despre noi</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php?id=3") { echo 'class="active"';} ?>><a href="continut.php?id=3">Pentru testeri</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php?id=4") { echo 'class="active"';} ?>><a href="continut.php?id=4">Pentru firme</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="noutati.php") { echo 'class="active"';} ?>><a href="noutati.php">Blog</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="testimoniale.php" || basename($_SERVER['PHP_SELF'])=="testimonial.php") { echo 'class="active"';} ?>><a href="testimoniale.php">Testimoniale</a></li>
                        <li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php?id=5") { echo 'class="active"';} ?>><a href="continut.php?id=5">Contact</a></li>
                    </ul>
                </li>