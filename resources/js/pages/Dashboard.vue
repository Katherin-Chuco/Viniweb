<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="font-normal text-3xl text-green-darkest leading-none mb-4">
                Dashboard
            </h1>
        </div>

        <div class="row">
            <card title="Temperatura (Celcius)" type="celcius" :value="temperature"></card>
            <card title="Humedad del clima" type="porcentaje" :value="climateHumidity"></card>
            <card title="Humedad del suelo" type="porcentaje" :value="groundHumidity"></card>
        </div>

        <div class="mb-10">
            <div class="flex justify-between items-center">
                <p>Medición de la temperatura y humedad en tiempo real.</p>
            </div>

            <div class="block shadow flex items-center justify-center mb-6 bg-white" style="padding: 30px; margin-top: 10px">
                <one :dataone="temperatureData" :datatwo="climateHumidityData" :datathree="groundHumidityData"></one>
            </div>
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
              climateHumidityData: ['Humedad del suelo'],
              groundHumidityData: ['Humedad del aire']

          }
        },
        mounted() {

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('/prueba')
                .then(response => {
                    // handle success
                    console.log(response);
                    var temp = response.data['arregloTemp'];
                    var humOne = response.data['arregloHumA'];
                    var humTwo = response.data['arregloHumS'];

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

