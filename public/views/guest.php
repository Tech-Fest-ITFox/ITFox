<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/">

    <title>ITFox</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css"> <!-- custom styles -->
    <link rel="stylesheet" href="libs/ripple/jquery.materialripple.css">
    <link rel="stylesheet" href="fonts/roboto/stylesheet.css"> <!-- fonts -->
    <link rel="stylesheet" href="fonts/roboto-slab/stylesheet.css"> <!-- fonts -->
    <link rel="stylesheet" href="fonts/icons/stroke.css"> <!-- fonts -->
    <link rel="stylesheet" href="fonts/categories/css/categories.css"> <!-- fonts -->
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.css"> <!-- fonts -->


</head>
<body id="landing" ng-app="ITFox" ng-controller="MainController">
<header>
    <a class="logo">ITFox</a>
</header>
<div class="landing-content" ng-view></div>

<footer>
            <a href="/">ITFox</a> 2016 <br />
            Всички права запазени  <br />
            Християн Япраков • Николай Колибаров • Даниел Лидиянов<br />
            <a href="http://www.weband.bg" target="_blank">www.weband.bg</a>
        </footer>


<!-- ANGULAR JS -->
    <script src="libs/angular/angular.min.js"></script>
    <script src="libs/angular-route/angular-route.min.js"></script>
    <script src="libs/angular-resource/angular-resource.min.js"></script>
    <script src="libs/ngStorage/ngStorage.min.js"></script>
    <script src="libs/angular-jwt/dist/angular-jwt.min.js"></script>
    <script src="libs/angular-wysiwyg/dist/angular-wysiwyg.min.js"></script>    

    <!-- ANGULAR CUSTOM -->
    <script src="js/modules/formValidation.js"></script>
    <script src="js/services.js"></script>
    <script src="js/controllers.js"></script>
    <script src="js/appRoutes.js"></script>
    <script src="js/app.js"></script>

<!-- CUSTOM JS -->
<script src="libs/jquery/dist/jquery.min.js"></script>
<script src="libs/jquery-ui/jquery-ui.min.js"></script>
<script src="libs/ripple/jquery.materialripple.js"></script>
<script src="libs/crspline/jquery.crspline.js"></script>
<script src="js/script.js"></script>
</body>
</html>
