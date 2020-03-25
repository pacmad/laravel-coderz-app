<template>
  <div class="row justify-content-center bg-color pt-4">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-unstyled d-flex justify-content-end">
                <li class="rounded-pill c-pointer bg-danger px-2 py-1 mr-1 text-decoration-none text-white" @click="setTime('lastday')">Ultime 24 ore</li>
                <li class="rounded-pill c-pointer bg-danger px-2 py-1 mr-1 text-decoration-none text-white" @click="setTime('lastweek')">Ultima settimana</li>
                <li class="rounded-pill c-pointer bg-danger px-2 py-1 mr-1 text-decoration-none text-white" @click="setTime('lastmonth')">Ultimo mese</li>
                <li class="rounded-pill c-pointer bg-danger px-2 py-1 mr-1 text-decoration-none text-white" @click="setTime('always')">Sempre</li>
            </ul>
          </div>
        </div>
          <div class="row">
              <div class="col-md-10 text-white">
                  <h3>Statistiche Totali</h3>
              </div>
          </div>
          <div class="row justify-content-between mt-4 text-white">
              <div class="col-md-3">
                  <graph user="0" title="Ticket totali" solved="none" :time="time" graph="myChart1"></graph>
              </div>
              <div class="col-md-3">
                  <graph user="0" title="Ticket risolti" solved="1" :time="time" graph="myChart2"></graph>
              </div>
              <div class="col-md-3">
                  <graph user="0" title="Ticket da risolvere" solved="0" :time="time" graph="myChart3"></graph>
              </div>
          </div>

          <div class="row mt-4">
              <div class="col-md-10 text-white">
                  <h3>Statistiche Personali</h3>
              </div>
          </div>
          <div class="row justify-content-between mt-4 text-white">
              <div class="col-md-3">
                <graph user="1" title="Ticket totali" solved="none" :time="time" graph="myChart4"></graph>
              </div>
              <div class="col-md-3">
                <graph user="1" title="Ticket risolti" solved="1" :time="time" graph="myChart5"></graph>
              </div>
              <div class="col-md-3">
                <graph user="1" title="Ticket da risolvere" solved="0" :time="time" graph="myChart6"></graph>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {

      data(){
        return{
          time: 'always'
        }

      },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          setTime(val){
            this.time = val;
            this.$root.$emit('update', this.time);
          }
        }
    }
</script>
