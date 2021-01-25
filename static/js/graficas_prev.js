/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $, window */
    var config = {
      type: 'line',
      data: {
        labels: ['0','1','2','3','4','5','6','7','8','9','10','11',['12'],'13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'],
        datasets: [
        // {
        //   index: 1,
        //   label: 'Actual',
        //   borderColor: "#0283E6",
        //   backgroundColor: "#0283E6",
        //   data: [{x:'0',y:2},{x:'20',y:12}],
        //   fill: false,
        //   lineTension: 0,
        //   lineWidth: 20,
        //   // borderDash: [5, 5],
        //   pointRadius: 4,
        //   pointHitRadius: 10,
        // },
        {
          index: 2,
          label: 'Min',
          borderColor: "#000",
          backgroundColor: "#62E927",
          data: ['2.5','2.9','3.4','4.0','4.6','5.2','5.75','6.35','6.8','7.2','7.6','7.9','8.1','8.3','8.5','8.65','8.8','9.0','9.15','9.30','9.45','9.60','9.7','9.85','10.0','10.12','10.25','10.40','10.56','10.68','10.8','10.92','11.07','11.22','11.38','11.52','11.52','11.52','11.64','11.75','11.86','12.0','12.15','12.26','12.39','12.5','12.65','12.76','12.88','13.02','13.20','13.34','13.45','13.55','13.68','13.82','13.98','14.1','14.25','14.4','14.5'],
          fill: false,
          lineWidth: 10,
          pointRadius: 0,
          pointHoverRadius: 0,
          pointHitRadius: 10,
        }, {
          index: 3,
          label: 'Max',
          borderColor: "#000",
          backgroundColor: "rgb(100,233,39,0.25)",
          data: ['4','5','5.9','6.8','7.5','8.2','8.8','9.35','9.8','10.25','10.6','10.95','11.3','11.55','11.75','12.0','12.25','12.5','12.74','12.95','13.2','13.40','13.59','13.77','14.0','14.17','14.34','14.52','14.72','14.9','15.1','15.3','15.5','15.68','15.83','16.05','16.25','16.45','16.75','17.0','17.2','17.4','17.55','17.75','18.0','18.20','18.45','18.67','18.75','18.97','19.15','19.34','19.51','19.75','19.96','20.14','20.35','20.53','20.75','20.97','21.14'],
          fill: "-1",
          yAxisID: 'y-axis-1',
          lineWidth: 10,
          pointRadius: 0,
          pointHoverRadius: 0,
          pointHitRadius: 10,
        }
        ]
      },
      options: {
        responsive: false,
        // pointLabelFontSize : 5,
        title: {
          display: false,
          text: 'Peso Para la Edad'
        },
        tooltips: {
            mode: 'point',
            intersect: true
          },
        // hover: {
        //     mode: 'point',
        //     intersect: true
        //   },
        legend: {
          display: false,
        },
        elements: {
            point: {
              pointStyle: 'circle',
              // borderWidth: 0.1,
              hitRadius: 10,
            },
            line: {
              tension: 0.5,
              borderWidth: 3
            },
        },
        scales: {
          xAxes: [{
            scaleLabel: {
              labelMinWidth: 50,
              display: true,
              labelString: 'EDAD EN MESES',

            },
            ticks:{
              padding: 0,
              labelOffset: 0,
              min: 0,
              max: 30,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 0 ? dataLabel : '';
              }
            }
          }],
          yAxes: [{
            stacked: false,
            position: 'left',
            scaleLabel: {
              display: true,
              labelString: 'KILOGRAMOS'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 0,
              max: 22,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 22 ? dataLabel : '';
              }
            }
          },
          {
             stacked: false,
              position: 'right',
            scaleLabel: {
              display: true,
              labelString: 'KILOGRAMOS'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 0,
              max: 22,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 22 ? dataLabel : '';
              }
            }
            }
          ]
        }
      }
    };

    var config2 = {
      type: 'line',
      data: {
        labels: ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'],
        datasets: [{
          label: '-2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [46,50.5,54.2,57.2,59.5,61.5,63.4,65,66.4,67.6,68.9,70,71,72,73,74,75,76,77,78,78.8,79.6,80.4,81,81.6,82.1,82.7,83.2,83.75,84.3,85,85.6,86.15,86.90,87.45,88,88.5,89.1,89.8,90.32,90.95,91.4,92,92.4,93,93.5,94,94.6,95,95.5,96,96.4,97,97.4,97.9,98.3,98.8,99.25,99.7,100.05,100.45],
          fill: "false"
        }, {
          label: '-1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [48,52.5,56.3,59.1,61.5,63.5,65.4,67,68.5,70,71.15,72.4,73.5,74.6,75.6,76.8,77.9,78.9,79.9,80.8,81.7,82.5,83.4,84,84.6,85.1,85.7,86.35,87,87.7,88.3,89,89.75,90.35,91.1,91.7,92.28,93,93.5,94.05,94.75,95.3,96,96.5,97,97.5,98,98.6,99.16,99.78,100.25,100.75,101.2,101.75,102.25,102.85,103.22,103.75,104.15,104.72,105.05],
          fill: "-1"
        },
        {
          label: '0',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [50,54.5,58.4,61.3,63.8,65.9,67.8,69.3,70.85,72.1,73.4,74.6,75.8,77,78,79,80.1,81.2,82.4,83.5,84.5,85.3,86.2,86.95,87.6,88.15,88.7,89.36,90,90.8,91.55,92.22,92.96,93.6,94.3,95,95.7,96.4,97,97.75,98.35,99,99.65,100.25,101,101.6,102.15,102.85,103.4,104,104.6,105.1,105.7,106.2,106.82,107.35,107.96,108.4,108.99,109.5,110],
          fill: "-1"
        },
        {
          label: '1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [52,56.6,60.2,63.3,66,68,69.9,71.4,73,74.25,75.6,77,78.15,79.35,80.6,81.9,83,84,85.1,86.2,87.2,88.2,89.2,90,90.6,91.25,92.1,92.85,93.55,94.35,95.15,96,96.74,97.4,98.15,99,99.70,100.38,101.05,101.8,102.5,103.15,103.92,104.55,105.1,105.8,106.35,107.05,107.68,108.25,109,109.55,110.14,110.85,111.45,112,112.45,113,113.6,114.1,114.7],
          fill: "-1"
        },
        {
          label: '2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [54,58.4,62.1,65.1,67.8,70,71.9,73.5,75,76.5,78,79.15,80.4,81.8,83,84.1,85.3,86.6,87.8,89,90,91,92,92.9,93.6,94.4,95.2,95.95,96.8,97.6,98.4,99.12,100,100.85,101.55,102.3,103.1,103.95,104.8,105.6,106.28,107,107.7,108.35,109.05,109.8,110.4,111,111.75,112.35,113,113.7,114.28,114.98,115.48,116.08,116.72,117.23,117.95,118.4,119],
          fill: "-1"
        }
        ]
      },
      options: {
       responsive: false,
        // pointLabelFontSize : 5,
        title: {
          display: false,
          text: 'Talla Para la Edad'
        },
        tooltips: {
            mode: 'point',
            intersect: true
          },
        // hover: {
        //     mode: 'point',
        //     intersect: true
        //   },
        legend: {
          display: false,
        },
        elements: {
            point: {
              pointStyle: 'circle',
              borderWidth: 0.1,
              hitRadius: 5,
            },
            line: {
              tension: 0.00001,
              borderWidth: 2
            },
        },
        hover: {
          mode: 'point',
          intersect: true
        },
        scales: {
              

          xAxes: [{
            scaleLabel: {
              labelMinWidth: 50,
              display: true,
              labelString: 'EDAD EN MESES',

            },
            ticks:{
              padding: 0,
              labelOffset: 0,
              min: 0,
              max: 30,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 0 ? dataLabel : '';
              }
            }
          }],
          yAxes: [
          {
            stacked: false,
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 40,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 && dataLabel != 100 && dataLabel != 105 && dataLabel != 110 && dataLabel != 115 && dataLabel != 120 && dataLabel != 125 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          },
          {
            stacked: false,
            position: 'right',
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 40,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 && dataLabel != 100 && dataLabel != 105 && dataLabel != 110 && dataLabel != 115 && dataLabel != 120 && dataLabel != 125 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          }
          ]
        }
      }
    };

    var config3 = {
      type: 'line',
      data: {
        labels: ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'],
        datasets: [{
          label: '-2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [45,49.1,52.3,55,57.1,59,60.7,62.3,63.8,65,66.2,67.5,68.6,69.7,70.8,71.9,72.9,73.9,74.75,75.6,76.5,77.4,78.2,78.9,79.6,80.05,80.72,81.35,82,82.8,83.45,84.1,84.9,85.5,86.1,86.85,87.45,88.05,88.74,89.35,90,90.5,91.1,91.75,92.32,92.95,93.4,94,94.48,95,95.45,96,96.47,97,97.5,97.90,98.34,98.8,99.15,99.65,100.05],
          fill: "false"
        }, {
          label: '-1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [47,51,54.4,57,59.2,61.1,63,64.6,66,67.3,68.5,69.8,71,72.1,73.15,74.25,75.3,76.4,77.5,78.5,79.4,80.3,81.2,81.9,82.6,83.28,83.95,84.65,85.4,86.15,86.95,87.65,88.28,89,89.72,90.31,91,91.75,92.35,93,93.7,94.3,95,95.6,96.16,96.85,97.35,98,98.45,99.1,99.75,100.15,100.8,101.24,101.85,102.29,102.85,103.27,103.8,104.22,104.75],
          fill: "-1"
        },
        {
          label: '0',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [49,53,56.5,59.35,61.6,63.7,65.3,67,68.4,69.9,71.1,72.3,73.65,74.9,76,77.1,78.2,79.5,80.6,81.7,82.8,83.8,84.7,85.3,85.9,86.5,87.25,88,88.84,89.65,90.3,91.1,92,92.8,93.5,94.2,95,95.75,96.4,97.1,97.9,98.5,99.1,99.82,100.45,101.1,101.8,102.4,103,103.65,104.2,104.84,105.4,106,106.6,107.1,107.6,108.1,108.55,109.05,109.55],
          fill: "-1"
        },
        {
          label: '1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [51,55,58.6,61.3,63.7,65.8,67.6,69.12,70.82,72.2,73.7,75,76.2,77.5,78.9,80,81.2,82.3,83.5,84.8,85.85,86.9,87.9,88.7,89.38,90.2,90.97,91.6,92.4,93.2,94.1,94.95,95.65,96.5,97.15,98,98.8,99.4,100.1,100.9,101.55,102.2,102.95,103.65,104.26,105,105.55,106.2,106.9,107.45,108.05,108.75,109.29,109.95,110.55,111.05,111.7,112.2,112.8,113.35,114],
          fill: "-1"
        },
        {
          label: '2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [53,57,60.4,63.3,65.9,68,69.82,71.4,73,74.6,76,77.3,78.7,80,81.3,82.7,84,85.2,86.38,87.7,88.9,89.9,90.9,91.65,92.4,93.2,94.12,94.9,95.75,96.6,97.4,98.15,99.05,99.99,100.8,101.5,102.25,103.05,103.95,104.75,105.4,106.1,106.95,107.55,108.25,109,109.75,110.4,111.1,111.85,112.45,113.1,113.85,114.4,115.05,115.81,116.4,117,117.72,118.35,119],
          fill: "-1"
        }
        ]
      },
      options: {
        responsive: false,
        pointLabelFontSize : 5,
        title: {
          display: false,
          text: 'Talla Para la Edad N'
        },
        tooltips: {
            mode: 'point',
            intersect: true
          },
        // hover: {
        //     mode: 'point',
        //     intersect: true
        //   },
        legend: {
          display: false,
        },
        elements: {
            point: {
              pointStyle: 'circle',
              borderWidth: 0.1,
              hitRadius: 5,
            },
            line: {
              tension: 0.00001,
              borderWidth: 2
            },
        },
        hover: {
          mode: 'point',
          intersect: true
        },
        scales: {
              

          xAxes: [{
            scaleLabel: {
              labelMinWidth: 50,
              display: true,
              labelString: 'EDAD EN MESES',

            },
            ticks:{
              padding: 0,
              labelOffset: 0,
              min: 0,
              max: 30,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 0 ? dataLabel : '';
              }
            }
          }],
          yAxes: [{
            stacked: false,
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 40,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 && dataLabel != 100 && dataLabel != 105 && dataLabel != 110 && dataLabel != 115 && dataLabel != 120 && dataLabel != 125 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          },
          {
            stacked: false,
            position: 'right',
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 40,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 && dataLabel != 100 && dataLabel != 105 && dataLabel != 110 && dataLabel != 115 && dataLabel != 120 && dataLabel != 125? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          }]
        }
      }
    };

    var config4 = {
      type: 'line',
      data: {
        labels: ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36'],
        datasets: [{
          label: '-2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [81,81.8,82.4,83,83.75,84.3,85,85.6,86.15,86.90,87.45,88,88.5,89.1,89.8,90.32,90.95,91.4,92,92.4,93,93.5,94,94.6,95,95.5,96,96.4,97,97.4,97.9,98.3,98.8,99.25,99.7,100.05,100.45],
          fill: "false"
        }, {
          label: '-1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [84,84.85,85.55,86.2,87,87.7,88.3,89,89.75,90.35,91.1,91.7,92.28,93,93.5,94.05,94.75,95.3,96,96.5,97,97.5,98,98.6,99.16,99.78,100.25,100.75,101.2,101.75,102.25,102.85,103.22,103.75,104.15,104.72,105.05],
          fill: "-1"
        },
        {
          label: '0',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [87,87.85,88.6,89.26,90,90.8,91.55,92.22,92.96,93.6,94.3,95,95.7,96.4,97,97.75,98.35,99,99.65,100.25,101,101.6,102.15,102.85,103.4,104,104.6,105.1,105.7,106.2,106.82,107.35,107.96,108.4,108.99,109.5,110],
          fill: "-1"
        },
        {
          label: '1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [90,91,92,92.85,93.55,94.35,95.15,96,96.74,97.4,98.15,99,99.70,100.38,101.05,101.8,102.5,103.15,103.92,104.55,105.1,105.8,106.35,107.05,107.68,108.25,109,109.55,110.14,110.85,111.45,112,112.45,113,113.6,114.1,114.7],
          fill: "-1"
        },
        {
          label: '2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [93,94,95,95.95,96.8,97.6,98.4,99.12,100,100.85,101.55,102.3,103.1,103.95,104.8,105.6,106.28,107,107.7,108.35,109.05,109.8,110.4,111,111.75,112.35,113,113.7,114.28,114.98,115.48,116.08,116.72,117.23,117.95,118.4,119],
          fill: "-1"
        }
        ]
      },
      options: {
        responsive: false,
        pointLabelFontSize : 5,
        title: {
          display: true,
          text: 'Talla Para la Edad'
        },
        tooltips: {
            mode: 'point',
            intersect: true
          },
        // hover: {
        //     mode: 'point',
        //     intersect: true
        //   },
        legend: {
          display: false,
        },
        elements: {
            point: {
              pointStyle: 'circle',
              borderWidth: 0.1,
              hitRadius: 5,
            },
            line: {
              tension: 0.00001,
              borderWidth: 2
            },
        },
        hover: {
          mode: 'point',
          intersect: true
        },
        scales: {
              

          xAxes: [{
            scaleLabel: {
              labelMinWidth: 50,
              display: true,
              labelString: 'EDAD EN MESES',

            },
            ticks:{
              padding: 0,
              labelOffset: 0,
              min: 0,
              max: 30,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 0 ? dataLabel : '';
              }
            }
          }],
          yAxes: [{
            stacked: false,
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 70,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          },{
            stacked: false,
            position:'right',
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 70,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          }]
        }
      }
    };

    var config5 = {
      type: 'line',
      data: {
        labels: ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36'],
        datasets: [{
          label: '-2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [79,79.85,80.55,81.25,82,82.8,83.45,84.1,84.9,85.5,86.1,86.85,87.45,88.05,88.74,89.35,90,90.5,91.1,91.75,92.32,92.95,93.4,94,94.48,95,95.45,96,96.47,97,97.5,97.90,98.34,98.8,99.15,99.65,100.05],
          fill: "false"
        }, {
          label: '-1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [82.5,83.18,83.95,84.65,85.4,86.15,86.95,87.65,88.28,89,89.72,90.31,91,91.75,92.35,93,93.7,94.3,95,95.6,96.16,96.85,97.35,98,98.45,99.1,99.75,100.15,100.8,101.24,101.85,102.29,102.85,103.27,103.8,104.22,104.75],
          fill: "-1"
        },
        {
          label: '0',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [85.59,86.3,87.1,88,88.84,89.65,90.3,91.1,92,92.8,93.5,94.2,95,95.75,96.4,97.1,97.9,98.5,99.1,99.82,100.45,101.1,101.8,102.4,103,103.65,104.2,104.84,105.4,106,106.6,107.1,107.6,108.1,108.55,109.05,109.55],
          fill: "-1"
        },
        {
          label: '1',
          borderColor: "#000",
          backgroundColor: "rgb(0,0,0,0)",
          data: [89,90,90.84,91.6,92.4,93.2,94.1,94.95,95.65,96.5,97.15,98,98.8,99.4,100.1,100.9,101.55,102.2,102.95,103.65,104.26,105,105.55,106.2,106.9,107.45,108.05,108.75,109.29,109.95,110.55,111.05,111.7,112.2,112.8,113.35,114],
          fill: "-1"
        },
        {
          label: '2',
          borderColor: "#FF0606",
          backgroundColor: "rgb(0,0,0,0)",
          data: [92.05,93,93.98,94.9,95.75,96.6,97.4,98.15,99.05,99.99,100.8,101.5,102.25,103.05,103.95,104.75,105.4,106.1,106.95,107.55,108.25,109,109.75,110.4,111.1,111.85,112.45,113.1,113.85,114.4,115.05,115.81,116.4,117,117.72,118.35,119],
          fill: "-1"
        }
        ]
      },
      options: {
        responsive: false,
        pointLabelFontSize : 5,
        title: {
          display: true,
          text: 'Talla Para la Edad'
        },
        tooltips: {
            mode: 'point',
            intersect: true
          },
        // hover: {
        //     mode: 'point',
        //     intersect: true
        //   },
        legend: {
          display: false,
        },
        elements: {
            point: {
              pointStyle: 'circle',
              borderWidth: 0.1,
              hitRadius: 12,
            },
            line: {
              tension: 0.00001,
              borderWidth: 2
            },
        },
        hover: {
          mode: 'point',
          intersect: true
        },
        scales: {
              

          xAxes: [{
            scaleLabel: {
              labelMinWidth: 50,
              display: true,
              labelString: 'EDAD EN MESES',

            },
            ticks:{
              padding: 0,
              labelOffset: 0,
              min: 0,
              max: 30,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line too
                return index != 0 ? dataLabel : '';
              }
            }
          }],
          yAxes: [{
            stacked: false,
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 70,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          },{
            stacked: false,
            position:'right',
            scaleLabel: {
              display: true,
              labelString: 'Longitud (cm)'
            },
            gridLines:{
              lineWidth: 0,
              tickMarkLength: 0
            },
            ticks:{
              padding: 10,
              labelOffset: 0,
              min: 70,
              max: 125,
              stepSize: 1,
              // autoSkipPadding: 30,
              maxRotation: 0,
              callback: function(dataLabel, index) {
                // Hide the label of every 2nd dataset. return null to hide the grid line 
                var x = '';
                if(dataLabel == 40){
                  dataLabel = x;
                }
                dataLabel != 40 && dataLabel != 45 && dataLabel != 50 && dataLabel != 55 && dataLabel != 60 && dataLabel != 65 && dataLabel != 70 && dataLabel != 75 && dataLabel != 80 && dataLabel != 85 && dataLabel != 90 && dataLabel != 95 ? dataLabel = x: dataLabel;
                return dataLabel;
              }
            }
          }]
        }
      }
    };

    window.onload = function() {
      // var ctx = document.getElementById('canvas').getContext('2d');
      // new Chart(ctx, config);
      // var ctx2 = document.getElementById('canvas2').getContext('2d');
      // new Chart(ctx2, config2);
    };

    function randomScalingFactor(){
      var x = Math.random();
      return x;
    }


    var edad_a,peso_n,peso_actual,talla=0;
    var flag = false;
    var arr = [];
    $('.peso_al_nacer').on('keyup', function(){
      console.debug('esta entrando');
        $(this).parent().find('.grafica_info').slideDown('slow');
        $(this).parent().parent().find('.canvas_p').slideDown('slow');

        peso_n =$(this).val();
        peso_n = peso_n/1000;
        var data_actual = {
          index: 1,
          label: 'Actual',
          borderColor: "#0283E6",
          backgroundColor: "#0283E6",
          data: [{x:'0',y:peso_n},{x:''+edad_actual+'',y:peso_actual}],
          fill: false,
          lineTension: 0,
          lineWidth: 20,
          // borderDash: [5, 5],
          pointRadius: 4,
          pointHitRadius: 10,
        };
        if (chart.data.datasets.length >= 3) {
          chart.data.datasets.splice(0,1);
          chart.update();
        } 
        chart.data.datasets.unshift(data_actual);
        arr.push(chart);
        chart.update();
        console.debug(arr);
       
    });

   
    $('.modal_peso_m').on('click', function(){
        // console.debug($('button[target="modal_peso_m"]'));
        console.debug($('input[name="tb2_peso_al_nacer_'+index+'"]').val());
        var index = $('.modal_peso_m').index($(this))+1;
        var grafica_info = $(this).attr('target');
      
        if (typeof chart == 'undefined' && $('input[name="tb2_peso_al_nacer_'+index+'"]').val() == '') {
          console.debug('entro rico 1');
          ctx = document.getElementById('canvas_p'+index).getContext('2d');
          chart = new Chart(ctx, config);
        }
        else if(typeof chart == 'undefined' && $('input[name="tb2_peso_al_nacer_'+index+'"]').val() != ''){
          console.debug('entro rico 2');
          ctx = document.getElementById('canvas_p'+index).getContext('2d');
          chart = new Chart(ctx, config);
          edad_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_edad').val();
          peso_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_peso').val();
          peso_n =$('input[name="tb2_peso_al_nacer_'+index+'"]').val();
          peso_n = peso_n/1000;

          var id_integrante = $('input[name="id_integrante_'+index+'"').val();
          var id_familia = '2_6';
          var data_a = [];
          console.debug(id_integrante);
          console.debug(id_familia);

          jQuery.ajax({
            url: '/instituto/core/includes/datos_grafica_peso.php',
            type: 'POST',
            dataType: 'text',
            data: {id_integrante:id_integrante,id_familia:id_familia},
            beforeSend: function(){
                // xhr.setRequestHeader("Ajax_Request","true");
                // $(".content").html("<img src='img/loading.gif'>");
            },
            success:function(data){
              // console.debug(data);
              data_a = JSON.parse(data);
               if (peso_n !== '') {
            var data_actual = {
            index: 1,
            label: 'Actual',
            borderColor: "#0283E6",
            backgroundColor: "#0283E6",
            data: [{x:'0',y:peso_n},{x:''+edad_actual+'',y:peso_actual}],
            fill: false,
            lineTension: 0,
            lineWidth: 20,
            // borderDash: [5, 5],
            pointRadius: 4,
            pointHitRadius: 10,
            };

            data_a.forEach(function(value,index){
                console.debug(value);
                console.debug(index);
              data_actual.data.splice(1+index,0,value);
            });
            if (chart.data.datasets.length >= 3) {
              chart.data.datasets.splice(0,1);
              chart.update();
            } 


            console.debug(data_a);
            console.debug(data_actual);


            chart.data.datasets.unshift(data_actual);
            arr.push(chart);
            chart.update();
            $('#'+grafica_info+' .grafica_info').show();
            $('#canvas_p'+index).show();
            console.log($('#'+grafica_info+' .grafica_info'));
          }

                // $('#mapa').prop('src', data.url_mapa);
            }
            }).fail( function( jqXHR, textStatus, errorThrown ) {
                  if (jqXHR.status === 0) {
                    alert('Not connect: Verify Network.');
                  } else if (jqXHR.status == 404) {
                    alert('Requested page not found [404]');
                  } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                  } else if (textStatus === 'parsererror') {
                    alert('Requested JSON parse failed.');
                  } else if (textStatus === 'timeout') {
                    alert('Time out error.');
                  } else if (textStatus === 'abort') {
                    alert('Ajax request aborted.');
                  } else {
                    alert('Uncaught Error: ' + jqXHR.responseText);
                  }
                });

         
        } 
        else{
          console.debug('entro rico 3');
          chart.destroy();
          delete chart;
          console.debug(document.getElementById('canvas_p'+index));
          ctx = document.getElementById('canvas_p'+index).getContext('2d');
          chart = new Chart(ctx, config);

          edad_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_edad').val();
          peso_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_peso').val();
          peso_n =$('input[name="tb2_peso_al_nacer_'+index+'"]').val();
          peso_n = peso_n/1000;

          if (peso_n !== '') {
            var data_actual = {
            index: 1,
            label: 'Actual',
            borderColor: "#0283E6",
            backgroundColor: "#0283E6",
            data: [{x:'0',y:peso_n},{x:''+edad_actual+'',y:peso_actual}],
            fill: false,
            lineTension: 0,
            lineWidth: 20,
            // borderDash: [5, 5],
            pointRadius: 4,
            pointHitRadius: 10,
            };
            if (chart.data.datasets.length >= 3) {
              chart.data.datasets.splice(0,1);
              chart.update();
            } 
            chart.data.datasets.unshift(data_actual);
            arr.push(chart);
            chart.update();
            var grafica_info = $(this).attr('target');
            $('#'+grafica_info+' .grafica_info').show();
            $('#canvas_p'+index).show();
          }
        }
        edad_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_edad').val();
        peso_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_peso').val();
    });

    $('.modal_talla_m').on('click', function(){
        // console.debug($('button[target="modal_peso_m"]'));
        // console.debug($('.modal_peso_m'));
        var index = $('.modal_talla_m').index($(this))+1;

        var sexo = $('input[name="tb2_sexo_'+index+'"').val();
        // var sexo = $(this).attr('target');
        // sexo = $('#'+sexo+'').find('input[type="hidden"]').val();
        // console.debug('sexo: '+sexo);
        if (sexo == 'M') {
          config_2 = config2;
        } else {
          config_2 = config3;
        }
      
        if (typeof chart2 == 'undefined') {
          ctx = document.getElementById('canvas_t'+index).getContext('2d');
          chart2 = new Chart(ctx, config_2);
          console.debug(chart2);
        }
        else{
          chart2.destroy();
          delete chart2;
          console.debug(document.getElementById('canvas_t'+index));
          ctx = document.getElementById('canvas_t'+index).getContext('2d');
          chart2 = new Chart(ctx, config_2);
        }
        // console.debug(ctx);
        edad_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_edad').val();
        talla_actual = $('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_talla').val();
        console.debug(index);
        console.debug($('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_edad'));
        console.debug($('table#tb2_menores_1año tbody tr:nth-child('+index+') input.tb2_talla'));

        var data_actual = {
          index: 1,
          label: 'Actual',
          borderColor: "#0283E6",
          backgroundColor: "#0283E6",
          data: [{x:'0',y:'50'},{x:edad_actual,y:talla_actual}],
          fill: false,
          lineTension: 0,
          lineWidth: 20,
          // borderDash: [5, 5],
          pointRadius: 5,
          pointHitRadius: 5,
        };
        if (chart2.data.datasets.length >= 6) {
          chart2.data.datasets.splice(0,1);
          chart2.update();
        } 
        chart2.data.datasets.unshift(data_actual);
        arr.push(chart2);
        chart2.update();
        console.debug(arr);
    });


    $('.modal_peso_m2').on('click', function(){
        // console.debug($('button[target="modal_peso_m"]'));
        // console.debug($('.modal_peso_m'));
        var index = $('.modal_peso_m2').index($(this))+1;
        $('#tb3_peso_al_nacer').prop('name','tb3_peso_al_nacer_'+index);
        // $('.input_hidden').append('<input type="hidden" name="tb3_peso_al_nacer_'+index+'">');
        // $('.input_hidden').append('abduzcan');
        if (typeof chart == 'undefined') {
          ctx = document.getElementById('canvas_p'+index).getContext('2d');
          chart = new Chart(ctx, config);
          console.debug(chart);
        }
        else{
          chart.destroy();
          delete chart;
          console.debug(document.getElementById('canvas_p'+index));
          ctx = document.getElementById('canvas_p'+index).getContext('2d');
          chart = new Chart(ctx, config);

          edad_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_edad').val();
          peso_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_peso').val();
          peso_n =$('input[name="tb3_peso_al_nacer_'+index+'"]').val();

          console.debug('peso'+peso_n);
          if (peso_n !== '') {
            var data_actual = {
            index: 1,
            label: 'Actual',
            borderColor: "#0283E6",
            backgroundColor: "#0283E6",
            data: [{x:'0',y:peso_n},{x:''+edad_actual+'',y:peso_actual}],
            fill: false,
            lineTension: 0,
            lineWidth: 20,
            // borderDash: [5, 5],
            pointRadius: 4,
            pointHitRadius: 10,
            };
            if (chart.data.datasets.length >= 3) {
              chart.data.datasets.splice(0,1);
              chart.update();
            } 
            chart.data.datasets.unshift(data_actual);
            arr.push(chart);
            chart.update();
            console.debug(arr);
            $('#canvas_p'+index).slideDown('slow');
          }
          
        }
        edad_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_edad').val();
        peso_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_peso').val();
        
    });

    $('.modal_talla_m2').on('click', function(){
        // console.debug($('button[target="modal_peso_m"]'));
        // console.debug($('.modal_peso_m'));
        var index = $('.modal_talla_m2').index($(this))+1;

        var sexo = $('input[name="tb3_sexo_'+index+'"').val();
        // var sexo = $(this).attr('target');
        // sexo = $('#'+sexo+'').find('input[type="hidden"]').val();
        // console.debug('sexo: '+sexo);
        if (sexo == 'M') {
          config_2 = config4;
        } else {
          config_2 = config5;
        }
      
        if (typeof chart2 == 'undefined') {
          ctx = document.getElementById('canvas_t'+index).getContext('2d');
          chart2 = new Chart(ctx, config_2);
          console.debug(chart2);
        }
        else{
          chart2.destroy();
          delete chart2;
          console.debug(document.getElementById('canvas_t'+index));
          ctx = document.getElementById('canvas_t'+index).getContext('2d');
          chart2 = new Chart(ctx, config_2);
        }
        // console.debug(ctx);
        edad_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_edad').val();
        talla_actual = $('table#tb3_niños_1a5 tbody tr:nth-child('+index+') input.tb3_talla').val();
        console.debug(edad_actual);
        console.debug(talla_actual);

        var data_actual = {
          index: 1,
          label: 'Actual',
          borderColor: "#0283E6",
          backgroundColor: "#0283E6",
          data: [{x:edad_actual,y:talla_actual}],
          fill: false,
          lineTension: 0,
          lineWidth: 20,
          // borderDash: [5, 5],
          pointRadius: 5,
          pointHitRadius: 5,
        };
        if (chart2.data.datasets.length >= 6) {
          chart2.data.datasets.splice(0,1);
          chart2.update();
        } 
        chart2.data.datasets.unshift(data_actual);
        arr.push(chart2);
        chart2.update();
        console.debug(arr);
    });


        
       $(".modal_peso_m .close,.modal_peso_m .acept,.modal_peso_m .modal").on('click', function(){
          chart.destroy();
          delete chart;
       });

        $(".modal_peso_m2 .close,.modal_peso_m2 .acept,.modal_peso_m2 .modal").on('click', function(){
          chart.destroy();
          delete chart;
       });

       $(".modal_talla_m .close,.modal_talla_m .acept,.modal_talla_m .modal").on('click', function(){
          chart2.destroy();
          delete chart2;
       });

        $(".modal_talla_m2 .close,.modal_talla_m2 .acept,.modal_talla_m2 .modal").on('click', function(){
          chart2.destroy();
          delete chart2;
       });


    // document.querySelector('.modal_peso_m').onclick = function(index){
    //     console.debug(index);
    // }

   
 console.debug($('table#tb2_menores_1año tbody tr:nth-child(2) input.tb2_edad'));
        console.debug($('table#tb2_menores_1año tbody tr:nth-child(2) input.tb2_talla'));

//function init2(){
//    
//    var filecollection = new Array();
//    
//    
//    $("#images")on('change', function(e){
//        var files = e.target.files;
//        
//        $.each(files, function(i,file){
//            
//            filecollection.push(file);
//            
//            var reader = new FileReader();
//            reader.readAsDataURL(file);
//            reader.onload = function(e){
//              var template =
//            '<form action="/upload">'+
//                '<img src="'+e.target.result+'" alt="">'+
//                '<input type="text" name="title">'+
//                '<button class="button" >Subir</button>'+
//               ' <a href="#" class="button">Quitar</a> '+
//            '</form>   ';
//                
//                $('#imagenes').append(template)
//                
//            };
//        });
//    });   
//    //
//    $(document).on('submit','form',function(e){
//        e.preventDefault();
//        
//        var index = $(this).index();
//        console.log(index);        console.log(filecollection[index]);
//        
//        var formdata = new FormData($(this)[0]);
//        formdata.append(filecollection[index]);
//        
//        
//        var request = new XMLHttpRequest();
//        request.send(formdata);
//
//    })
//    
//}