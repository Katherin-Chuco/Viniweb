<template>

    <div class="container-fluid">
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
                sensor: ''
            }
        },
        methods: {
            send: function () {

                var id = 0;
                if (this.selected === 'Humedad del ambiente') {
                   id = 1;

                } else if (this.selected === 'Humedad del suelo') {
                    id = 2;

                } else if (this.selected === 'Temperatura') {
                    id = 3;
                }

                let objeto = {};
                objeto.id = id;
                objeto.start = new Date(this.time1).toLocaleDateString('en-US');
                objeto.end = new Date(this.time2).toLocaleDateString('en-US');

                console.log(new Date(this.time2).toLocaleDateString('en-US'));
                let datos = JSON.stringify(objeto);

                //http://192.168.43.2:8080/restapiv/dashboard
                axios({
                    method: 'post',
                    url: 'dashboard',
                    headers: { 'content-type': 'application/json' },
                    data: datos
                }).then(response => {


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
            }

        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }
        }
    }
</script>
