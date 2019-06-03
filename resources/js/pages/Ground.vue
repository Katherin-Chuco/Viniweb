<template>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Humedad del Suelo</h1>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Diagrama de la Humedad del Suelo en Porcentaje (%)</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <two :datatemp="humidityDataG" :max="maxHumidityG" :min="minHumidityG" :datatempx="groundHumidityDatax"></two>
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
        name: "Ground",
        components: {
            Two
        },
        data: function() {
            return {
                climateHumidityData: ['Humedad del ambiente'],
                groundHumidityData: ['Humedad del suelo'],
                humidityDataG: [],
                humidityDataC: [],
                climateHumidityDatax: [],
                groundHumidityDatax: [],
                maxHumidityG: 7000,
                minHumidityG: 6,

            }
        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('medidas/humsuelo')
                .then(response => {
                    // handle success
                    console.log("Humedad Suelo",response);
                    var humTwo = [];

                    for (var i = 0; i < response.data.humsSuelo.length; i++) {
                        humTwo.push(response.data.humsSuelo[i].valor);
                        this.groundHumidityDatax.push(new Date(response.data.humsSuelo[i].fecha).toLocaleString());
                    }

                    this.groundHumidityData = this.groundHumidityData.concat(humTwo);
                    this.humidityDataG.push(this.groundHumidityData);

                    this.maxHumidityG = response.data.maxHum;
                    this.minHumidityG = response.data.maxHum;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

            axios({
                method: 'get',
                url: 'defecto'
            }).then(response => {
                console.log('Defecto',response)

                this.maxHumidityG = response.data[2].valormin;
                this.maxHumidityG = response.data[2].valormax;

            });

        }

    }
</script>
