<template>
    <div>

        <div v-if="showMessageS" class="px-3 py-1 bg-success text-white d-flex flex-row align-items-center justify-content-between" >
            <p>{{messageS}} </p> <button @click="closeMessage" class="text-white"><p>X</p></button>
        </div>

        <div v-if="showMessageE" class="px-3 py-1 bg-warning text-white d-flex flex-row align-items-center justify-content-between" >
            <p>{{messageE}} </p> <button @click="closeMessage" class="text-white"><p>X</p></button>
        </div>

        <br/>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Configuraciones</h1>
        </div>

        <p class="mb-4">Configura el valor máximo y mínimo de tus mediciones: </p>

        <div class="row">

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Humedad del Ambiente</h6>
                        <div class="dropdown no-arrow">
                            <button @click="editA" class="dropdown-toggle" href="#" role="button">
                                <i class="fas fa-edit fa-sm fa-fw text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pt-1 flex-col">
                            <label>Valor mínimo: </label>
                            <input v-model.number="ambMin" type="number" class="ml-1 border-2" :disabled="!showA">
                        </div>
                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="ambMax" type="number" class="ml-1 border-2" :disabled="!showA">
                        </div>

                        <br/>
                        <button v-if="showA" @click="cancelA"  class="btn btn-primary btn-block rounded-full text-white font-bold " >
                            Cancelar
                        </button>
                        <button v-if="showA" @click="save(2, ambMax, ambMin)" class=" btn btn-primary btn-block rounded-full text-white font-bold " >
                            Guardar
                        </button>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Humedad del Suelo</h6>
                        <div class="dropdown no-arrow">
                            <button @click="editS" class="dropdown-toggle" href="#" role="button">
                                <i class="fas fa-edit fa-sm fa-fw text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="pt-1 flex-col">
                            <label>Valor mínimo: </label>
                            <input v-model.number="sueMin" type="number" class="ml-1 border-2" :disabled="!showS">
                        </div>
                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="sueMax" type="number" class="ml-1 border-2" :disabled="!showS">
                        </div>

                        <br/>
                        <button v-if="showS" @click="cancelS" class="btn btn-primary btn-block rounded-full text-white font-bold">
                            Cancelar
                        </button>
                        <button v-if="showS" @click="save(3, sueMax, sueMin)" class="btn btn-primary btn-block rounded-full text-white font-bold">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Temperatura del Ambiente</h6>
                        <div class="dropdown no-arrow">
                            <button @click="editT" class="dropdown-toggle" href="#" role="button">
                                <i class="fas fa-edit fa-sm fa-fw text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pt-1 flex-col">
                            <label>Valor mínimo: </label>
                            <input v-model.number="tempMin" type="number" class="ml-1 border-2" :disabled="!showT"> ºC
                        </div>
                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="tempMax" type="number" class="ml-1 border-2" :disabled="!showT"> ºC
                        </div>

                        <br/>
                        <button v-if="showT" @click="cancelT" class="btn btn-primary btn-block rounded-full text-white font-bold" >
                            Cancelar
                        </button>
                        <button v-if="showT" @click="save(1, tempMax, tempMin)" class="btn btn-primary btn-block rounded-full text-white font-bold" >
                            Guardar
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Configurations",
        data: function(){
          return {
              showS: false,
              showA: false,
              showT: false,
              ambMin: 0,
              sueMin: 0,
              tempMin: 0,
              ambMax: 0,
              sueMax: 0,
              tempMax: 0,
              messageS: "",
              messageE: "",
              showMessageS: false,
              showMessageE: false,

          }
        },
        mounted: function () {
            this.send();
        },
        methods: {
            send: function () {
                axios({
                    method: 'get',
                    url: 'defecto'
                }).then(response => {

                    this.ambMin = response.data[1].valormin;
                    this.ambMax = response.data[1].valormax;
                    this.sueMin = response.data[2].valormin;
                    this.sueMax = response.data[2].valormax;
                    this.tempMin = response.data[0].valormin;
                    this.tempMax = response.data[0].valormax;

                });
            },
            save: function (id, max, min) {

                this.showS = false;
                this.showA = false;
                this.showT = false;

                axios({
                    method: 'post',
                    url: 'guardarconfig',
                    headers: { 'content-type': 'application/json' },
                    data: {
                        id: id,
                        valormax: max,
                        valormin: min
                    }
                }).then(response => {

                    this.messageS= "Se guardo correctamente";
                    console.log(response);
                    this.send();
                    this.showMessageS= true;

                }).catch( error => {
                    this.messageE= "Ocurrio un error. Vuelva a intentarlo.";
                    this.showMessageE= true;
                });
            },

            editS: function () {
                this.showS = true;
            },
            editA: function () {
                this.showA = true;
            },
            editT: function () {
                this.showT = true;
            },

            cancelS: function () {
                this.showS = false;
            },
            cancelA: function () {
                this.showA = false;
            },
            cancelT: function () {
                this.showT = false;
            },

            closeMessage: function () {
                this.showMessageS = false;
                this.showMessageE = false;
            }
        }

    }
</script>
