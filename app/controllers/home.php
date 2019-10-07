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
            "SELECT * FROM customer
              JOIN orders on orders.customerId = customer.customerId
              WHERE orders.purchaseDate LIKE '%2019-08%'"
        );
        $orders = $this->database->raw(
            "SELECT * FROM orders
            WHERE orders.purchaseDate LIKE '%2019-08%'"
        );
        $groupByDay = $this->database->raw(
            "SELECT DAY(purchaseDate) DAY
            FROM orders
            WHERE orders.purchaseDate LIKE '%2019-08%'
            GROUP BY DAY(purchaseDate)"
        );
    
        var_dump($groupByDay);
       
        $this->view(
            'home/index',
            [
                'totalOrderItems'=> $orderItems[0]['total'] ?? 0,
                'totalCustomers' => count($customers) ?? 0,
                'totalOrders' => count($orders) ?? 0,
                'totalOrderByDay' => count($groupByDay) ?? 0
            ]
        );    

    }
  
}
