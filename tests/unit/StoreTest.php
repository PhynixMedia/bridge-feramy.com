<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;
use Phynixmedia\Store\Core\StoreConstants;

class StoreTest extends TestCase
{

    protected $store;
    protected $params;
    protected $token = '';  // set via getenv('FERAMY_TOKEN') when running locally

    protected function setUp() :void
    {
        $this->params = [
            'publish'   => getenv('FERAMY_PUBLISH') ?: '',
            'secret'    => getenv('FERAMY_SECRET') ?: ''
        ];
        $this->store = new Store();
    }

    protected function tearDown() :void
    {
        $this->store = null;
    }

//    public function testGetConfig()
//    {
//        $response = $this->store::config($this->params);
//
//        $this->assertNotNull($response);
//
//        $this->assertNotNull($response->getToken());
//
////        var_dump($response->getToken());
//    }

    public function testRequestProducts(){

        $products = $this->store->load($this->token, StoreConstants::PRODUCTS_BRIDGE);
        $response = $products->all([
            'companyid'     => 1,
            'outletid'      => 0 // optional
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }



}
