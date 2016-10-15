<?php
/**
 * Created by PhpStorm.
 * User: balach
 * Date: 15.10.2016
 * Time: 2:24
 */

namespace App\Model;


use Nette\Neon\Exception;
use Tracy\Debugger;

class BingMapsModel
{
    const
        API_KEY = 'Aib1VkqsAtlReCj8X5T5QyO2paDb5KI28lTsj6Mht_nWWYBwKBQBnPaoAiPsU5g0',
        BASE_URL = 'http://dev.virtualearth.net/REST/v1/Routes';

    public function getDistance($waypoints, $optimize='time')
    {
        $routePathOutput = "Points";
        $distanceUnit = "km";
        $travelMode = "Driving";
        // Construct final URL for call to Routes API
        $routesURL = self::BASE_URL."/".$travelMode."?";
        foreach($waypoints as $key => $waypoint){
            if($key != 0) {
                $routesURL = $routesURL.'&';
            }
            if(count($waypoint) > 1) {
                $routesURL = $routesURL . 'wp.' . $key . '=' . str_ireplace(" ", "%20", $waypoint[0]).',' . str_ireplace(" ", "%20", $waypoint[1]);
            } else {
                $routesURL = $routesURL . 'wp.' . $key . '=' . str_ireplace(" ", "%20", $waypoint);
            }
        }
        $routesURL = $routesURL."&optimize=".$optimize."&routePathOutput=".$routePathOutput
            ."&distanceUnit=".$distanceUnit."&output=json&key=".self::API_KEY;
        $headers = get_headers($routesURL);
        if ($headers[0]=='HTTP/1.1 404 Not Found')
            return false;

        $result = json_decode(file_get_contents($routesURL))->resourceSets;

        Debugger::dump($result);

        $output['distance'] = $result[0]->resources[0]->travelDistance;
        $output['duration'] = $result[0]->resources[0]->travelDuration;
        $output['durationTraffic'] = $result[0]->resources[0]->travelDurationTraffic;
        $output['route'] = $result[0]->resources[0]->routePath->line->coordinates;

        return $output;
    }

}