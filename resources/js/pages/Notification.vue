<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alertas</h1>
        </div>

        <div class="mb-32">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Alertas recientes:</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sensor</th>
                                <th>Fecha</th>
                                <th>valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Temperatura</td>
                                <td>2019/04/25</td>
                                <td>35ºC</td>
                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td>2019/04/25</td>
                                <td>40ºC</td>
                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td>2019/05/12</td>
                                <td>38ºC</td>
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
    export default {
        name: "Notification",

        data: function() {
            return {
                alertTable: []
            }
        },
        methods: {
            dateFormat: function (fecha) {
                return new Date(fecha).toLocaleString()
            },
        },
        mounted: function () {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

           // axios({
           //     method: 'get',
           //     url: '/prueba/reportes'
           // }).then(response => {
                var dataPrueba = {
                    arregloHumS: [
                        {id:1,valor:0.30,fecha:"2019-04-29 3:47 p.m."},
                        {id:2,valor:0.40,fecha:"2019-04-30 10:00 a.m."},
                        {id:3,valor:0.20,fecha:"2019-05-15 1:15 p.m."}
                    ]
                    ,arregloHumA:
                        [
                            {id:1,valor:0.70,fecha:"2019-05-10 3:20 a.m."},
                            {id:2,valor:0.66,fecha:"2019-05-15 4:44 p.m."},
                            {id:3,valor:0.72,fecha:"2019-05-23 8:00 p.m."}
                        ],
                    arregloTemp:[
                        {id:1,valor:20.00,fecha:"2019-04-20 5:00 p.m."},
                        {id:2,valor:30.00,fecha:"2019-05-14 9:00 p.m."},
                        {id:3,valor:25.00,fecha:"2019-05-19 5:00 p.m."}
                    ]
                };

                if (dataPrueba.arregloHumA && (dataPrueba.arregloHumA.length > 0) ) {
                    //for(var i = 0; i < dataPrueba.arregloHumA.length; i++) {}
                    this.alertTable.concat(dataPrueba.arregloHumA);

                } else if (dataPrueba.arregloHumS && (dataPrueba.arregloHumS.length > 0)) {
                    //for(var i = 0; i < dataPrueba.data.arregloHumS.length; i++) {}
                    this.alertTable.concat(dataPrueba.arregloHumS);

                } else if (dataPrueba.arregloTemp && (dataPrueba.arregloHumA.arregloTemp > 0)) {
                    //for(var i = 0; i < dataPrueba.data.arregloTemp.length; i++) {}
                    this.alertTable.concat(dataPrueba.arregloTemp);
                }

          //  });
        },
    }
</script>
