<?php

namespace App\Support;

use App\Contracts\Support\HttpClientInterface;
use App\Exceptions\HttpClientException;
use GuzzleHttp\Client;

final class HttpClient implements HttpClientInterface
{
    /** @var \GuzzleHttp\Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get(string $url): array
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            throw HttpClientException::create("Failed to get resource {$url}", $e);
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
