<?php

class Home extends Controller 
{
    public function index($name = '') 
    {
        $customer = $this->model('Customer');
        $customer->name = $name;
        //calling the view method
        $this->view('home/index', ['name'=> $customer->name]);    

    }
  
}
