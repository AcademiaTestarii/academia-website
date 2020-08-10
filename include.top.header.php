    <div class="header-top grey_bk sm-text-center pt-10 pb-30">
      <div class="container">
        <div class="row">
         
          <div class="col-md-6 mb-10 col-xs-12 hidden-xs">
            <div class="widget">
              <ul class="list-bordered styled-icon-info">
                <li><i class="fa fa-phone text-theme-colored2"></i><a style="color: #1bb4e0;" href="tel:0799005004">0799.005.004</a> sau <a style="color: #1bb4e0;" href="tel:0734540913">0734.540.913</a> <i class="fa fa-envelope-o text-theme-colored2"></i><a class="text-theme-colored2" href="mailto:contact@academiatestarii.ro">contact@academiatestarii.ro</a></li>
              </ul>
            </div>
          </div>
		  
          <div class="col-md-4 col-xs-12">
            <div class="widget">
              <ul class="list-inline pull-right list-bordered styled-icon-info">
			  <?php if (isset($_SESSION['key_admin']) && ($_SESSION['key_admin'] == session_id())) { ?>
                <li class="m-0 pl-10"> <a href="/contul_tau.php"><i class="fa fa-user-o mr-5 text-theme-colored2"></i> Contul tău</a> </li>
                <li class="m-0 pl-10"> <a href="/logout.php"><i class="fa fa fa-sign-out mr-5 text-theme-colored2"></i> Logout</a> </li>
			  <?php } else { ?>
                <li class="m-0 pl-10"><a href="/ajax-load/login-form.html" class="ajaxload-popup"><i class="fa fa-user-o mr-5 text-theme-colored2"></i> Intră în cont</a></li>
				<li class="m-0 pl-0 pr-10"><a href="/inscriere-curs.php"><i class="fa fa-edit mr-5 text-theme-colored2"></i>Înscrie-te la un curs</a></li>
			  <?php } ?>
              </ul>
            </div>
          </div>
		  
		   <div class="col-md-2 mb-10 col-xs-12 hidden-xs">
            <div class="widget pull-right">
              <ul class="styled-icons icon-sm">
                <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="https://www.facebook.com/academiatestarii/" target="_blank" data-color="#3b5998"><i class="fa fa-facebook"></i></a></li>
                <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="https://www.linkedin.com/company/academia-testarii/" target="_blank" data-color="#0077B5"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
		  
        </div>
      </div>
    </div>