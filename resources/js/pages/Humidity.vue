<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Humedad
        </h1>

        <div class="mb-10">
            <div class="flex justify-between items-center">
                <p>Medición de la humedad en tiempo real.</p>

            </div>

            <div class="block shadow flex items-center justify-center mb-6 bg-white" style="padding: 30px; margin-top: 10px">
                <two :data="humidityData" :max="maxHumidity"></two>
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
              climateHumidityData: ['Humedad del suelo'],
              groundHumidityData: ['Humedad del aire'],
              humidityData: [],
              maxHumidity: 0.3
          }
        },
        mounted() {

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('/prueba')
                .then(response => {
                    // handle success
                    console.log(response);
                    var humOne = response.data['arregloHumA'];
                    var humTwo = response.data['arregloHumS'];

                    this.climateHumidityData = this.climateHumidityData.concat(humOne);
                    this.groundHumidityData = this.groundHumidityData.concat(humTwo);
                    this.humidityData.push(this.climateHumidityData);
                    this.humidityData.push(this.groundHumidityData);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

        }

    }
</script>
