<template>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background: url('https://www.animalgourmet.com/wp-content/uploads/2017/08/uva-de-mesa.jpg');background-position: center; background-size: cover "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Regístrate</h1>
                            </div>
                            <form class="user">

                                <div class="form-group">
                                    <input v-model="email" type="email" class="form-control form-control-user" id="exampleLastName" placeholder="Correo electrónico">
                                </div>
                                <!-- <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                   <select class="custom-select custom-select-sm form-control-user" style="height: 50px; padding:0.5rem; padding-left: 1rem" v-model="rol">
                                       <option disabled value=""> Seleccione su rol </option>
                                       <option>Administrador</option>
                                       <option >Cliente</option>
                                   </select>
                               </div>-->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input v-model="passwordOne" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                        <input v-model="passwordTwo" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir contraseña">
                                    </div>
                                </div>

                               <button class="btn btn-primary btn-user btn-block" @click="saveUser">
                                   Registrarme
                               </button>

                                <div v-if="showErrorEmail" class="help-section" style="margin-top: 10px; color:red;">{{ showErrorEmail }}</div>
                           </form>
                           <hr>
                           <!--  <div class="text-center">
                                 <a class="small" href="forgot-password.html">Olvide mi contraseña</a>
                             </div> -->
                              <div class="text-center">
                                  <router-link class="small" to="/">¿Ya te registraste? Inicia Sesión</router-link>
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
          name: "Register",
          data: function () {
              return {
                  email: '',
                  passwordOne: '',
                  passwordTwo: '',
                  showErrorEmail: false

              }
          },

          methods: {
              validateForm: function () {
                  let emailValue = this.email;

                  let expr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|firstName|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                  if (emailValue === "" || !expr.test(emailValue)) {
                      this.emailError = true;
                      this.showErrorEmail = "Formato de correo electrónico incorrecto.";
                      return false;
                  }
                  this.emailError = false;
                  this.emailCorrect = true;
                  this.showErrorEmail = false;
                  return true;
              },

              saveUser: function () {

                  if (!this.validateForm()) {
                      return;
                  }

                  if (this.passwordOne && this.passwordTwo && this.passwordOne === this.passwordTwo) {

                      axios({
                          method: 'post',
                          url: 'registronuevo',
                          headers: { 'content-type': 'application/json' },
                          data: {
                              username: this.email,
                              password: this.passwordOne
                          }
                      }).then(response => {
                          this.$root.showContent = true;
                          this.$root.token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6ImNoZW1hbG9uc285NiIsIm5iZiI6MTU1ODczNzI0MiwiZXhwIjoxNTU4NzQwODQyLCJpYXQiOjE1NTg3MzcyNDIsImlzcyI6Imh0dHA6Ly82NC4yMDIuMTg2LjIxNS9BUElNZWthV2FzaCIsImF1ZCI6Imh0dHA6Ly82NC4yMDIuMTg2LjIxNS9BUElNZWthV2FzaCJ9.UFk-N6DEhYeR2OTHWFKkbm8CFcoiw1ENlGWpr-66meU";

                          this.$router.push({ name: 'Dashboard'});


                      }).catch(function (error) {
                          // handle error
                          console.log(error.response);
                      });
                  } else {
                      this.showErrorEmail = "*Completar correctamente todos los campos."
                  }
              }
          }
      }
  </script>

