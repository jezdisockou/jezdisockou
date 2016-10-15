<?php

namespace App\Presenters;

use App\Forms;
use Nette;
use Nette\Application\UI\Form;
use App\Model;
use Tracy\Debugger;

use App\Component\BiletoApi;


class HomepagePresenter extends BasePresenter
{


	/** @var Forms\SearchFormFactory @inject */
	public $searchFormFactory;
	
	/** @var  BiletoApi @inject */
    public $biletoApi;



	/** @var  Model\GoogleMapsModel @inject */
	public $googleApi;

	/** @var  Model\BingMapsModel @inject */
	public $bingApi;

	public function renderDefault($results = array())
	{
		$this->template->results = false;
		//$this->testBiletoApi();

		if($results) {
			$this->template->results = true;


		/*	$route = $this->bingApi->getDistance(array($results['from'], $results['destination']));
			if ($route) {
				$route['title'] = 'Bing';
				//$route['cost'] = $route['distance']*$results['fuelCost']*$results['spotreba']/$results['passengers'];
				$data[] = $route;
			}

			$route = $this->googleApi->getVzdalenost($results['from'], $results['destination']);
			if ($route) {
			$route['title'] = 'Google';
			//$route['cost'] = $route['distance']*$results['fuelCost']*$results['spotreba']/$results['passengers'];
				$data[] = $route;
			}*/

			/*$route = $this->googleApi->getVzdalenost($results['from'], $results['destination']); // TODO: Bileto!!!*/
			//$biletoApi = new biletoApi();
			//$route = $biletoApi->getReturn();

			/*$new['title'] = 'Bileto';
			//$new['cost'] = $route['cena'];
			//$route['duration'] = $route->cas;
			//$route['distance'] = 0;
			$new['route'] = array();
			foreach($route->legs as $trat) {
				$train = $trat->type=='rail';
				foreach($trat->stations as $stanice) {
					if(!$train) { // TODO
						$locs[] = array($stanice->lat, $stanice->lng);
					} else {
						$new['route'][]=array($stanice->lat, $stanice->lng);
					}
				}
				if(!$train) {
					$part = $this->bingApi->getDistance($locs);
					$route['distance'] += $part['distance'];
					 $new['route'] = array_merge($new['route'], $part['route']);
				} else {
					$route['distance'] += distance($trat->from->lat, $trat->from->lng, $trat->to->lat, $trat->to->lng, 'K')*1000;
				}
			}*/
			//$data[] = $new;//

			//usort($data, "sortRoutes");
			//$this->testBiletoApi();

			$this->template->nemamNic = false;
			if (!isset($data))
				$this->template->nemamNic = true;
			else {
				$this->template->data = $data;
				Debuger:dump($this->template->data);
				}
		}

	}

	function distance($lat1, $lon1, $lat2, $lon2, $unit) {

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}

	private function sortRoutes($a, $b)
	{
		if($a['cost'] == $b['cost'])
			return 0;

		return ($a['cost'] < $b['cost']) ? -1 : 1;
	}

	/**
	 * Search form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSearchForm()
	{
		return $this->searchFormFactory->create(function () {
			$this->redirect('Homepage:' );
		});
	}


	public function createComponentSearch()
	{
		$form = new Form();
		$form->addText('from', 'Odkud:')
			->setRequired('Odkud chcete jet?');

		$form->addText('destination', 'Kam:')
			->setRequired('Kam chcete jet?');

		$form->addText('date', 'Datum')
			->setType('date');

		$form->addText('time', 'Čas')
			->setType('time');

		$form->addText('spotreba', 'Spotřeba')
			->setType('number')
			->setRequired('Zadejte prosím průměrnou spotřebu');

		$form->addText('fuelCost', 'Cena paliva')
			->setType('number')
			->setRequired('Kolik stojí benál?');

		$form->addText('passengers', 'Počet osob')
			->setType('number')
			->setRequired('Jedeš sám?');

		$form->addText('salary', 'Hodinový plat')
			->setType('number')
			->setRequired('Máš prostoje?');

		$form->addSubmit('send', 'Vyhledat');

		$form->onSuccess[] = array($this, 'searchFormSuccess');
		return $form;
	}

	public function searchFormSuccess($form, $values)
	{
		$data['from'] = $values['from'];
		$data['destination'] = $values['destination'];
		$data['date'] = isset($values['date'])? $values['date'] : '';
		$data['time'] = isset($values['time'])? $values['time'] : '';
		//Debugger::dump($data);
		$this->redirect('this', ['results' => $data]);
	}
	
	
	/*
	 * jenom test
	 */
	public function testBiletoApi()
	{
		$return = $this->biletoApi->getReturn(1, 2, 3);
		echo "\n<br>MOCNY TO RETURN";
		dump($return);
		die('<br>test');
	}
}