<?php

namespace Runator\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ivory\HttpAdapter\CurlHttpAdapter;
use Geocoder\Provider\GoogleMaps;
use Endroid\OpenWeatherMap\Client;

class DefaultController extends Controller
{
    private $openWeatherApiKey = 'dfd80d7325a44f089a8f55ca3c577b0f';

    public function indexAction($name)
    {
        return $this->render('RunatorWeatherBundle:Default:index.html.twig', array('name' => $name));
    }

    public function weatherAction(Request $request)
    {
        $date = $request->query->has('date') ? $request->query->get('date') : date('Y-m-d');
        $hour = $request->query->has('hour') ? $request->query->get('hour') : '12:00:00';
        $lat  = $request->query->has('lat') ? $request->query->get('lat') : '39.4621944';
        $lon  = $request->query->has('lon') ? $request->query->get('lon') : '-0.3274952';

        $curl     = new CurlHttpAdapter();
        $geocoder = new GoogleMaps($curl);

        $addressCollection = $geocoder->reverse($lat, $lon);
        $adress            = $addressCollection->first();

        $city        = $adress->getLocality();
        $country     = $adress->getCountry()->getName();
        $countryCode = $adress->getCountry()->getCode();
        $region      = $adress->getSubLocality();

        $client        = new Client($this->openWeatherApiKey);
        $weatherObject = $client->getWeather($city . ',' . $countryCode);
        $weather       = $weatherObject->weather[0]->main;

        $arrayJson = array(
            'date'    => $date,
            'hour'    => $hour,
            'lat'     => $lat,
            'lon'     => $lon,
            'weather' => $weather,
            'city'    => $city,
            'country' => $country,
            'region'  => $region,
        );

        return new Response(json_encode($arrayJson));
    }
}
