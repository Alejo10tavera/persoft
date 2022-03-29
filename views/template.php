<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Persoft </title>
    <link rel="icon" type="image/x-icon" href="views/assets/img/favicon.ico"/>
    <link href="views/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="views/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="views/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="views/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="views/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<?php if (!isset($_SESSION["validationSession"])): 

    include "modules/authentication/login.php";

?>

<?php else: ?>

    <body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'modules/structure/header.php' ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'modules/structure/menu.php' ?>
        <!--  END SIDEBAR  -->


    
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <?php include 'modules/core/dashboard_v1.php' ?>
            
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="views/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="views/bootstrap/js/popper.min.js"></script>
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
    <script src="views/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="views/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="views/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="views/plugins/apex/apexcharts.min.js"></script>
    <script src="views/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
    
<?php endif ?>


</html>