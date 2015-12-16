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

        $adress = $geocoder->reverse($lat, $lon);
        echo $adress->first()->getLocality();

        return new Response('Response.');
    }
}
