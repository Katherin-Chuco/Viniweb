<template>
    <div id="wrapper">
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
                <router-link class="nav-link" to="/temperatura" >
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

                <div>
                    <router-view></router-view>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Base",
        methods: {
            goToTemperature: function () {
                this.$router.push ({
                    name: 'Temperature'
                });
            }
        }
    }
</script>
