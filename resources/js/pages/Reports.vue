<template>

    <div class="container-fluid">
        <div v-if="errorMessage" class="px-3 py-1 bg-warning text-white d-flex flex-row align-items-center justify-content-between" >
            <p>{{errorMessage}} </p> <button @click="closeMessage" class="text-white"><p>X</p></button>
        </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reportes</h1>
        </div>

        <div class="mb-32">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="block sm:flex justify-between items-center">

                        <div>
                            <h6>Sensor:</h6>
                            <select class="custom-select custom-select-sm" v-model="selected">
                                <option disabled value=""> -- </option>
                                <option>Humedad del ambiente</option>
                                <option>Humedad del suelo</option>
                                <option>Temperatura</option>
                            </select>
                        </div>


                        <div>
                            <h6>Desde:</h6>
                            <datepicker v-model="time1"  :first-day-of-week="1" lang="es"></datepicker>
                        </div>

                        <div>
                            <h6>Hasta:</h6>
                            <datepicker v-model="time2" :first-day-of-week="1" lang="es"></datepicker>
                        </div>

                        <a href="#" class="border border-grey px-8 py-2 rounded-full text-white font-bold text-xs bg-gradient-primary" @click="send">
                            Filtrar
                        </a>
                    </div>
                </div>
                <div class="card-body" v-if="dataTable.length > 0">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTablew" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Fecha</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody v-for="(item, index) in dataTable">
                            <tr>
                                <td>{{index+1}}</td>
                                <td>{{dateFormat(item.fecha)}}</td>
                                <td>{{item.valor}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vue2-datepicker'
    export default {
        name: "Reports",
        components: {
            Datepicker
        },
        data() {
            return {
                time1: '',
                time2: '',
                // custom lang
                lang: {
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
                    placeholder: {
                        date: 'Select Date',
                        dateRange: 'Select Date Range'
                    }
                },
                selected:'',
                dataTable: [],
                sensor: '',
                errorMessage: false,
            }
        },
        methods: {
            send: function () {


                if (!this.selected || !this.time1 || !this.time2) {
                    this.errorMessage = "Campos vacios, verifique que los campos hayan sido seleccionados.";
                    return;
                }



                var id = 0;
                if (this.selected === 'Humedad del ambiente') {
                   id = 1;

                } else if (this.selected === 'Humedad del suelo') {
                    id = 2;

                } else if (this.selected === 'Temperatura') {
                    id = 3;
                }

                var timeOne = new Date(this.time1);
                var timeTwo =new Date(this.time2);

                if (timeOne.getTime() >= timeTwo.getTime()) {
                    this.errorMessage = "La fecha fin no debe ser menor a la fecha inicio";
                    return;
                }

                let objeto = {};
                objeto.id = id;
                var inicio = new Date(this.time1);
                var day1 = inicio.getDate() < 10 ? "0"+inicio.getDate() : ""+inicio.getDate();
                var mes1 = inicio.getMonth()+1 < 10 ? ("0"+(inicio.getMonth()+1)) : ""+(inicio.getMonth()+1);
                objeto.start = ""+day1 + "/"+mes1 + "/" +inicio.getFullYear();

                var fin = new Date(this.time2);
                var day2 = fin.getDate() < 10 ? "0"+fin.getDate() : ""+fin.getDate();
                var mes2 = fin.getMonth()+1 < 10 ? ("0"+(fin.getMonth()+1)) : ""+(fin.getMonth()+1);
                objeto.end = ""+day2 + "/"+ mes2 + "/" +fin.getFullYear();

                let datos = JSON.stringify(objeto);

                //console.log('datos', datos);

                //http://192.168.43.2:8080/restapiv/dashboard
                axios({
                    method: 'post',
                    url: 'dashboard',
                    headers: { 'content-type': 'application/json' },
                    data: datos
                }).then(response => {

                    //console.log('dashboard respuesta',response);
                    if (this.selected === 'Humedad del ambiente') {
                        this.dataTable = response.data.arregloHumA;

                    } else if (this.selected === 'Humedad del suelo') {
                        this.dataTable = response.data.arregloHumS;

                    } else if (this.selected === 'Temperatura') {
                        this.dataTable = response.data.arregloTemp;
                    }
                });
            },
            dateFormat: function (fecha) {
                return new Date(fecha).toLocaleString()
            },
            closeMessage: function () {
                this.errorMessage = false
            }

        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }
        }
    }
</script>
