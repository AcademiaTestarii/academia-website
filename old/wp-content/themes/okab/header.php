<?php dima_helper::dima_get_view( dima_helper::dima_get_demo(), 'wp', 'header' ); ?>
<?php
$cookie_name = "agreement";
$cookie_value = "1";

if(!isset($_COOKIE[$cookie_name])) {
    echo '<div class="global_agreement" style="position: fixed; top: 0; left: 0; display: block; z-index: 999999; background: #2b90d9; width: 100%; text-align: center; color: white;"><span class="text">Pentru a îţi îmbunătăţi experinţa  de utilizator, acest site foloseşte cookies. Continuarea navigării presupune acceptul utilizatorilor cu privire la folosirea acestora.
</span> <br/> <a class="ok_agreement" style="color:white; text-transform: underline; border:1px solid #fff; padding:5px; margin-right:5px;" onclick="location.reload();">Ok</a> <a href="http://academiatestarii.ro/wp-content/uploads/2018/05/Politica-de-confidentialitate-si-cookie.pdf" style="color:white; text-transform: underline; border:1px solid #fff; padding:5px; margin-right:5px;" class="link_agreement">Citeste mai multe</a></div>';
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
}
?>
