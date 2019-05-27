<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">
            <card title="Temperatura (Celcius)" type="celcius" :value="temperature"></card>
            <card title="Humedad del clima" type="porcentaje" :value="climateHumidity"></card>
            <card title="Humedad del suelo" type="porcentaje" :value="groundHumidity"></card>
        </div>


    </div>


</template>

<script>
    import One from '../Components/One';
    import Card from '../Components/Card';

    export default {
        name: "Dashboard",
        components: {
            One,
            Card
        },
        data () {
          return {
              temperature: 35,
              climateHumidity: 75,
              groundHumidity: 65,
              temperatureData: ['Temperatura'],
              climateHumidityData: ['Humedad del ambiente'],
              groundHumidityData: ['Humedad del suelo'],
              chartx: [],

          }
        },
        mounted() {

            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            axios({
                method: 'post',
                url: 'dashboard',
                headers: { 'content-type': 'application/json' },
                data: {}
            }).then(response => {
                    // handle success
                    console.log(response);
                    var temp = [];
                    var humOne = [];
                    var humTwo = [];

                    for(var i = 0; i < response.data.arregloTemp.length; i++) {
                        temp.push(response.data.arregloTemp[i].valor);
                        this.chartx.push(new Date(response.data.arregloTemp[i].fecha).toLocaleString())
                    }

                    for(var i = 0; i < response.data.arregloHumS.length; i++) {
                        humTwo.push(response.data.arregloHumS[i].valor);
                    }

                    for(var i = 0; i < response.data.arregloHumA.length; i++) {
                        humOne.push(response.data.arregloHumA[i].valor);
                    }

                    this.temperatureData = this.temperatureData.concat(temp);
                    this.climateHumidityData = this.climateHumidityData.concat(humOne);
                    this.groundHumidityData = this.groundHumidityData.concat(humTwo);
                    this.temperature = temp[temp.length - 1];
                    this.climateHumidity = humOne[humOne.length -1];
                    this.groundHumidity = humTwo[humTwo.length - 1];
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

        }
    }

</script>

