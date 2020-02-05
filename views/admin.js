//ajax
function ajaxCallAsynch(service_id) {
  // console.dir(myForm);
  console.log('myForm');
  // var buttonService = lol;
  // var service_id = lol.dataset.service;
  console.log(service_id);
  var formData = new FormData();
  if (service_id === undefined) {
    console.log("coucou ajax default ", service_id);
    // var id = service_id;
  }
  else {
    console.log("coucou ajax SPECIFIK");
    var id = service_id;
  }


  // `/admin/show/${service_id}`
  fetch(`/admin/ajax/${id}`).then(function (response) {

    console.dir(response);
    return response.json();

  }).then(function (data) {
    console.log("data : ", data);

    let jsonDataJours = data['data1'];
    console.log("jsonDataJours : ", jsonDataJours);
    let jsonDataMois = data['dataMois'];
    console.log("jsonDataMois : ", jsonDataMois);

    //génère jour du mois en cours a partir des jours reçu par php
    let jourArray = [];
    let jsonDataJoursLen = Object.keys(jsonDataJours['labels']).length;
    for (let i = 1; i <= jsonDataJoursLen; i++) {
      if (i < 10) {
        jourArray.push("0" + i);
      }
      else {
        jourArray.push(i);
      }
      // console.log("element : ", i);
      // jourArray.push(element);

    }
    console.log("jourArray : ", jourArray);

    // startChart(jourArray, jsonDataJours);
    //chart ( mois )
    var chart = document.getElementById('myChart');
    var myChart = new Chart(chart, {
      type: 'bar',
      data: {
        labels: jsonDataMois['data']['labels'],
        datasets: [{
          label: "Lost",
          fill: false,
          lineTension: 0,
          data: jsonDataMois['data']['datasets'][0]['data'],
          pointBorderColor: "#4bc0c0",
          borderColor: '#4bc0c0',
          borderWidth: 2,
          showLine: true,
        }, {
          label: "Succes",
          fill: false,
          lineTension: 0,
          startAngle: 2,
          data: jsonDataMois['data']['datasets'][1]['data'],
          // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
          backgroundColor: "transparent",
          pointBorderColor: "#ff6384",
          borderColor: '#ff6384',
          borderWidth: 2,
          showLine: true,
        }, {
          label: "Succes",
          fill: false,
          lineTension: 0,
          startAngle: 2,
          data: jsonDataMois['data']['datasets'][2]['data'],
          // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
          backgroundColor: "transparent",
          pointBorderColor: "#ffcd56",
          borderColor: '#ffcd56',
          borderWidth: 2,
          showLine: true,
        }]
      },
    });

    


    // //  Chart ( jours )
    var Chart2 = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(Chart2, {
      type: 'line',
      data: {
        labels: jourArray,
        datasets: [{
          label: "Stressé",
          backgroundColor: jsonDataJours['datasets'][0]['backgroundColor'],
          borderColor: jsonDataJours['datasets'][0]['borderColor'],
          borderWidth: jsonDataJours['datasets'][0]['borderWidth'],
          pointBorderColor: jsonDataJours['datasets'][0]['pointBorderColor'],
          data: jsonDataJours['datasets'][0]['data'],
          fill: jsonDataJours['datasets'][0]['fill'],
          lineTension: jsonDataJours['datasets'][0]['lineTension'],
        }, {
          label: "Heureux",
          fill: false,
          lineTension: .4,
          startAngle: 2,
          data: jsonDataJours['datasets'][1]['data'],
          // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
          backgroundColor: "transparent",
          pointBorderColor: "#4bc0c0",
          borderColor: '#4bc0c0',
          borderWidth: 2,
          showLine: true,
        }, {
          label: "Fatigué",
          fill: false,
          lineTension: .4,
          startAngle: 2,
          data: jsonDataJours['datasets'][2]['data'],
          // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
          backgroundColor: "transparent",
          pointBorderColor: "#ffcd56",
          borderColor: '#ffcd56',
          borderWidth: 2,
          showLine: true,
        }]
      },

      // Configuration options
      options: {
        title: {
          display: false
        }
      }
    });



  });


}


var buttonService1 = document.querySelector('.comptabutton');
var buttonService2 = document.querySelector('.juributton');
var buttonService3 = document.querySelector('.secretbutton');
var buttonService4 = document.querySelector('.logibutton');

console.log(buttonService1.dataset['service'], buttonService2.dataset['service'], buttonService3.dataset['service'], buttonService4.dataset['service'])

// buttonService.addEventListener("click", function (event) {
//     // event.preventDefault();

//     ajaxCallAsynch(event);


// });

//au chargement de la page, charger l' ajax pour afficher au moins des infos par defaut
window.addEventListener('load', () => {
  ajaxCallAsynch();
  // console.log("jsonDataJours : ", jsonDataJours);
});
//END AJAX!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// console.log("jsonDataJours : ", jsonDataJours);
//END AJAX!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//END AJAX!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$(function () {

  'use strict';

  (function () {

    var aside = $('.side-nav'),

      showAsideBtn = $('.show-side-btn'),

      contents = $('#contents');

    showAsideBtn.on("click", function () {

      $("#" + $(this).data('show')).toggleClass('show-side-nav');

      contents.toggleClass('margin');

    });

    if ($(window).width() <= 767) {

      aside.addClass('show-side-nav');

    }
    $(window).on('resize', function () {

      if ($(window).width() > 767) {

        aside.removeClass('show-side-nav');

      }

    });

    // dropdown menu in the side nav
    var slideNavDropdown = $('.side-nav-dropdown');

    $('.side-nav .categories li').on('click', function () {

      $(this).toggleClass('opend').siblings().removeClass('opend');

      if ($(this).hasClass('opend')) {

        $(this).find('.side-nav-dropdown').slideToggle('fast');

        $(this).siblings().find('.side-nav-dropdown').slideUp('fast');

      } else {

        $(this).find('.side-nav-dropdown').slideUp('fast');

      }

    });

    $('.side-nav .close-aside').on('click', function () {

      $('#' + $(this).data('close')).addClass('show-side-nav');

      contents.removeClass('margin');

    });

  }());

  //ligne 247 à 259 change disposition du graphique jour et mois
  // var chart = document.getElementById('myChart');
  Chart.defaults.global.animation.duration = 2000; // Animation duration
  Chart.defaults.global.title.display = false; // Remove title
  Chart.defaults.global.title.text = "Chart"; // Title
  Chart.defaults.global.title.position = 'bottom'; // Title position
  Chart.defaults.global.defaultFontColor = '#999'; // Font color
  Chart.defaults.global.defaultFontSize = 10; // Font size for every label

  // Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
  Chart.defaults.global.tooltips.borderColor = 'white'; // Tooltips border color
  Chart.defaults.global.legend.labels.padding = 0;
  Chart.defaults.scale.ticks.beginAtZero = true;
  Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255, 255, 255, 0.1)';
  Chart.defaults.scale.gridLines.color = 'rgba(255, 255, 255, 0.02)';
  Chart.defaults.global.legend.display = false;


  // Start chart
  // function startChart(jourArray, jsonDataJours) {
  //   var chart = document.getElementById('myChart');
  //   Chart.defaults.global.animation.duration = 2000; // Animation duration
  //   Chart.defaults.global.title.display = false; // Remove title
  //   Chart.defaults.global.title.text = "Chart"; // Title
  //   Chart.defaults.global.title.position = 'bottom'; // Title position
  //   Chart.defaults.global.defaultFontColor = '#999'; // Font color
  //   Chart.defaults.global.defaultFontSize = 10; // Font size for every label

  //   // Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
  //   Chart.defaults.global.tooltips.borderColor = 'white'; // Tooltips border color
  //   Chart.defaults.global.legend.labels.padding = 0;
  //   Chart.defaults.scale.ticks.beginAtZero = true;
  //   Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255, 255, 255, 0.1)';
  //   Chart.defaults.scale.gridLines.color = 'rgba(255, 255, 255, 0.02)';

  //   //chart ( mois )
  //   var myChart = new Chart(chart, {
  //     type: 'bar',
  //     data: {
  //       labels: ["Service7", "Service8", "Service9", "Service6"],
  //       datasets: [{
  //         label: "Lost",
  //         fill: false,
  //         lineTension: 0,
  //         data: [55, 55, 40, 20, 15, 20],
  //         pointBorderColor: "#4bc0c0",
  //         borderColor: '#4bc0c0',
  //         borderWidth: 2,
  //         showLine: true,
  //       }, {
  //         label: "Succes",
  //         fill: false,
  //         lineTension: 0,
  //         startAngle: 2,
  //         data: [20, 40, 20, 45, 25, 60],
  //         // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
  //         backgroundColor: "transparent",
  //         pointBorderColor: "#ff6384",
  //         borderColor: '#ff6384',
  //         borderWidth: 2,
  //         showLine: true,
  //       }, {
  //         label: "Succes",
  //         fill: false,
  //         lineTension: 0,
  //         startAngle: 2,
  //         data: [30, 40, 20, 60, 10, 45],
  //         // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
  //         backgroundColor: "transparent",
  //         pointBorderColor: "#ffcd56",
  //         borderColor: '#ffcd56',
  //         borderWidth: 2,
  //         showLine: true,
  //       }]
  //     },
  //   });


  //   //  Chart ( jours )
  //   var Chart2 = document.getElementById('myChart2').getContext('2d');
  //   var chart = new Chart(Chart2, {
  //     type: 'line',
  //     data: {
  //       labels: jourArray,
  //       datasets: [{
  //         label: jsonDataJours['datasets'][0]['label'],
  //         backgroundColor: jsonDataJours['datasets'][0]['backgroundColor'],
  //         borderColor: jsonDataJours['datasets'][0]['borderColor'],
  //         borderWidth: jsonDataJours['datasets'][0]['borderWidth'],
  //         pointBorderColor: jsonDataJours['datasets'][0]['pointBorderColor'],
  //         data: jsonDataJours['datasets'][0]['data'],
  //         fill: jsonDataJours['datasets'][0]['fill'],
  //         lineTension: jsonDataJours['datasets'][0]['lineTension'],
  //       }, {
  //         label: "Month",
  //         fill: false,
  //         lineTension: .4,
  //         startAngle: 2,
  //         data: jsonDataJours['datasets'][1]['data'],
  //         // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
  //         backgroundColor: "transparent",
  //         pointBorderColor: "#4bc0c0",
  //         borderColor: '#4bc0c0',
  //         borderWidth: 2,
  //         showLine: true,
  //       }, {
  //         label: "Month",
  //         fill: false,
  //         lineTension: .4,
  //         startAngle: 2,
  //         data: jsonDataJours['datasets'][2]['data'],
  //         // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
  //         backgroundColor: "transparent",
  //         pointBorderColor: "#ffcd56",
  //         borderColor: '#ffcd56',
  //         borderWidth: 2,
  //         showLine: true,
  //       }]
  //     },

  //     // Configuration options
  //     options: {
  //       title: {
  //         display: false
  //       }
  //     }
  //   });

    



  //   console.log(Chart.defaults.global);

  //   var chart = document.getElementById('chart3');
  //   var myChart = new Chart(chart, {
  //     type: 'line',
  //     data: {
  //       labels: ["One", "Two", "Three", "Four", "Five", 'Six', "Seven", "Eight"],
  //       datasets: [{
  //         label: "Lost",
  //         fill: false,
  //         lineTension: .5,
  //         pointBorderColor: "transparent",
  //         pointColor: "white",
  //         borderColor: '#d9534f',
  //         borderWidth: 0,
  //         showLine: true,
  //         data: [0, 40, 10, 30, 10, 20, 15, 20],
  //         pointBackgroundColor: 'transparent',
  //       }, {
  //         label: "Lost",
  //         fill: false,
  //         lineTension: .5,
  //         pointColor: "white",
  //         borderColor: '#5cb85c',
  //         borderWidth: 0,
  //         showLine: true,
  //         data: [40, 0, 20, 10, 25, 15, 30, 0],
  //         pointBackgroundColor: 'transparent',
  //       },
  //       {
  //         label: "Lost",
  //         fill: false,
  //         lineTension: .5,
  //         pointColor: "white",
  //         borderColor: '#f0ad4e',
  //         borderWidth: 0,
  //         showLine: true,
  //         data: [10, 40, 20, 5, 35, 15, 35, 0],
  //         pointBackgroundColor: 'transparent',
  //       },
  //       {
  //         label: "Lost",
  //         fill: false,
  //         lineTension: .5,
  //         pointColor: "white",
  //         borderColor: '#337ab7',
  //         borderWidth: 0,
  //         showLine: true,
  //         data: [0, 30, 10, 25, 10, 40, 20, 0],
  //         pointBackgroundColor: 'transparent',
  //       }]
  //     },
  //   });
  // };


});


var nomjour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi ", "Dimanche"];
var months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];
var data = document.querySelector('.datetime');
window.addEventListener('load', function () {
  data.innerText = date;

})
var today = new Date();
var dayindex = today.getDay();
var monthsindex = today.getMonth();
var date = nomjour[dayindex - 1] + ' ' + today.getDate() + ' ' + months[monthsindex] + ' ' + today.getFullYear();
