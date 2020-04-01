<template>
<div class="row justify-content-center bg-color pt-4">
    <div class="col-md-10">
        <div class="row mt-4">
            <div class="col-md-10 text-white">
                <h3>Lavorazione tickets</h3>
            </div>
        </div>
        <div v-if="table" class="row">
            <table class="table table-striped bg-color1 shadow-lg text-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Topic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ticket, index) in tickets.data">
                        <th @click="viewTicket(index)" scope="row">{{ ticket.id }}</th>
                        <td>{{ ticket.title }}</td>
                        <td>{{ ticket.topic.name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row text-white" v-else>
          <div class="col-md-12">
            <p @click="table = true">Back</p>
            <h6>Descrizione:</h6>
            <p>{{ ticket.body }}</p>
          </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
            tickets: [],
            table: true,
            ticket: {}
        }
    },
    mounted() {
        axios.get('api/tickets/user/1')
            .then(res => {
                this.tickets = res;
                console.log(this.tickets);
            })
            .catch(err => {
                console.log(err);
            })
    },
    methods: {
        viewTicket(index) {
            this.ticket = this.tickets.data[index];
            this.table = false;
        }
    }
}
</script>

<style lang="css" scoped>
</style>
