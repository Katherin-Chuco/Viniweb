<template>
    <div id="chart" :data="data" :max="max"> {{now}} </div>
</template>

<script>

    import c3 from 'c3';

    export default {
        name: "Two",
        props: {
          data: Array,
          max: Number
        },
        computed: {
            now: function() {
                var chart = c3.generate({
                    bindto: '#chart',
                    data: {

                        columns: this.data

                    },
                    grid: {
                        y: {
                            lines: [{value:this.max}]
                        }
                    }
                });
            }
        }
    }
</script>
