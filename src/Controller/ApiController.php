<?php

namespace App\Controller;

use App\Service\GeoAPI;
use App\Service\EtablissementPublicApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api", methods={"GET", "HEAD"})
     */
    public function index(Request $request, GeoAPI $apiGeo, HttpClientInterface $httpClient, EtablissementPublicApi $publicApi)
    {
        $nameCity = $request->query->get("name");
        $codeCity = $request->query->get("codeP");
        $cityInfo = $apiGeo->getInfo($codeCity,$nameCity, $httpClient);
        $cityEtab = $publicApi->getSomeBuilding($codeCity, $httpClient);
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
            'nameCity'=> $nameCity,
            'codeCity'=> $codeCity,
            'cityInfo' => $cityInfo,
            'cityEtab'=> $cityEtab
        ]);
    }
}
