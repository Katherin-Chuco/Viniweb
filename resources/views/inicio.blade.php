<?php
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Vini Web</title>

        <link rel="stylesheet" href="/css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <body class="font-sans m-0">
        <div id="app" class="flex bg-grey-lighter">
            <aside class="lg:w-64 md:w-48 pt-6 px-6 bg-blue-light flex-col text-white">
                <header class="py-6">
                    <h1>VINI WEB</h1>
                </header>

                <hr class="sidebar-divider my-0">

                <section class="mb-6 mt-8">
                    <h5 class="uppercase font-bold mb-4 text-base"><router-link class="text-black" to="/">Dashboard</router-link></h5>
                </section>

                <hr class="sidebar-divider">

                <section class="mb-6 mt-6">
                    <h5 class="uppercase font-bold mb-4 text-base">Mediciones</h5>

                    <ul class="list-reset">
                        <li class="text-sm pb-4 leading-loose"><router-link class="text-black" to="/humedad">Humedad</router-link></li>
                        <li class="text-sm pb-4 leading-loose"><router-link class="text-black" to="/temperatura">Temperatura</router-link></li>
                    </ul>

                </section>

                <hr class="sidebar-divider">

                <section class="mb-6 mt-8">
                    <h5 class="uppercase font-bold mb-4 text-base"><router-link class="text-black" to="/reportes">Reportes</router-link></h5>
                </section>

                <hr class="sidebar-divider">

                <section class="mb-6 mt-8">
                    <h5 class="uppercase font-bold mb-4 text-base"><router-link class="text-black" to="/configuraciones">Configuraciones</router-link></h5>
                </section>


            </aside>

            <div class="flex-1">
                <div>
                    <nav class="navbar-nav justify-start bg-white topbar h-14 mb-6 pt-4 static shadow-md">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mx-1">

                                <router-link class="nav-link dropdown-toggle" to="/alertas">
                                    <img width="20%" height="20%" src="/img/notification.png">
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </router-link>
                            </li>

                            <div class="topbar-divider d-none"></div>

                            <li class="nav-item mr-10">
                                <router-link class="nav-link dropdown-toggle" to="/perfil">
                                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                                </router-link>
                            </li>
                        </ul>
                    </nav>

                    <div class="px-8 pt-6">
                        <router-view></router-view>
                    </div>
                </div>

                <footer class="sticky bg-white">
                    <div class="container my-auto">
                        <div class="text-center my-auto">
                            <span>Copyright © VineWeb Website 2019</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <script src="/js/app.js"></script>


</html>