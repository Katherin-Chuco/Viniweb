<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Alertas
        </h1>

        <div class="mb-32">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <h5>Alertas recientes:</h5>
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
        mounted: function () {
            axios({
                method: 'get',
                url: '/prueba/reportes'
            }).then(function (response) {
                console.log(response);
            });
        },
    }
</script>
