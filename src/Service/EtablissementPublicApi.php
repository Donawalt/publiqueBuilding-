<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class EtablissementPublicApi
{
    public function getSomeBuilding($codeCity, HttpClientInterface $httpClient){
        $response = $httpClient->request('GET', 'https://etablissements-publics.api.gouv.fr/v3/communes/'.$codeCity.'/mairie');
        return $response->toArray();
    }
}