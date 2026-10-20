<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{

    protected $customer;

    protected $request;

    protected function setUp() :void 
    {
        $this->customer = new Customer();
    }

    protected function tearDown() :void 
    {
        $this->customer = null;
    }

    public function testCreateCustomer()
    {
        $response = $this->customer->create([
            "namex"         => "David Adebayo",
            "company_id"    => "1",
            "email"         => "customer@example.com", 
            "password"      => "@david4Real"
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

   public function testSetCustomer()
   {

       $response = $this->customer->saveAddress([
            "company_id"    => "1",
            "customer_id"   => "1",
            "names"         => "Adebaol Joel",
            "city"          => "London",
            "address_1"     => "Joel Meth, Avenue, London",
            "address_2"     => "King, Street London",
            "country"       => "United Kingdom",
            "phone"         => "+4489786756",
            "postcode"      => "FK70BU"
       ]);

       $this->assertNotNull($response);
       var_dump($response);
   }

    public function testCustomerAuth()
    {

        $response = $this->customer->auth([
            "email"     => "customer@example.com", 
            "password"  => "@david4Real"
        ]);
        $this->assertNotNull($response);

        var_dump($response);
    }

    
    public function testCustomerResetPassword(){

        $response = $this->customer->reset([
            "email"     => "customer@example.com", 
        ]);
        $this->assertNotNull($response);

        var_dump($response);
    }

}