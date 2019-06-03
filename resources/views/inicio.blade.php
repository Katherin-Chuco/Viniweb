<?php
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Vini Web</title>

        <link rel="stylesheet" href="/css/app.css">
        <link href="/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    </head>
    <body id="page-top" class="bg-gradient-primary">
        <div id="myapp">
            <div v-if="!showContent">
                <router-view></router-view>
            </div>

            <div v-else id="wrapper">
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                        <div class="sidebar-brand-text mx-3" >VINI WEB</div>
                    </a>

                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/home">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </router-link>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Mediciones
                    </div>

                    <li class="nav-item">
                        <router-link class="nav-link" to="/suelo">
                            <i class="fas fa-fw fa-chart-bar"></i>
                            <span>Humedad del Suelo</span>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" to="/ambiente">
                            <i class="fas fa-fw fa-chart-bar"></i>
                            <span>Humedad del Ambiente</span>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" to="/temperatura">
                            <i class="fas fa-fw fa-temperature-low"></i>
                            <span>Temperatura</span>
                        </router-link>
                    </li>

                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <router-link class="nav-link" to="/reportes">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Reportes</span>
                        </router-link>
                    </li>

                    <hr class="sidebar-divider">

                    <li class="nav-item">
                        <router-link class="nav-link" to="/configuraciones">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Configuraciones</span>
                        </router-link>
                    </li>

                </ul>

                <div id="content-wrapper" class="d-flex flex-column">
                    <div>
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item dropdown no-arrow mx-1">
                                    <router-link class="nav-link dropdown-toggle" to="/alertas">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">3+</span>
                                    </router-link>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <router-link class="dropdown-item" to="/perfil">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </router-link>
                                        <div class="dropdown-divider"></div>

                                        <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal" @click="cerrarSesion">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Cerrar Sesión
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <div class="container-fluid">
                            <router-view></router-view>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/js/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
    <script>
        var FORCE_SESSION = <?= json_encode($token)?>;
    </script>
    <script src="/js/app.js"></script>



</html>
<script>
    import Login from "../js/pages/Login";
    export default {
        components: {Login}
    }
</script>