<template>
    <div class="container-fluid">

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
                        <span v-if="errorAmin" style="color: red; font-size: 12px">{{ errorAmin}}</span>

                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="ambMax" type="number" class="ml-1 border-2" :disabled="!showA">
                        </div>
                        <span v-if="errorAmax" style="color: red; font-size: 12px">{{errorAmax}}</span>

                        <div class="pt-4 flex-row">
                            <label>Activar notificaciones</label>
                            <input v-model.number="activoA" type="checkbox" class="ml-1 border-2" :disabled="!showA">
                        </div>

                        <br/>
                        <button v-if="showA" @click="cancelA"  class="btn btn-primary btn-block rounded-full text-white font-bold " >
                            Cancelar
                        </button>
                        <button v-if="showA" @click="save(2, ambMax, ambMin, activoA)" class=" btn btn-primary btn-block rounded-full text-white font-bold " >
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
                        <span v-if="errorSmin" style="color: red; font-size: 12px">{{errorSmin}}</span>

                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="sueMax" type="number" class="ml-1 border-2" :disabled="!showS">
                        </div>
                        <span v-if="errorSmax" style="color: red; font-size: 12px">{{errorSmax}}</span>

                        <div class="pt-4 flex-row">
                            <label>Activar notificaciones</label>
                            <input v-model.number="activoS" type="checkbox" class="ml-1 border-2" :disabled="!showS">
                        </div>

                        <br/>
                        <button v-if="showS" @click="cancelS" class="btn btn-primary btn-block rounded-full text-white font-bold">
                            Cancelar
                        </button>
                        <button v-if="showS" @click="save(3, sueMax, sueMin,activoS )" class="btn btn-primary btn-block rounded-full text-white font-bold">
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
                        <span v-if="errorTmin" style="color: red; font-size: 12px">{{errorTmin}}</span>

                        <div class="pt-4 flex-col">
                            <label>Valor máximo:</label>
                            <input v-model.number="tempMax" type="number" class="ml-1 border-2" :disabled="!showT"> ºC
                        </div>
                        <span v-if="errorTmax" style="color: red; font-size: 12px">{{errorTmax}}</span>


                        <div class="pt-4 flex-row">
                            <label>Activar notificaciones</label>
                            <input v-model.number="activoT" type="checkbox" class="ml-1 border-2" :disabled="!showT">
                        </div>


                        <br/>
                        <button v-if="showT" @click="cancelT" class="btn btn-primary btn-block rounded-full text-white font-bold" >
                            Cancelar
                        </button>
                        <button v-if="showT" @click="save(1, tempMax, tempMin, activoT)" class="btn btn-primary btn-block rounded-full text-white font-bold" >
                            Guardar
                        </button>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Intervalo de medición</h6>
                        <div class="dropdown no-arrow">
                            <button @click="editI" class="dropdown-toggle" href="#" role="button">
                                <i class="fas fa-edit fa-sm fa-fw text-gray-400"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pt-1 flex-col">
                            <label>Intervalo: </label>
                            <label v-if="showI">Configura el intervalo:</label>
                            <select class="custom-select custom-select-sm" v-model="rango" :disabled="!showI">
                                <option disabled value=""> -- </option>
                                <option value="15">Cada 15 minutos</option>
                                <option value="30">Cada 30 minutos.</option>
                                <option value="60">Cada hora</option>
                            </select>
                        </div>

                        <br/>
                        <button v-if="showI" @click="cancelI" class="btn btn-primary btn-block rounded-full text-white font-bold" >
                            Cancelar
                        </button>
                        <button v-if="showI" @click="save(5, rango, 0, false)" class="btn btn-primary btn-block rounded-full text-white font-bold" >
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
              showI: false,
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
              activoA: true,
              activoS: true,
              activoT: true,

              errorAmin: false,
              errorAmax: false,
              errorSmax: false,
              errorSmin: false,
              errorTmax: false,
              errorTmin: false,


              rango: 15,

          }
        },
        mounted: function () {
            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            this.send();
        },
        methods: {
            send: function () {


                axios({
                    method: 'get',
                    url: 'defecto'
                }).then(response => {
                    console.log('Defecto',response);

                    this.ambMin = response.data[1].valormin;
                    this.ambMax = response.data[1].valormax;
                    this.activoA = response.data[1].act;
                    this.sueMin = response.data[2].valormin;
                    this.sueMax = response.data[2].valormax;
                    this.activoS = response.data[2].act;
                    this.tempMin = response.data[0].valormin;
                    this.tempMax = response.data[0].valormax;
                    this.activoT = response.data[0].act;
                    this.rango = response.data[3].valormax

                })
            },
            save: function (id, max, min, activo) {

                //console.log('rango',max);
                var messageVacio = "*El campo no debe estar vacío.";
                var messageFuera = "*Rango no permitido";

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;

                var ningunerror = true;

                if (!max) {

                    if (id == 1) {

                        this.errorTmax = messageVacio
                    } else if( id == 2) {
                        this.errorAmax = messageVacio
                    } else if( id == 3) {
                        this.errorSmax = messageVacio

                    }
                    ningunerror= false;
                }

                if(!min) {
                    if (id == 1) {
                        this.errorTmin = messageVacio
                    } else if( id == 2) {
                        this.errorAmin = messageVacio

                    } else if( id == 3) {
                        this.errorSmin = messageVacio
                    }
                    ningunerror= false;
                }

                if(max < -40 || max > 80 ) {
                    if (id == 1) {
                        this.errorTmax = messageFuera;

                    } else if( id === 2) {
                        this.errorAmax = messageFuera;

                    } else if( id === 3) {
                        this.errorSmax = messageFuera;

                    }
                    ningunerror= false;
                }

                if(min < -40 || min > 80 ) {
                    if (id === 1) {
                        this.errorTmin = messageFuera;

                    } else if( id === 2) {
                        this.errorAmin = messageFuera;

                    } else if( id === 3) {
                        this.errorSmin = messageFuera;

                    }
                    ningunerror= false;
                }

                if(!ningunerror) {
                    return;
                }

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;

                this.showS = false;
                this.showA = false;
                this.showT = false;
                this.showI = false;

                axios({
                    method: 'post',
                    url: 'guardarconfig',
                    headers: { 'content-type': 'application/json' },
                    data: {
                        id: id,
                        max: max,
                        min: min,
                        act: activo
                    }
                }).then(response => {

                    this.messageS= "Se guardo correctamente";
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
            editI: function () {
                this.showI = true;
            },

            cancelS: function () {
                this.showS = false;
                this.send();

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;
            },
            cancelA: function () {
                this.showA = false;
                this.send();

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;
            },
            cancelT: function () {
                this.showT = false;
                this.send();

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;
            },
            cancelI: function () {
                this.showI = false;
                this.send();

                this.errorAmin= false;
                this.errorAmax= false;
                this.errorSmax= false;
                this.errorSmin= false;
                this.errorTmax= false;
                this.errorTmin= false;
            },

            closeMessage: function () {
                this.showMessageS = false;
                this.showMessageE = false;
            }
        }

    }
</script>
