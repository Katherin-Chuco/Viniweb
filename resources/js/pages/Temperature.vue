<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Temperatura
        </h1>

        <div class="mb-10">
            <div class="flex justify-between items-center">
                <p>Medición de la temperatura en grados celcius (ºC) :</p>

            </div>

            <div class="block shadow flex items-center justify-center mb-6 bg-white" style="padding: 30px; margin-top: 10px">
                <two :datatemp="temperatureData" :max="maxTemperature" :datatempx="temperatureDataX"></two>
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
                maxTemperature: 350,
                temperature: ['Temperatura'],
                temperatureData: [],
                temperatureDataX: []

            }
        },
        mounted() {

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('http://192.168.43.2:8080/restapiv/medidas/temp')
                .then(response => {
                    // handle success
                    console.log(response);
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
                    console.log(error);
                });

        }
    }
</script>
