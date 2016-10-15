<?php
/**
 * Created by PhpStorm.
 * User: balach
 * Date: 15.10.2016
 * Time: 2:03
 */

namespace App\Model;


use Tracy\Debugger;

class GoogleMapsModel
{
    const
        API_KEY =  'AIzaSyAB6Kfd_UaS7rJ7zcUI3rYcAeSlvm2oEwk',
        //BASE_URL = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins={boda}&destinations={bodb}&sensor=false&key={key}';
        BASE_URL = 'https://maps.googleapis.com/maps/api/directions/json?origin={boda}&destination={bodb}&key={key}';

    public function getVzdalenost($boda, $bodb)
    {
        $reguest = self::BASE_URL;
        $reguest = str_replace('{boda}', rawurlencode($boda), $reguest);
        $reguest = str_replace('{bodb}', rawurlencode($bodb), $reguest);
        $reguest = str_replace('{key}', self::API_KEY, $reguest);
        $result = json_decode(file_get_contents($reguest));
        if($result->status == 'ZERO_RESULTS')
            return false;
        $output['distance'] = $result->routes[0]->legs[0]->distance->value;
        $output['duration'] = $result->routes[0]->legs[0]->duration->value;
        $output['route'][] = array($result->routes[0]->legs[0]->steps[0]->start_location->lat, $result->routes[0]->legs[0]->steps[0]->start_location->lng);

        foreach ($output['duration'] = $result->routes[0]->legs[0]->steps as $point)
        {
            $output['route'][] = array($point->end_location->lat, $point->end_location->lng);
        }

        return $output;
    }
}