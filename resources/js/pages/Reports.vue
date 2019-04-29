<template>

    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Reportes
        </h1>

        <div class="mb-32">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="flex justify-between items-center">

                        <div>
                            <p class="pb-2">Sensor:</p>
                            <select class="custom-select custom-select-sm" v-model="selected">
                                <option disabled value=""> -- </option>
                                <option>Humedad del aire</option>
                                <option>Humedad del suelo</option>
                                <option>Temperatura</option>
                            </select>
                        </div>


                        <div>
                            <p class="pb-2">Desde:</p>
                            <datepicker v-model="time1"  :first-day-of-week="1" lang="es"></datepicker>
                        </div>

                        <div>
                            <p class="pb-2">Hasta:</p>
                            <datepicker v-model="time2" :first-day-of-week="1" lang="es"></datepicker>
                        </div>

                        <a href="#" class="border border-grey px-8 py-2 rounded-full text-black font-bold text-xs " @click="send">
                            Filtrar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                            </tr>
                            <tr>
                                <td>2012/03/29</td>
                                <td>$433,060</td>
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
                selected:''
            }
        },
        methods: {
            send: function () {
                console.log('desde: ', new Date(this.time1).toLocaleDateString('en-US'));
                console.log('hasta: ', new Date(this.time2));
                console.log('select: ',this.selected)
                var id = 0;
                if (this.selected === 'Humedad del aire') {
                   id = 1;

                } else if (this.selected === 'Humedad del suelo') {
                    id = 2;

                } else if (this.selected === 'Temperatura') {
                    id = 3;
                }

                axios({
                    method: 'get',
                    url: '/prueba/reportes',
                    data: {
                        id: id,
                        start: new Date(this.time1).toLocaleDateString('en-US'),
                        end: new Date(this.time2).toLocaleDateString('en-US')
                    }
                }).then(function (response) {
                    console.log(response);
                });
            }

    }
    }
</script>
