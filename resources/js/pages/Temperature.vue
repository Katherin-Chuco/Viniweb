<template>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Temperatura</h1>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Diagrama de la Temperatura en Grados Celcius (ºC)</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <two :datatemp="temperatureData" :max="maxTemperature" :min="minTemperature" :datatempx="temperatureDataX"></two>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Two from '../Components/Two';

    export default {
        name: "Temperature",
        components: {Two},
        data () {
            return {
                maxTemperature: 25,
                minTemperature: 0,
                temperature: ['Temperatura'],
                temperatureData: [],
                temperatureDataX: []

            }
        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('medidas/temp')
                .then(response => {
                    // handle success
                    console.log("temperatura",response);

                    var temp = [];
                    var tempx = [];

                    for (var i = 0; i < response.data.temperaturas.length; i++) {
                        temp.push(response.data.temperaturas[i].valor);
                        tempx.push(new Date(response.data.temperaturas[i].fecha).toLocaleString());
                    }

                    this.temperatureData.push(this.temperature.concat(temp));
                    this.temperatureDataX = tempx;
                })
                .catch(function (error) {
                    // handle error
                    //console.log(error);
                });

            axios({
                method: 'get',
                url: 'defecto'

            }).then(response => {

                this.minTemperature = response.data[0].valormin;
                this.maxTemperature = response.data[0].valormax;

            });
        }
    }
</script>
