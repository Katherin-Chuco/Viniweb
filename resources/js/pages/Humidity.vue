<template>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Humedad del Ambiente</h1>
        </div>

        <div class="row">
            <div class="col-xl-10 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Diagrama de la Humedad del Ambiente en Porcentaje (%)</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <two :datatemp="humidityDataC" :max="maxHumidityC" :min="minHumidityC" :datatempx="climateHumidityDatax"></two>
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
        name: "Humidity",
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
              maxHumidityC: 6,
              minHumidityC: 0,

          }
        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            axios.get('medidas/humambiente')
                .then(response => {
                    // handle success
                    console.log(response);
                    var humOne = [];

                    for (var i = 0; i < response.data.humsAmbiente.length; i++) {
                        humOne.push(response.data.humsAmbiente[i].valor);
                        this.climateHumidityDatax.push(new Date(response.data.humsAmbiente[i].fecha).toLocaleString());
                    }

                    this.climateHumidityData = this.climateHumidityData.concat(humOne);
                    this.humidityDataC.push(this.climateHumidityData);
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

                this.maxHumidityC = response.data[1].valormin;
                this.minHumidityC = response.data[1].valormax;

            });

        }

    }
</script>
