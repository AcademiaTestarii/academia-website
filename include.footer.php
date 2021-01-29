<div class="container pt-40 pb-0">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="widget dark">
                <img class="mt-5 mb-20" alt="" src="images/logo-academia-testarii-white.png">
                <p><strong>SOFTTEST SERVICES S.R.L. </strong><br /><strong>Sediul Social:</strong> Str. Col Stoika Stefan nr. 22 Sector 1 București, România<br />
                    <strong>Nr. Reg. Comert:</strong> J40/82/2020<br />
                    <strong>IBAN:</strong> RO42 INGB 0000 9999 0985 9526<br />
                    <strong>CUI:</strong> 42075475</p>
                <ul class="list-inline mt-5">
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="tel:0799005004">(+4) 0799.005.004</a> </li>
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="tel:0734540913">(+4) 0734.540.913</a> </li>
                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="mailto:contact@academiatestarii.ro">contact@academiatestarii.ro</a> </li>
                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 pt-20">
            <div class="widget dark">
                <h4 class="widget-title">Legături rapide</h4>
                <ul class="list angle-double-right list-border">
                    <?php if (isset($_SESSION['key_admin']) && ($_SESSION['key_admin'] == session_id())) { ?>
                        <li><a href="/contul_tau.php">Contul tău</a> </li>
                        <li><a href="/logout.php">Logout</a> </li>
                    <?php } else { ?>
                        <li><a href="/ajax-load/register-form.html" class="ajaxload-popup">Înregistrare</a></li>
                        <li><a href="/ajax-load/login-form.html" class="ajaxload-popup">Intră în cont</a></li>
                        <li><a href="/inscriere-curs.php">Înscrie-te la un curs</a></li>
                    <?php } ?>
                    <li><a href="/termeni-si-conditii.php">Termeni si condiţii</a></li>

                </ul>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 pt-20">
            <div class="widget dark">
                <h5 class="widget-title mb-10">Urmărește-ne pe social media</h5>
                <ul class="styled-icons icon-bordered icon-sm">
                    <li><a href="https://www.facebook.com/academiatestarii/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/academia-testarii/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>

            <!--div class="widget dark">
              <h5 class="widget-title mb-10">Înscrie-te la newsletter-ul nostru prin Mail Chimp</h5>

              <form id="mailchimp-subscription-form-footer" class="newsletter-form">
                <div class="input-group">
                  <input type="email" value="" minlength="5" name="EMAIL" placeholder="Adresa email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer">
                  <span class="input-group-btn">
                    <button data-height="45px" class="btn bg-theme-colored2 text-white btn-xs m-0 font-14" type="submit">Înscrie-te</button>
                  </span>
                </div>
              </form>

              <script type="text/javascript">
                $('#mailchimp-subscription-form-footer').ajaxChimp({
                    callback: mailChimpCallBack,
                    url: '//'
                });
                function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                        $response = '';
                    $mailchimpform.children(".alert").remove();
                    if (resp.result === 'success') {
                        $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Inchide"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    } else if (resp.result === 'error') {
                        $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Inchide"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    }
                    $mailchimpform.prepend($response);
                }
              </script>

            </div-->

        </div>

    </div>

</div>