<?php

namespace App\Service ;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Routing\Annotation\Route;

class GeoAPI{
    public function getInfo($codeCity,$nameCity, HttpClientInterface $httpClient){
        $response = $httpClient->request('GET', 'https://geo.api.gouv.fr/communes?codePostal='.$codeCity.'&nom='.$nameCity);
        return $response->toArray();
    }
}