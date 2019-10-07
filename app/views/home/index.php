<?php include 'header.php'?>

<div class="main_container">
<div class="header">
        <div class="header_title">Welcome to Boozt sales dashboard</div>
        <div class="header_description">
        <p>On this page, you have the opportunity to see the all the customers that we have, the orders that has been made, and the total 
        revenues sorted by month</p> 
        </div>
  </div>
  <div class="select-option">
  <label>Sort by month</label>
  <select id="selectValue" onchange="DisplayByDay();">
  <script type="text/javascript">
    function DisplayByDay() {
    var select = document.getElementById("selectValue");
    var selectedValue = selectValue.options[<?php echo $data['totalOrderByDay'] ?>].value;
    console.log(selectedValue);
   }
  </script>
  <option value="august">August</option>
  <option value="1 august ">1 August</option>
  <option value="2 august ">2 August</option>
  <option value="3 august ">3 August</option>
  <option value="4 august ">4 August</option>  
  <option value="5 august ">5 August</option>
</select>
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
              <?php echo ($data['totalOrderByDay']) ?>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="chart">
      <script type="text/javascript">
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

