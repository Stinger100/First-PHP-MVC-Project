<?php include 'header.php'?>

<div class="main_container">
<div class="header">
        <div class="header_title">Welcome to Boozt sales dashboard</div>
        <div class="header_description">
        <p>On this page, you have the opportunity to see the all the customers that we have, the orders that has been made, and the total 
        revenues sorted by month</p> 
        </div>
  </div>

  <div class="wrapper">
          <h3 class="title">Overview</h3>
          <div class="categories">
            <div class="category">
              <span>Orders</span>
             <?php echo "<span>".$data['totalOrders']."</span>" ?>
            </div>
            <div class="category">
              <span>Revenues</span>
              <?php echo "<span>".$data['totalOrderItems']."</span>" ?>
            </div>
            <div class="category">
              <span>Customers</span>
              <?php echo "<span>".$data['totalCustomers']."</span>" ?>
              </div>
              <div class="category">
              <span>Order by Date</span>
              <?php echo "<span>" .$data['totalOrderByDay']. "</span>"?>
          </div>
          <div class="category">
          <span>Orders by Dates</span>
          <form action="/form/process/" method="post">
          <input type="text" class= "selected-dates" name="datetimes" />

          <input type="submit">
</form>

          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="chart">
      <script type="text/javascript">


      $(function() {
  $('input[name="datetimes"]').daterangepicker({
    "startDate": "08/01/2019",
    "endDate": "08/31/2019",
      "minDate": "08/01/2019",
    "maxDate": "08/31/2019",
    "opens": "center"
  },
    function(start, end, label) {
var startDate = start.format('YYYY-MM-DD');
var endDate = end.format('YYYY-MM-DD')

        $.ajax({
            type: "POST",
            url: 'http://localhost/mvc/app/controllers/Home.php?action=getOrdersByDate',
            data: {startDate:startDate,endDate:endDate},
            success: function(response) {
              console.log(success);
               }
           });     

     
  });
});

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Orders', 'Customers'],
          ['Sep 1', , 400],
          ['Sep 2', 2000, 460],
          ['Sep 3', 660, 1120],
          ['Sep 4', 1030, 540],
          ['Sep 5', 2500, 400],
          ['Sep 6', 3500, 460],
          ['Sep 7', 660, 1120],

        ]);

        var options = {
          title: 'Boozt Performance',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
     <div id="chart_div" style="width: 75%; margin:0 auto; height: 500px;background:none";></div>
      </div>
</div>

