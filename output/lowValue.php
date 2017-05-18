<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <!-- http://t.co/dKP3o1e -->
 <meta name="HandheldFriendly" content="True">
 <meta name="MobileOptimized" content="320">


  <title>CRM-CLVP Analytics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="jquery.csv.min.js"></script>
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CLV</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
        <li><a href="#">Campaign</a></li>
        <li><a href="http://ammii.org/SuiteCRM">SuiteCRM</a></li>
        <li><a href="http://ammii.org/doublej">DoubleJ</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <h2>CRM-CLVP Analytics</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Age</a></li>
        <li><a href="#section3">Gender</a></li>
        <li><a href="#section3">Geo</a></li>
        <li><a href="#">Campaign</a></li>
        <li><a href="http://ammii.org/SuiteCRM">SuiteCRM</a></li>
        <li><a href="http://ammii.org/doublej">DoubleJ</a></li>
      </ul><br>
    </div>
    <br>
    <script type="text/javascript">
    /*
      google.charts.load("current", {packages:["corechart","geochart"]});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      //Revenue & Gender
       $.get("/dst/output/revenue_gender.csv", function(csvString) {
          var arrayRevGenderData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
          // this new DataTable object holds all the data
          var RevGenderdata = new google.visualization.arrayToDataTable(arrayRevGenderData);
          var RevGenderoptions = {
            //title: 'Gender & Revenue',
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' },
            colors: ['#e0440e', '#e6693e']
            //legend: 'none'
          };
          var RevGenderchart = new google.visualization.PieChart(document.getElementById('donutRevGenderchart'));
          RevGenderchart.draw(RevGenderdata, RevGenderoptions);
       });

       //Revenue & Age
       $.get("/dst/output/revenue_age.csv", function(csvString) {
          var arrayRevAgeData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
          // this new DataTable object holds all the data
          var RevAgedata = new google.visualization.arrayToDataTable(arrayRevAgeData);
          var RevAgeoptions = {
            //title: 'Age & Revenue',
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' }
            //legend: 'none'
          };
          var RevAgechart = new google.visualization.PieChart(document.getElementById('donutRevAgechart'));
          RevAgechart.draw(RevAgedata, RevAgeoptions);
       });

       //Revenue & Country
       $.get("/dst/output/revenue_country.csv", function(csvString) {
          var arrayRevGeoData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
          // this new DataTable object holds all the data
          var RevGeodata = new google.visualization.arrayToDataTable(arrayRevGeoData);
          var RevGeooptions = {
            //title: 'Age & Revenue',
            //pieHole: 0.3,
            backgroundColor: { fill:'transparent' }
            //legend: 'none'
          };
          var RevGeochart = new google.visualization.GeoChart(document.getElementById('mapRevGeochart'));
          RevGeochart.draw(RevGeodata, RevGeooptions);
       });

       //Revenue & Campaign
       $.get("/dst/output/revenue_campaign.csv", function(csvString) {
          var arrayRevCamData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
          // this new DataTable object holds all the data
          var RevCamdata = new google.visualization.arrayToDataTable(arrayRevCamData);
          var RevCamoptions = {
            //title: 'Age & Revenue',
            pieHole: 0.3,
            backgroundColor: { fill:'transparent' }
            //legend: 'none'
          };
          var RevCamchart = new google.visualization.PieChart(document.getElementById('donutRevCamchart'));
          RevCamchart.draw(RevCamdata, RevCamoptions);
       });

    }
    */
    </script>
    <div class="col-sm-3">
      <div class="well">
    <?php
echo "<html><body><table>\n\n";
$f = fopen("low_value.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";

?>

</div>
</div>

</body>
</html>
