<?php

namespace Runator\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ivory\HttpAdapter\CurlHttpAdapter;
use Geocoder\Provider\GoogleMaps;

class DefaultController extends Controller
{
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

        $city    = $adress->getLocality();
        $country = $adress->getCountry()->getName();
        $region  = $adress->getSubLocality();

        $arrayJson = array(
            'date'    => $date,
            'hour'    => $hour,
            'lat'     => $lat,
            'lon'     => $lon,
            'city'    => $city,
            'country' => $country,
            'region'  => $region,
        );

        return new Response(json_encode($arrayJson));
    }
}
