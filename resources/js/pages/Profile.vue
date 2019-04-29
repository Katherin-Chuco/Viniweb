<template>
    <div>
        <h1 class="font-normal text-3xl text-green-darkest leading-none mb-8">
            Perfil
        </h1>

        <div class="mb-10">
            <div class="card-header flex justify-between items-center">
                <p>Configura tu correo electronico: </p>

            </div>

            <div class="block shadow flex-row mb-6 bg-white" style="padding: 30px; margin-top: 10px; height: 500px">
                <form>
                    <div>
                        <h4>Mis datos:</h4>
                        <div>
                            <div class="pt-4 flex-col">
                                <label>Correo electrónico:</label>
                                <input type="text" class="ml-4 border-2">
                            </div>
                        </div>
                    </div>

                    <div class="flex-col float-left mt-10 ">
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
        name: "Profile"
    }
</script>

<style scoped>

</style>