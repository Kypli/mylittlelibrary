<?php

// Connection API Client
function connectionApiBetaSerie() {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.betaseries.com/']);
    return $client;
}

// Récupération du content
function connectionApi(string $method, string $path, int $id) {
    $client = connectionApiBetaSerie();
    $uri = 'https://api.betaseries.com/';
    $uri .= $path;
    $uri .= '?key=f6eed13c4f16';
    $uri .= "&id=".$id;
    $response = $client->request($method, $uri);
    $content = json_decode($response->getBody()->getContents(), true);
    return $content;
}

// Détails du content
function getDetailContent($content) {

    $result=[];
    foreach($content as $cle1 => $valeur1)
    {
        foreach ($valeur1 as $cle2=>$valeur2)
        {

            if ($cle2 == "seasons"){
                break;
            }
            if ($cle2 == "id"){
                $result[$cle2] = $valeur2;
            }
            if ($cle2 == "title"){
                $result[$cle2] = $valeur2;
            }
            if ($cle2 == "description"){
                $result[$cle2] = $valeur2;
            }

        }
    }
    return $result;
}