<?php

namespace App\Services;

use GuzzleHttp\Client;

final class NewsApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('NEWS_BASE_URI')]);
    }

    public function getNewsByTheme(string $theme, int $page = 1)
    {
        $uri = 'q=' . $theme . '&page=' . $page . '&';

        return $this->getRequest($uri);
    }

    private function getRequest(string $uri)
    {
        $response = $this->client->request('GET',  'everything?' . $uri . 'apiKey=' . env('NEWS_API_KEY'), [
            'headers' => [
                'Accept'        => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());
    }
}
