<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Configuraciones
        </h1>

        <div class="mb-10">
            <div class="card-header flex justify-between items-center">
                <p>Configura el valor maximo y minimo de tus mediciones: </p>

            </div>

            <div class="block shadow flex-row mb-6 bg-white" style="padding: 30px; margin-top: 10px; height: 500px">
                <form>
                    <div>
                        <h4>Humedad del ambiente:</h4>
                        <div>
                            <div class="pt-4 flex-col">
                                <label>Valor mínimo: </label>
                                <input type="text" class="ml-4 border-2"> %
                            </div>
                            <div class="pt-4 flex-col">
                                <label>Valor máximo:</label>
                                <input type="text" class="ml-4 border-2"> %
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4>Humedad del suelo:</h4>
                        <div>
                            <div class="pt-4 flex-col">
                                <label>Valor mínimo: </label>
                                <input type="text" class="ml-4 border-2"> %
                            </div>
                            <div class="pt-4 flex-col">
                                <label>Valor máximo:</label>
                                <input type="text" class="ml-4 border-2"> %
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4>Temperatura del ambiente:</h4>
                        <div>
                            <div class="pt-4 flex-col">
                                <label>Valor mínimo: </label>
                                <input type="text" class="ml-4 border-2"> ºC
                            </div>
                            <div class="pt-4 flex-col">
                                <label>Valor máximo:</label>
                                <input type="text" class="ml-4 border-2"> ºC
                            </div>
                        </div>
                    </div>
                    <div class="flex-col float-left mt-10 ">
                        <a href="#" class="border border-grey px-8 py-2 rounded-full text-white font-bold text-xs bg-blue-light" >
                            Resetear
                        </a>
                        <a href="#" class="border border-grey px-8 py-2 rounded-full text-white font-bold text-xs bg-blue-light ml-16" >
                            Guardar
                        </a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Configurations",
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
