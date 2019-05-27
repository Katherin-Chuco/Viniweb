<template>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background: url('https://www.animalgourmet.com/wp-content/uploads/2017/08/uva-de-mesa.jpg');background-position: center; background-size: cover ">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input v-model="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Correo electrónico"
                                                   :class="{ 'has-error': this.emailError, 'has-success': this.emailCorrect }">

                                        </div>
                                        <div class="form-group">
                                            <input v-model="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" @click="sendAuth">
                                            Iniciar Sesión
                                        </button>

                                        <div v-if="showErrorEmail" class="help-section">{{ showErrorEmail }}</div>
                                    </form>
                                    <!--<hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Registrarse</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "Login",

        data: function () {
            return {
                email: '',
                password: '',
                showErrorEmail: false,
                emailError: false,
                emailCorrect: false,
            }
        },

        methods: {
            validateForm: function () {
                let emailValue = this.email;

                let expr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|firstName|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                if (emailValue === "" || !expr.test(emailValue)) {
                    this.emailError = true;
                    return false;
                }
                this.emailError = false;
                this.emailCorrect = true;
                this.showErrorEmail = false;
                return true;
            },

            sendAuth: function () {
                if (this.validateForm())
                {
                    if (this.email == "admin@gmail.com" && this.password == 'admin123' ) {
                        this.$root.showContent = true;
                        this.$root.token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6ImNoZW1hbG9uc285NiIsIm5iZiI6MTU1ODczNzI0MiwiZXhwIjoxNTU4NzQwODQyLCJpYXQiOjE1NTg3MzcyNDIsImlzcyI6Imh0dHA6Ly82NC4yMDIuMTg2LjIxNS9BUElNZWthV2FzaCIsImF1ZCI6Imh0dHA6Ly82NC4yMDIuMTg2LjIxNS9BUElNZWthV2FzaCJ9.UFk-N6DEhYeR2OTHWFKkbm8CFcoiw1ENlGWpr-66meU";

                        this.$router.push({ name: 'Dashboard'});
                    } else {
                        this.showErrorEmail = "No se pudo iniciar sesión. Por favor revise sus datos."
                    }
                }
            }
        },

        mounted() {

            if (this.$root.token !== "") {
                this.$router.push({ name: 'Dashboard'});
            }
        }
    }
</script>
