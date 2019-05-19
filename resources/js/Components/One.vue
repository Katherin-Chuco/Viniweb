<template>
    <div id="uno" :dataone="dataone" :datatwo="datatwo" :datathree="datathree" :datatempx="datatempx" > {{now}}</div>
</template>

<script>
    import c3 from 'c3';
    import d3 from 'd3';

    export default {
        name: "One",
        props: {
            dataone: Array,
            datatwo: Array,
            datathree: Array,
            datatempx: Array
        },
        computed: {
            now: function() {
                var chart = c3.generate({
                    bindto: '#uno',
                    data: {
                        columns: [
                            this.dataone,
                            this.datatwo,
                            this.datathree
                        ],
                        axes: {
                            Temperatura: 'y2',

                        },
                        types: {
                            Temperatura: 'bar' // ADD
                        }
                    },
                    axis: {
                        y: {
                            label: {
                                text: '%',
                                position: 'outer-middle'
                            }
                        },
                        y2: {
                            show: true,
                            label: {
                                text: 'ºC',
                                position: 'outer-middle'
                            }
                        },
                        x: {
                            type: 'category',
                            categories: this.datatempx
                        }
                    }
                });
            }
        }
    }
</script>
