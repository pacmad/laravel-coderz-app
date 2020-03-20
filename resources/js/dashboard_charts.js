import Chart from 'chart.js'
import axios from 'axios'

const drpbtn = document.querySelector('.dropbtn');
const drpcnt = document.querySelector('.dropdown-content');

drpbtn.addEventListener('click', () => {
  drpcnt.classList.toggle('d-none');
})


function getParam(string) {
    var query = window.location.search;
    var searchParams = new URLSearchParams(query);
    return searchParams.get(string);
}


function getData(graph, time, solved, user = 0){
  if(user !==0){
    var params = {
      solved: solved,
      time: time,
      user: user
    }
  }else{
    var params = {
      solved: solved,
      time: time,
    }
  }
  axios.post('/api/graph', params)
    .then(function (response) {
      console.log(response);
      drawGraph(graph, response);
    })
    .catch(function (error) {
      console.log(error);
    })
}

function drawGraph(selector, data){
  var ctx = document.getElementById(selector);
  var myChart = new Chart(ctx, {
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
let param = getParam('query');
let param1 = getParam('user');
getData('myChart1', param, 'none')
getData('myChart2', param, 1)
getData('myChart3', param, 0)

getData('myChart4', param, 'none', param1)
getData('myChart5', param, 1, param1)
getData('myChart6', param, 0, param1)
