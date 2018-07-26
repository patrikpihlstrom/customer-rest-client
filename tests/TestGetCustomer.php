<?php
/**
 * Created by PhpStorm.
 * User: patrik
 * Date: 2018-07-26
 * Time: 11:35
 */


use Patrik\CustomerClient\CustomerClient;
use PHPUnit\Framework\TestCase;

class TestGetCustomer extends TestCase
{
    /** @var CustomerClient */
    private $_client;

    public function setUp()
    {
        $this->_client = new CustomerClient();
        parent::setUp();
    }

    public function testGetCustomerById()
    {
        $customer = $this->_client->getCustomer(100005);
        $this::assertArrayHasKey('status', $customer);
        $this::assertEquals($customer['status'], 'success');
    }

    public function testGetCustomerNotFound()
    {
        $customer = $this->_client->getCustomer(-1);
        $this::assertArrayHasKey('status', $customer);
        $this::assertEquals($customer['status'], 500);
    }
}