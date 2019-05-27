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
                                <td>2011/04/25</td>
                                <td>80</td>
                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td>2011/07/25</td>
                                <td>75</td>
                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td>2009/01/12</td>
                                <td>86</td>
                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td>2012/03/29</td>
                                <td>43</td>
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
        mounted: function () {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            axios({
                method: 'get',
                url: '/prueba/reportes'
            }).then(response => {
                var dataPrueba = {
                    arregloHumS: [
                        {id:1,valor:0.30,fecha:"2019-04-29T15:47:47.000+0000"},
                        {id:2,valor:0.40,fecha:"2019-04-29T15:47:47.000+0000"},
                        {id:3,valor:0.20,fecha:"2019-04-29T15:47:47.000+0000"}
                    ]
                    ,arregloHumA:
                        [
                            {id:1,valor:0.70,fecha:"2019-04-29T15:47:04.000+0000"},
                            {id:2,valor:0.66,fecha:"2019-04-29T15:47:22.000+0000"},
                            {id:3,valor:0.72,fecha:"2019-04-29T15:47:22.000+0000"}
                        ],
                    arregloTemp:[
                        {id:1,valor:20.00,fecha:"2019-04-29T15:15:13.000+0000"},
                        {id:2,valor:30.00,fecha:"2019-04-29T15:15:23.000+0000"},
                        {id:3,valor:25.00,fecha:"2019-04-29T15:15:32.000+0000"}
                    ]
                };

                if (dataPrueba.arregloHumA && (dataPrueba.arregloHumA.length > 0) ) {
                    //for(var i = 0; i < dataPrueba.arregloHumA.length; i++) {}
                    this.dataTable.concat(dataPrueba.arregloHumA);

                } else if (dataPrueba.arregloHumS && (dataPrueba.arregloHumS.length > 0)) {
                    //for(var i = 0; i < dataPrueba.data.arregloHumS.length; i++) {}
                    this.dataTable.concat(dataPrueba.arregloHumS);

                } else if (dataPrueba.arregloTemp && (dataPrueba.arregloHumA.arregloTemp > 0)) {
                    //for(var i = 0; i < dataPrueba.data.arregloTemp.length; i++) {}
                    this.dataTable.concat(dataPrueba.arregloTemp);
                }

                console.log(response);
            });
        },
    }
</script>
