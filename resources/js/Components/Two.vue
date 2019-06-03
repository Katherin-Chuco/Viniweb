<template>
    <div id="chart" :datatemp="datatemp" :max="max" :min="min" :datatempx="datatempx"> {{now}} </div>
</template>

<script>

    import c3 from 'c3';

    export default {
        name: "Two",
        props: {
          datatemp: Array,
          datatempx: Array,
          max: Number,
            min: Number
        },
        computed: {
            now: function() {
                var chart = c3.generate({
                    bindto: '#chart',
                    data: {

                        columns: this.datatemp

                    },
                    axis:{
                        x: {
                            type: 'category',
                            categories: this.datatempx
                        }
                    },
                    grid: {
                        y: {
                            lines: [{value: this.max}, {value: this.min}]
                        }
                    }
                });
            }
        }
    }
</script>
