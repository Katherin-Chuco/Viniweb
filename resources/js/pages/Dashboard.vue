<template>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">
            <card title="Temperatura (Celcius)" type="celcius" :value="temperature" :hour="hourT" :date="dateT"></card>
            <card title="Humedad del clima" type="porcentaje" :value="climateHumidity " :hour="hourC" :date="dateC"></card>
            <card title="Humedad del suelo" type="porcentaje" :value="groundHumidity" :hour="hourG" :date="dateG"></card>
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
              temperature: 24,
              climateHumidity: 34,
              groundHumidity: 34,
              temperatureData: ['Temperatura'],
              climateHumidityData: ['Humedad del ambiente'],
              groundHumidityData: ['Humedad del suelo'],
              chartx: [],
              hourT: '',
              dateT: '',
              hourC: '',
              dateC: '',
              hourG: '',
              dateG: ''

          }
        },
        mounted() {

            //console.log(FORCE_SESSION);
            if (this.$root.token === "") {
                this.$router.push({ name: 'Login'});
            }

            let objeto = {};
            objeto.id = 1;

            objeto.start = "30/04/2019";

            var fin = new Date(this.time2);
            //objeto.end = ""+fin.getDate() + "/"+(fin.getMonth()+1) + "/" +fin.getFullYear();
            objeto.end= "08/12/2019";

            let datos = JSON.stringify(objeto);

            //console.log('datos', datos);

            axios({
                method: 'post',
                url: 'dashboard',
                headers: { 'content-type': 'application/json' },
                data: datos
            }).then(response => {
                    // handle success
                    //console.log(response);
                    var temp = [];
                    var dateTem = [];
                    var dateCli = [];
                    var dateGro = [];
                    var humOne = [];
                    var humTwo = [];

                    for(var i = 0; i < response.data.arregloTemp.length; i++) {
                        temp.push(response.data.arregloTemp[i].valor);
                        dateTem.push(response.data.arregloTemp[i].fecha);
                        this.chartx.push(new Date(response.data.arregloTemp[i].fecha).toLocaleString())
                    }

                    for(var i = 0; i < response.data.arregloHumS.length; i++) {
                        humTwo.push(response.data.arregloHumS[i].valor);
                        dateCli.push(response.data.arregloHumS[i].fecha);
                    }

                    for(var i = 0; i < response.data.arregloHumA.length; i++) {
                        humOne.push(response.data.arregloHumA[i].valor);
                        dateGro.push(response.data.arregloHumA[i].fecha);

                    }

                    this.temperatureData = this.temperatureData.concat(temp);
                    this.climateHumidityData = this.climateHumidityData.concat(humOne);
                    this.groundHumidityData = this.groundHumidityData.concat(humTwo);
                    this.temperature = temp[temp.length - 1];
                    this.dateT = new Date(dateTem[dateTem.length -1]).toLocaleString();

                    this.climateHumidity = humOne[humOne.length -1];
                    this.dateC = new Date(dateCli[dateCli.length - 1]).toLocaleString();

                    this.groundHumidity = humTwo[humTwo.length - 1];
                    this.dateG = new Date(dateGro[dateGro.length -1]).toLocaleString();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error.response);
                });

        }
    }

</script>

