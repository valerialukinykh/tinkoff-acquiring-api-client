<?php

use GuzzleHttp\Client;
use JustCommunication\TinkoffAcquiringAPIClient\API\GetStateRequest;
use JustCommunication\TinkoffAcquiringAPIClient\TinkoffAcquiringAPIClient;
use PHPUnit\Framework\TestCase;

class TinkoffAcquiringAPIClientTest extends TestCase
{
    public function testCallUndefinedMethod()
    {
        $options = [
            'terminalKey' => 'token'
        ];
        $client = new TinkoffAcquiringAPIClient($options);

        $this->expectException(BadMethodCallException::class);
        $client->callSomeUndefinedRequest(new GetStateRequest(123));
    }

    public function testCreateHttpClientWithDefault()
    {
        $options = [
            'terminalKey' => 'token'
        ];
        $client = new TinkoffAcquiringAPIClient($options);

        $this->assertEquals(10, $client->getHttpClient()->getConfig('timeout'));
    }

    public function testCreateHttpClientWithArray()
    {
        $options = [
            'terminalKey' => 'token',
            'httpClient' => [
                'timeout' => 20
            ]
        ];
        $client = new TinkoffAcquiringAPIClient($options);

        $this->assertEquals(20, $client->getHttpClient()->getConfig('timeout'));
    }

    public function testCreateHttpClientWithCustomHttpClient()
    {
        $httpClient = new Client([
            'timeout' => 15
        ]);
        $options = [
            'terminalKey' => 'token',
            'httpClient' => $httpClient
        ];

        $client = new TinkoffAcquiringAPIClient($options);
        $this->assertEquals(15, $client->getHttpClient()->getConfig('timeout'));

        $httpClient = new Client([
            'timeout' => 25
        ]);
        $options = [
            'terminalKey' => 'token'
        ];

        $client = new TinkoffAcquiringAPIClient($options);
        $this->assertEquals(10, $client->getHttpClient()->getConfig('timeout'));

        $client->setHttpClient($httpClient);
        $this->assertEquals(25, $client->getHttpClient()->getConfig('timeout'));
    }
}
