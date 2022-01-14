var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: crop_name,
    datasets: [{
      label: 'CROPS',
      data: crop_value,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(0, 99, 132, 0.5)',
        'rgba(54, 1, 235, 0.2)',
        'rgba(255, 106, 2, 0.2)',
        'rgba(000, 255, 2, 0.2)',
         'rgba(25, 150, 102, 0.5)',
       
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        
      ],
      borderWidth: 1
    }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: false,

  }
});

new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      datasets: [{ 
          data: [86,114,106,106,107,111,133,221,783,2478,1234,1234],
          label: "Graphique de l'évolution des collectes",
          borderColor: "#3e95cd",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: ''
      }
    }
  });


  
  new Chart(document.getElementById("histogram"), {
    type: 'bar',
    data: {
      labels: zone_name,
      datasets: [{
        label: 'ZONES',
        //data: [12, 19, 3,15,12,17,18],
        data: zone_value,
       
        borderWidth: 1
      }]
    },
    options: {
       //cutoutPercentage: 40,
      responsive: false,
  
    }
  });
  