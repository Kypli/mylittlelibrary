<?php

///////////////
/// BETA SERIE
///////////////

// Connection API Client
function connectionApiBaseUriBetaSerie() {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.betaseries.com/']);
    return $client;
}

// Récupération du content
function connectionApiBetaSerie(string $method, int $id) {
    $client = connectionApiBaseUriBetaSerie();
    $uri = 'https://api.betaseries.com/';
    $uri .= 'shows/display?key=f6eed13c4f16&id='.$id;
    $response = $client->request($method, $uri);
    $content = json_decode($response->getBody()->getContents(), true);
    return $content;
}

// Détails du content
function getDetailContentBetaSerie($content) {
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

///////////////
/// LAST.FM
///////////////

// Connection API Client
function connectionApiBaseUriLastFm() {
    $client = new GuzzleHttp\Client(['base_uri' => 'http://ws.audioscrobbler.com/']);
    return $client;
}

// Récupération du content
function connectionApiLastFm(string $method,string $artist) {
    $client = connectionApiBaseUriLastFm();
    $uri = 'http://ws.audioscrobbler.com/';
    $uri .= '2.0/?method=album.getinfo&api_key=ab6e8bf2ece39198978fe3b45dd2cca6&artist='.$artist.'&album=Believe&format=json';
    $response = $client->request($method, $uri);
    $content = json_decode($response->getBody()->getContents(), true);
    return $content;
}

function getDetailContentLastFm($content) {
    $result=[];
    foreach($content as $cle1 => $valeur1)
    {
        foreach ($valeur1 as $cle2=>$valeur2)
        {

//            if ($cle2 == "url"){
//                break;
//            }
            if ($cle2 == "name"){
                $result[$cle2] = $valeur2;
            }
            if ($cle2 == "artist"){
                $result[$cle2] = $valeur2;
            }
        }
    }
    return $result;
}


