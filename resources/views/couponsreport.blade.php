@extends('master')
@section('content')
<!-- pie chart -->
<style>
    #piechart{
        width:800px;
        height:500px;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
        ['Coupon', 'Status', { role: 'style' }],
      ['Active', <?php echo $active; ?>, 'color: green' ],
      ['Not Active',<?php echo $notactive; ?>, 'color:blue' ],
    ]);
    var options = {
        title: 'Customers'
        };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>
<h1 class="text-center mt-3 mb-3"> Coupons Report </h1>
<div class="container jumbotron" id="piechart" ></div>
@endsection



  