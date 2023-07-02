<!DOCTYPE html>
<html>
<head> 
<style>
.button {
  background-color: #FFA500;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 3px 2px;
  cursor: pointer;
}
.center {
     text-align: center;
    }
body {
        background-image: url("assets/img/background.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>
<h2 align="center">COMPLAINT MADE BY USER BASED ON TYPE OF COMPLAINT</h2>
<center>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Unsatisfied Expert’s Feedback’", "Wrongly Assigned Research Area","Answer Not Specific" ,"Others"];
var yValues = [1,2,3,1];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#fbceb1",
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Number of Complaint Made"
    }
  }
});
</script>
</center>

<hr> 
<p align="center">
<a href="/compiled_MODULE-1/Complaint.php" class="button">BACK</a> 
</body>
</html>
<!--
<html>
<body>
<script>
// Data retrieved from https://netmarketshare.com/
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Type of users in FK-EDUSearch',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: ' Number of Users',
        data: [
            { name: '4', y: 25 },
            { name: '1', y: 25 },
            { name: '2', y: 25 },
            { name: '3', y: 25 },
        ]
    }]
});


</script>

</body>
</html>
-->
