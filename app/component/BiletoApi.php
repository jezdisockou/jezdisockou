<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Component;

use Nette\Caching\Cache;

/**
 * Description of BiletoApi
 *
 * @author zahajsky
 */
class BiletoApi extends \Nette\Object {
	const BASE_URI = 'https://api.bileto.zone/v1';
	static public $createToken = ['url' => '/oauth/auth',
			'method'=>'POST',
			'postParams'=>[
					'grant_type' => 'client_credentials',
					'client_id' => '626d6b2c-454d-4274-b9cb-f61aaef709f9:f878b696-21e3-42db-a0ab-01ce66f97ced',
					'client_secret' => '9d9ce70f-7247-4ba7-80e0-dec2177dfe2d',
			]];
	
	static public $connections = ['url' => '/connections',
			'method'=>'GET',
			'getParams'=>[
					'ResultsCount' => '1',
					'From' => '0',
					'To' => '0',
					'Datetime' => '0',
			],
			'headers' => ['Authorization' => 0]
			];
	
	static public $stops = ['url' => '/legs/',
			'endUrl' => '/stops',
			'middleParam' => 0,
			'method'=>'GET',
			'headers' => ['Authorization' => 0]
			];
	
	static public $prices = ['url' => '/prices',
			'method'=>'POST',
			'headers' => ['Authorization' => '0',
					'Content-Type' => 'application/json'
			],
			'postParams'=> '	{
			"Currency": "CZK",
			"Items": [
				{
					"ItemType": "connection",
					"ItemData": null,
					"ConnectionId": "0"
				}
			],
			"Passengers": [
				{
					"Id": "29bffd28-1cca-40c1-ae29-f5f25ff59db2",
					"Age": 21,
					"Cards": [ "93fe3ff7-810b-415f-b935-21cfb6dd2ef4" ]
				}
			],
			"CategoryGroups": [ 11 ],
			"PortalId": "30d8af17-eac7-4189-ade6-633ba998cb08"
		}'
			];
	
	
	
	
	
	/** @var Nette\Caching\Cache*/
   private $cache;
   
	 public function __construct(Cache $cache){
		 $this->cache = $cache;
		 
	 }
	
	public function getToken(){
		//$this->cache->remove('token');
		$items =$this->cache->load('token');
		$items = !is_null($items)? (object) $items: null;
		if(isset($items) && $items->expires > new \Nette\Utils\DateTime()){
			return $items->access_token;
		} else {
			$response = $this->callApi(self::$createToken);
			$cacheToken = ['access_token' => $response->access_token, 'expires' => new \Nette\Utils\DateTime('+1hour')];
			$this->cache->save('token', $cacheToken);
			return $response->access_token;
			
		}
		
				
	}
	
	/**
	 * 
	 * @param string $fromId
	 * @param string $toId
	 * @param string $date 2016-10-16T00:00:00
	 * @return type
	 */
	public function getConnections($fromId, $toId, $date){
		$fromId = '06dd92b5-0646-4e46-b1b0-76766bc3cba1';
		$toId = '66d0f778-6690-4182-882b-30830a840bed';				
		$date = '2016-10-16T00:00:00';
		
		$token = $this->getToken();
		$options = self::$connections;
		
		$options['getParams']['From'] = $fromId;
		$options['getParams']['To'] = $toId;
		$options['getParams']['Datetime'] = $date;
		
		$options['headers']['Authorization'] = $token;
		
		$result = $this->callApi($options);
		
		return $result;
		
	}
	
	
	public function getStops($idLeg = 0){
		$token = $this->getToken();
		
		$options = self::$stops;
		$options['middleParam'] = $idLeg;
		$options['headers']['Authorization'] = $token;

		$result = $this->callApi($options);		
		
		return $result;
		
	}
	
	public function getPrices($connectionId){
		$token = $this->getToken();
		$options = self::$prices;
		$options['headers']['Authorization'] = $token;
		$body = json_decode($options['postParams']);
		$body->Items[0]->ConnectionId = $connectionId;
		
		$options['postParams'] = json_encode($body);
		$result = $this->callApi($options);
		
		return $result;
		
	}
	
	public function getReturn($fromId, $toId, $date){
		
		$con = $this->getConnections($fromId, $toId, $date);
		
		if (!property_exists($con, "Data") ||(property_exists($con, "Data") && !(isset($con->Data[0])))){
			return false;
		}
		$connection = $con->Data[0];
		
		$trasaAll = new \stdClass();
		$trasaAll->id = $connection->Id;
		
		$trasaAll->cena = $this->getPrices($connection->Id);
		
		$countLeg = count($connection->Legs)-1;
		foreach ($connection->Legs as $key => $leg) {
			$trasa = new \stdClass();
			//$trasa->price = $this->getPrices($connection->Id);
			//$trasaAll->cena += $trasa->price;
			if($key==0){
				$trasaAll->od = \DateTime::createFromFormat(\DateTime::ISO8601, $leg->DepartureAt);
			}
			if($key == $countLeg){
				$trasaAll->do = \DateTime::createFromFormat(\DateTime::ISO8601, $leg->ArrivalAt);
				$timeDiff = $trasaAll->do->diff($trasaAll->od);
				
				$trasaAll->cas = $this->getFormatTimeDiff($timeDiff);
				
			}
			
			$trasa->from = new \stdClass();
			$trasa->from->name = $leg->DepartureStation->Name;
			$trasa->from->lat = $leg->DepartureStation->Lat;
			$trasa->from->lng = $leg->DepartureStation->Lng;
			$trasa->to = new \stdClass();
			$trasa->to->name = $leg->ArrivalStation->Name;
			$trasa->to->lat = $leg->ArrivalStation->Lat;
			$trasa->to->lng = $leg->ArrivalStation->Lng;
			
			$stations = $this->getStops($leg->Id);
			$trasa->stations = [];
			foreach ($stations as $st => $station){
				$stationDetail = $station->Station;
				$legStation = new \stdClass();
				$legStation->name = $stationDetail->Name;
				$legStation->lat = $stationDetail->Lat;
				$legStation->lng = $stationDetail->Lng;
				$trasa->stations[] = $legStation;
				$trasa->type = $stationDetail->Type[0];
			}
			$trasaAll->legs[$leg->Id] = $trasa;
		}
		return $trasaAll;
		
	}
	
	public function getFormatTimeDiff($timeDiff){
		$total_days = $timeDiff->days;
		$hours      = $timeDiff->h;
		if ($total_days !== FALSE) {
			$hours += 24 * $total_days;
		}
		$minutes    = $timeDiff->i;
		return sprintf('%02d:%02d', $hours, $minutes);
	}
	
	public function callApi($options){
		$curl = curl_init();
		
		 if (FALSE === $curl)
        throw new \Exception('failed to initialize');
		
		$url = self::BASE_URI.$options['url'];
		if(isset($options['endUrl']) && isset($options['middleParam'])){
			$url .= $options['middleParam'].$options['endUrl'];
		}
		
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		if($options['method']== 'POST'){
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $options['postParams']);
		} elseif (isset($options['getParams'])){
			$countParam = count($options['getParams'])-1;
			$url .='?';
			foreach($options['getParams'] as $key => $param){
				$url .= $key.'='.$param;
				if($key!=$countParam){
					$url .= '&';
				}
			}
		}
		
		if(isset($options['headers'])){
			$headers = [];
			foreach($options['headers'] as $key => $value){
				$headers[] = $key.": ".$value;
			}
			curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
		}
		
		curl_setopt($curl, CURLOPT_URL, $url);
		
		$curl_response = curl_exec($curl);
		 if (FALSE === $curl_response)
        throw new \Exception(curl_error($curl), curl_errno($curl));
//        dump(curl_error($curl), curl_errno($curl));
		if ($curl_response === false) {
			$info = curl_getinfo($curl);
			curl_close($curl);
		}
		
		$response = json_decode($curl_response);
		return $response;
		
	}
	
}
