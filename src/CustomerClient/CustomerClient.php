<?php
/**
 * Created by PhpStorm.
 * User: patrik
 * Date: 2018-07-26
 * Time: 11:32
 */

namespace Patrik\CustomerClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CustomerClient extends Client
{

    /**
     * CustomerClient constructor.
     */
    public function __construct($config = [])
    {
        if ($config == [])
        {
            $config = include __DIR__ . '/../../api.php';
        }

        parent::__construct($config);
    }

    public function getCustomer($id)
    {
        try
        {
            $response = $this->request('GET', 'customer/' . $id);
            return ['status' => 'success', 'message' => json_decode($response->getBody()
                                    ->getContents(), true)];
        } catch (GuzzleException $e)
        {
            return ['status' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }
}
