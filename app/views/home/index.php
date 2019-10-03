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
  <select>
  <option value="september">September</option>
  <option value="august">August</option>
  <option value="july">July</option>
  <option value="june">June</option>
</select>
</div>
  <div class="wrapper">
          <h3 class="title">Overview</h3>
          <div class="categories">
            <div class="category">
              <span>Orders</span>
              <?php 
              $db = mysqli_connect('localhost','root','','boozt');
              $sql = "SELECT * FROM orders WHERE purchaseDate LIKE '%2019-08%'";
              $result = mysqli_query($db, $sql);
              echo "<span>".mysqli_num_rows($result)."</span>";
             ?>
            </div>
            <div class="category">
              <span>Revenues</span>
              <?php 
              $db = mysqli_connect('localhost','root','','boozt');
              $qry = "SELECT sum(price) as total FROM orderItems
              JOIN orders on orders.orderId= orderItems.orderId
              WHERE orders.purchaseDate LIKE '%2019-08%'";
              $result = mysqli_query($db, $qry);
              while ($row = mysqli_fetch_assoc($result))
              {
                echo "<span>".$row['total']."</span>";
              }
             ?>
            </div>
            <div class="category">
              <span>Customers</span>
              <?php 
              $db = mysqli_connect('localhost','root','','boozt');
              $result = "SELECT * FROM customer
              JOIN orders on orders.customerId = customer.customerId
              WHERE orders.purchaseDate LIKE '%2019-08%'";
              $query = mysqli_query($db, $result);
              echo "<span>".mysqli_num_rows($query)."</span>";
             ?>
          </div>
        </div>
      </div>
      <br>
      <br>
</div>

