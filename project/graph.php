<html>
<head>
    <meta charset="UTF-8">
    <title>Sensor data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" type="text/javascript"></script>
    <style>
        body {
            margin: 30px 30px;
        }
    </style>

</head>
<body>
<h1>Temperatur i Chomsky</h1>
<canvas id="myChart" width="400" height="400"></canvas>

<script>
    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Chomsky",
                fillColor: "transparent",
                strokeColor: "darkblue",
                pointColor: "darkblue",
                pointStrokeColor: "lightblue",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "darkblue",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    };

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("myChart").getContext("2d");
    var myLineChart = new Chart(ctx);
    myLineChart.Line(data);

</script>
</body>
</html>