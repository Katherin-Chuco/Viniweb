<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Temperatura
        </h1>

        <div class="mb-10">
            <div class="flex justify-between items-center">
                <p>Medición de la temperatura en tiempo real.</p>

                <a href="#" class="border border-grey px-8 py-2 rounded-full text-black font-bold text-xs" >
                    Filtrar
                </a>

            </div>

            <div class="block shadow flex items-center justify-center mb-6 bg-white" style="padding: 30px; margin-top: 10px">
                <two :data="temperatureData" :max="maxTemperature"></two>
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

            }
        },
        mounted() {

            //axios.get('http://192.168.43.2:8080/restapiv/medidas')
            axios.get('/prueba')
                .then(response => {
                    // handle success
                    console.log(response);
                    var temp = response.data['arregloTemp'];

                    this.temperatureData.push(this.temperature.concat(temp));
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

        }
    }
</script>
