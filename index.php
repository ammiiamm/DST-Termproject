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
  <script type="text/javascript" src="/js/fancybox/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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
        <li class="active"><a href="/dst/index.php">Dashboard</a></li>
        <li><a href="/dst/highValue.php">High Value Customer</a></li>
        <li><a href="/dst/lowValue.php">Low Value Customer</a></li>

      </ul>
    </div>
  </div>
</nav>

    <script type="text/javascript">
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
            colors: ['#e0440e', '#e6693e'],
            legend: 'none'
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
            backgroundColor: { fill:'transparent' },
            legend: 'none'
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
            backgroundColor: { fill:'transparent' },
            legend: 'none'
          };
          var RevCamchart = new google.visualization.PieChart(document.getElementById('donutRevCamchart'));
          RevCamchart.draw(RevCamdata, RevCamoptions);
       });

    }

    </script>

    <?php
      $row = 1;
      if (($handle = fopen("stats.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                if($c == '0'){
                    $avgRev = $data[$c];
                }
                if($c == '1'){
                    $minRev = $data[$c];
                }
                if($c == '2'){
                    $maxRev = $data[$c];
                }
            }
        }
        fclose($handle);
      }else{
        echo "Can't load stats.csv";
      }
    ?>


    <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <h2>CRM-CLVP Analytics</h2>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="/dst/index.php">Dashboard</a></li>
          <li><a href="/dst/highValue.php">High Value Customer</a></li>
          <li><a href="/dst/lowValue.php">Low Value Customer</a></li>

        </ul><br>
      </div>
      <br>

      <div class="col-sm-9">
        <div class="well">
          <h3>Dashboard of Revenue Prediction</h3>
        </div>
        <div class="row">
          <div class="col-sm-7">
            <div class="well">

                <h1> <center>Average: $ <? echo number_format((float)$avgRev, 2, '.', ''); ?></center></h1>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="well">
              <center>
                <h4>Min:<b> $ <? echo number_format((float)$minRev, 2, '.', ''); ?> </b></h4>
                <h4>Max:<b> $ <? echo number_format((float)$maxRev, 2, '.', ''); ?> </b></h4>
              </center>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <div class="well">
              <h4>By gender</h4>
              <a class="various iframe" href="/dst/RevGender.html"><div id="donutRevGenderchart" style="width: 100%; height: 100%"></div></a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <h4>By age</h4>
              <a class="various iframe" href="/dst/RevAge.html"><div id="donutRevAgechart" style="width: 100%; height: 100%"></div></a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <h4>By campaign</h4>
              <a class="fancybox-media" href="/dst/RevCam.html"><div id="donutRevCamchart" style="width: 100%; height: 100%"></div></a>
            </div>
          </div>
        </div>
        <div class="well">
          <h4>By country</h4>
          <div id="mapRevGeochart" style="width: 100%; height: 100%"></div>
        </div>
<div class="well">

</div>

      </div>
    </div>
  </div>






</body>
</html>
