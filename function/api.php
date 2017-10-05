<?php

function connectionApiBetaSerie() {

    $client = new GuzzleHttp\Client([
            'base_uri' => 'https://api.betaseries.com/',
        ]
    );
    return $client;
}


function connectionApiBetaSerieId(string $method, string $path, string $id) {

    $client = connectionApiBetaSerie();

    $uri = $path;
    $uri .= '?key=f6eed13c4f16';
    $uri .= $id;

    $response = $client->request($method, $uri);
    $content = $response->getBody()->getContents();
    return $content;
}