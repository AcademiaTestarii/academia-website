                <li <?php if (basename($_SERVER['PHP_SELF'])=="dashboard.php") { echo 'class="active"';} ?>>
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
				
				<li <?php if (basename($_SERVER['PHP_SELF'])=="home-page.php" || basename($_SERVER['PHP_SELF'])=="testimonial.php" || basename($_SERVER['PHP_SELF'])=="modifica_slider.php" ) { echo 'class="active"';} ?>>
					<a href="home-page.php"><i class="fa fa-home"></i> <span class="nav-label">Home page</span></a>
				</li>
				
				<li <?php if (basename($_SERVER['PHP_SELF'])=="continut.php") { echo 'class="active"';} ?>>
					<a href="continut.php?id=2"><i class="fa fa-user-secret"></i> <span class="nav-label">Despre noi</span></a>
				</li>	

                <li <?php if (basename($_SERVER['PHP_SELF'])=="cursuri.php" || basename($_SERVER['PHP_SELF'])=="curs.php" || basename($_SERVER['PHP_SELF'])=="vizualizare_curs.php" || basename($_SERVER['PHP_SELF'])=="adauga_curs.php") { echo 'class="active"';} ?>>
                    <a href="cursuri.php"><i class="fa fa-laptop"></i> <span class="nav-label">Cursuri</span></a>
                </li>
				
                <li <?php if (basename($_SERVER['PHP_SELF'])=="cursanti.php") { echo 'class="active"';} ?>>
                    <a href="cursanti.php"><i class="fa fa-users"></i> <span class="nav-label">Cursanti</span></a>
                </li>	
				
                <li <?php if (basename($_SERVER['PHP_SELF'])=="comunicare.php") { echo 'class="active"';} ?>>
                    <a href="comunicare.php"><i class="fa fa-users"></i> <span class="nav-label">Comunicare</span></a>
                </li>
				
				<li <?php if (basename($_SERVER['PHP_SELF'])=="traineri.php" || basename($_SERVER['PHP_SELF'])=="trainer.php") { echo 'class="active"';} ?>>
                    <a href="traineri.php"><i class="fa fa-user"></i> <span class="nav-label">Traineri/Staff</span></a>
                </li>
				
				<li <?php if (basename($_SERVER['PHP_SELF'])=="parteneri.php" || basename($_SERVER['PHP_SELF'])=="partener.php") { echo 'class="active"';} ?>>
                    <a href="parteneri.php"><i class="fa fa-user"></i> <span class="nav-label">Parteneri</span></a>
                </li>
				
                <!--li <?php if (basename($_SERVER['PHP_SELF'])=="clienti.php") { echo 'class="active"';} ?>>
                    <a href="clienti.php"><i class="fa fa-users"></i> <span class="nav-label">Cursanti</span></a>
                </li-->
				
				<li <?php if (basename($_SERVER['PHP_SELF'])=="blog.php" || basename($_SERVER['PHP_SELF'])=="modifica_blog.php" || basename($_SERVER['PHP_SELF'])=="adauga_blog.php") { echo 'class="active"';} ?>>
					<a href="blog.php"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Blog</span></a>
				</li>