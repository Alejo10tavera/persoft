<?php 

session_start();

if(isset($_SESSION["user"])){

    $suser = ControllerUsers::ctrViewData("users","suser", $_SESSION["user"],"bdelete",0);
    
}

?>
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
    <link href="views/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="views/plugins/table/datatable/datatables.css">
    
    <link rel="stylesheet" type="text/css" href="views/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="views/plugins/table/datatable/custom_dt_custom.css">
    <link href="views/plugins/data-table/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"> 
    <link href="views/plugins/data-table/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"> 

    
    <link href="views/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="views/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="views/plugins/font-icons/fontawesome/css/regular.css">
    <link rel="stylesheet" href="views/plugins/font-icons/fontawesome/css/fontawesome.css">

    <script src="views/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="views/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="views/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="views/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />    
    
    <script src="views/plugins/sweetalerts/sweetalert2.min.js"></script>
        <script src="views/plugins/sweetalerts/custom-sweetalert.js"></script>

    <link rel="stylesheet" type="text/css" href="views/plugins/bootstrap-select/bootstrap-select.min.css">
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

                <?php 

                    if(isset($_GET['route'])){

                        if($_GET["route"] == "dashboard-v1" ||
                           $_GET["route"] == "dashboard-v2" ||
                           $_GET["route"] == "incomes" ||
                           $_GET["route"] == "expenses" ||
                           $_GET["route"] == "debts" ||
                           $_GET["route"] == "lends" ||
                           $_GET["route"] == "goals" ||
                           $_GET["route"] == "categories" ||
                           $_GET["route"] == "persons" ||
                           $_GET["route"] == "users"){

                            include "modules/core/".$_GET['route'].".php";

                        }else if($_GET["route"] == "close"){

                            include "modules/authentication/".$_GET['route'].".php";

                        }else{

                            include "modules/structure/404.php";

                        }

                    }

                ?>
                
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="views/assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="views/bootstrap/js/popper.min.js"></script>
        <script src="views/bootstrap/js/bootstrap.min.js"></script>
        <script src="views/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="views/assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="views/plugins/highlight/highlight.pack.js"></script>
        <script src="views/assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="views/plugins/apex/apexcharts.min.js"></script>
        <script src="views/assets/js/dashboard/dash_1.js"></script>
        <script src="views/assets/js/dashboard/dash_2.js"></script>
        <script src="views/plugins/table/datatable/datatables.js"></script>
        <!-- <script src="views/plugins/data-table/js/jquery.dataTables.min.js"></script> -->
        <script src="views/plugins/data-table/js/dataTables.bootstrap4.min.js"></script> 
        <script src="views/plugins/data-table/js/dataTables.responsive.min.js"></script>
        <script src="views/plugins/data-table/js/responsive.bootstrap.min.js"></script>
        <script src="views/plugins/flatpickr/custom-flatpickr.js"></script>
        <script src="views/assets/js/scrollspyNav.js"></script>
        <script src="views/plugins/font-icons/feather/feather.min.js"></script>
        <script src="views/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <script src="views/js/incomes.js"></script>
        <script src="views/js/users.js"></script>

    </body>
    
<?php endif ?>


</html>