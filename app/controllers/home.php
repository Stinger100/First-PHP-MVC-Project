<?php

namespace App\Controllers;
use App\Foundation\Controller;
use App\Models\Customer;
use App\Database\Database;

class Home extends Controller 
{
    /**
     * @var Database $database
     */
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }
    public function getOrdersByDate(){
        // retrieving data from specific period
        //to do: retrieve start and end date from view
        //to do: update query to use start and end dates
        //to do: update view to show query result
    // $groupBySelectedDates = $this->database->raw(
    //     "SELECT DAY(purchaseDate) DAY FROM orders WHERE orders.purchaseDate BETWEEN '2019-08-01' AND '2019-09-01' GROUP BY DAY(purchaseDate)
    //     "
    // );
    }
    /**
     * @return void
     */
    public function index(): void 
    {
        $orderItems = $this->database->raw(
            "SELECT sum(price) as total FROM orderItems
            JOIN orders on orders.orderId= orderItems.orderId
            WHERE orders.purchaseDate LIKE '%2019-08%'"
        );

        $customers = $this->database->raw(
            "SELECT  DISTINCT customer.customerId FROM customer
              JOIN orders on orders.customerId = customer.customerId
              WHERE orders.purchaseDate LIKE '%2019-08%'"
        );
        $orders = $this->database->raw(
            "SELECT * FROM orders
            WHERE orders.purchaseDate LIKE '%2019-08%'"
        );
       
        $groupByCurrentDate = $this->database->raw(
            " SELECT DAY(purchaseDate) DAY FROM orders WHERE orders.purchaseDate LIKE curDate() GROUP BY DAY(purchaseDate)"
        );
       
    
       
        $this->view(
            'home/index',
            [
                'totalOrderItems'=> $orderItems[0]['total'] ?? 0,
                'totalCustomers' => count($customers) ?? 0,
                'totalOrders' => count($orders) ?? 0,
                'totalOrderByDay' => count($groupByCurrentDate) ?? 0
            ]
        );    

    }
  
}
