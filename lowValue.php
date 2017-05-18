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
  <link rel="stylesheet" href="bootstrap.min.css">
  <script type="text/javascript" src="loader.js"></script>
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="jquery.csv.min.js"></script>
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
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
        <li ><a href="/dst/index.php">Dashboard</a></li>
        <li><a href="/dst/highValue.php">High Value Customer</a></li>
        <li class="active"><a href="/dst/lowValue.php">Low Value Customer</a></li>

      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>CRM-CLVP Analytics</h2>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="/dst/index.php">Dashboard</a></li>
        <li><a href="/dst/highValue.php">High Value Customer</a></li>
        <li class="active"><a href="/dst/lowValue.php">Low Value Customer</a></li>
        
      </ul><br>
    </div>
    <br>
    <div class="col-sm-9">
      <div class="well">
        <h3>Customers with low revenue</h3>
      </div>

      <div class="well">

    <?php
      echo "<html><body><table data-toggle='table' data-striped='true' data-sort-name='revenue country' data-pagination='true' data-search='true'>\n\n";
      $f = fopen("low_value.csv", "r");
      $count = 1;
      while (($line = fgetcsv($f)) !== false) {
        if ($count == 1) {
            echo "<thead>";
            echo "<th data-field='country' data-sortable='true'>Country</th>\n";
            echo "<th>Customer ID</th>\n";
            echo "<th>First Purchase</th>\n";
            echo "<th>Pages Visited</th>\n";
            echo "<th data-field='revenue' data-sortable='true'>Revenue</th>\n";
            echo "<th>Age Group</th>\n";
            echo "<th>Gender</th>\n";
            echo "<th>Campaign</th>\n";
            echo "</thead>\n";
            echo "<tbody>\n";
        } else {
            echo "<tr>";
            $data_count = 0;
            foreach ($line as $cell) {
              if($data_count == 4){
                echo "<td class='revenue'>" . htmlspecialchars(number_format((float)$cell,2,'.', ',')) . "</td>";
              } else {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
              }
              $data_count = $data_count + 1;
            }
            echo "</tr>\n";
        }
        $count = $count + 1;
      }
      fclose($f);
      echo "\n</table></body></html>";
    ?>

</div>
</div>

</body>
</html>
