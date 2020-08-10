<?php header("Location:dashboard.php");?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Academia Testarii CRM | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeIn">
        <div>
            <div>

                <h1 class="logo-name"><img class="img-circle profile-pic" src="img/logo-nou.png" alt="Academia Testarii" /></h1>

            </div>
            <h3>Academia Testarii CRM</h3>
            <p>Accesul este permis doar persoanelor autorizate. IP-ul tau a fost inregistrat.</p>
            <form class="m-t" role="form" action="dashboard.php">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!--a href="#"><small>Ai uitat parola?</small></a>
                <p class="text-muted text-center"><small>Nu ai cont?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Creaza un cont nou</a-->
            </form>
            <p class="m-t"> <small>Made by CORE Design - 2019</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>