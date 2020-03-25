<template>
<div class="bg-color1 shadow-sm p-2 text-center rounded shadow-lg">
    <p class="text-right m-0 pr-1">{{ title }}</p>
    <h5 class="text-right pr-1">{{ totalTkt }}</h5>
    <div v-show="setVisible">
        <canvas :id="graph" width="400" height="300"></canvas>
    </div>
</div>
</template>

<script>
export default {

    props: ['solved', 'time', 'graph', 'title', 'user'],

    data() {
        return {
            inputUser: this.user,
            inputTime: this.time,
            totalTkt: 0
        }
    },
    mounted() {
        this.getData();
        this.$root.$on('update', (value) => {
            this.inputTime = value;
            this.getData();
        });
    },
    computed: {
        setVisible() {
            return this.totalTkt > 0;
        }
    },
    methods: {
        getData() {
            if (this.inputUser !== "0") {
                var params = {
                    solved: this.solved,
                    time: this.inputTime,
                    user: this.inputUser
                }
            } else {
                var params = {
                    solved: this.solved,
                    time: this.inputTime,
                }
            }
            axios.post('/api/graph', params)
                .then((response) => {
                    console.log(response);
                    if (response.data.numbers !== undefined) {
                        this.totalTkt = response.data.numbers.reduce((tot, curr) => {
                            return tot += curr;
                        })
                    }else{
                      this.totalTkt = 0;
                    }
                    this.drawGraph(response);
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        drawGraph(data) {
            const myChart = new Chart(this.graph, {
                type: 'bar',
                data: {
                    labels: data.data.topics,
                    datasets: [{
                        label: '# of Tickets',
                        data: data.data.numbers,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

}
</script>

<style lang="css" scoped>
</style>
