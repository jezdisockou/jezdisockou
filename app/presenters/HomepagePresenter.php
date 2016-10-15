<?php

namespace App\Presenters;

use App\Forms;
use Nette;
use Nette\Application\UI\Form;
use App\Model;
use Tracy\Debugger;

use App\Component\biletoApi;


class HomepagePresenter extends BasePresenter
{
	private $bingKey = 'Aib1VkqsAtlReCj8X5T5QyO2paDb5KI28lTsj6Mht_nWWYBwKBQBnPaoAiPsU5g0';

	/** @var Forms\SearchFormFactory @inject */
	public $searchFormFactory;

	public function renderDefault($results = array())
	{
		/*$query = 'http://dev.virtualearth.net/REST/v1/Locations/US/NY/10007/New York/291 Broadway';
		// Store the query in a PHP variable (assuming you obtained it from the form)
		$query = str_ireplace(" ","%20",$query);
		// Construct the final Locations API URI
		$findURL = $query."?output=json&key=".$this->bingKey;
		// get the response from the Locations API and store it in a string
		$output = file_get_contents($findURL);*/

		$this->testBiletoApi();
		
		Debuger:dump($results);
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
		$this->redirect('this', ['results' => array($data)]);
	}
	
	
	/*
	 * jenom test
	 */
	public function testBiletoApi(){
		$biletoApi = new biletoApi();
		
		$connections = $biletoApi->getConnections();
		dump($connections);
		
		$stops = $biletoApi->getStops();
		dump($stops);
		
		$prices = $biletoApi->getPrices();
		dump($prices);
		
		$return = $biletoApi->getReturn();
		
		die('<br>test');
		
		
		
	}
}