<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crox Notices</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/login.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header id="header" class="w3-container w3-red w3-center">
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sections</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Last News</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Economy</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Society</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sports</a>
            <a href="view/example.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">More</a>
        </div>
</header>
<br><br><br><br><br>
<!--<main>
    <div class="login">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="u" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
</main>-->
<form class="login">
    <fieldset>
        <legend class="legend">Login</legend>
        <div class="input">
            <input type="email" placeholder="Email" required />
            <span><i class="fa fa-envelope-o"></i></span>
        </div>
        <div class="input">
            <input type="password" placeholder="Password" required />
            <span><i class="fa fa-lock"></i></span>
        </div>
        <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
    </fieldset>
    <div class="feedback">
        login successful <br />
        redirecting...
    </div>
</form>
<?php   include_once "partial/footer.mustache";  ?>
</body>
</html>