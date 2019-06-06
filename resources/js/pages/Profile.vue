<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Perfil
        </h1>

        <div class="mb-10">
            <div class="card-header flex justify-between items-center">
                <p>Configura tu contraseña: </p>

            </div>

            <div class="block shadow flex-row mb-6 bg-white" style="padding: 30px; margin-top: 10px; height: 500px">

                    <form class="user">

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input v-model="passwordOne" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                            </div>
                            <div class="col-sm-6">
                                <input v-model="passwordTwo" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir contraseña">
                            </div>
                        </div>

                        <button class="btn btn-primary btn-user btn-block" @click="saveUser">
                            Guardar cambios
                        </button>

                        <div v-if="showErrorEmail" class="help-section" style="margin-top: 10px; color:red;">{{ showErrorEmail }}</div>
                    </form>



            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Profile",
        data: function () {
          return {
              passwordOne: '',
              passwordTwo: '',
              showErrorEmail: false
          }
        },
        methods: {
            saveUser: function () {
                if (this.passwordOne && this.passwordTwo && this.passwordOne === this.passwordTwo) {


                } else {
                    this.showErrorEmail = "*Completar todos los campos."
                }
            }
        },

        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }
        }
    }
</script>
