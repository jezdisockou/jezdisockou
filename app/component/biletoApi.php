<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Component;

/**
 * Description of biletoApi
 *
 * @author zahajsky
 */
class biletoApi {
	const BASE_URI = 'api.bileto.zone/v1';
	public $createToken = ['url' => '/oauth/auth',
			'method'=>'GET',
			'param'=>[
					'grant_type' => 'client_credentials',
					'client_id' => '30d8af17-eac7-4189-ade6-633ba998cb08:d4efdbf2-6b1c-4cfb-8183-6828a602a03b',
					'client_secret' => '4d4d5288-5070-430a-85d9-f92953aa637a',
			]];
	
	
	public function createToken(){
				
	}
	
	public function getConnections(){
		
		$returnJson = '	{
			"Data": [
				{
					"Id": "5fb126e8-c97e-41b2-b989-a0e73070f87e",
					"Legs": [
						{
							"Id": "67e550a3-4d4d-4018-8655-2d016aab2fa9",
							"ConnectionSequence": 0,
							"DepartureStation": {
								"Id": "fa0a9d05-9670-4fc1-a06f-0a5b7ff4bc94",
								"Name": "Praha, \u00daAN Florenc",
								"CountryCode": "CZ",
								"Timezone": "Europe\/Prague",
								"Lat": 50.089378,
								"Lng": 14.440919
							},
							"ArrivalStation": {
								"Id": "d8d5afbf-7e01-4374-9712-5c6538144e55",
								"Name": "Jesen\u00edk, aut.n\u00e1dr.",
								"CountryCode": "CZ",
								"Timezone": "Europe\/Prague",
								"Lat": 50.226345,
								"Lng": 17.207277
							},
							"DepartureAt": "2016-10-15T08:35:00+0200",
							"ArrivalAt": "2016-10-15T13:00:00+0200",
							"IsBuyable":true
						}
					]
				}
			],
			"Links": [
				{
					"rel": "next",
					"href": "https:\/\/api.bileto.zone\/v1\/connections"
				},
				{
					"rel": "prev",
					"href": "https:\/\/api.bileto.zone\/v1\/connections"
				}
			]
		}';
		
		return json_decode($returnJson);
		
	}
	
	
	public function getStops($idLeg = 0){
		$returnJson = '[
			{
				"Id": "22655519-a1b4-49d3-94e7-1993d3bf65b8",
				"Sequence": 0,
				"Distance": 0,
				"DepartureAt": "2016-06-16T12:30:00+0200",
				"ArrivalAt": "2016-06-16T12:30:00+0200",
				"Timezone": "Europe/Prague",
				"Station": {
					"Id": "5daf6e5d-f592-4c5b-86de-148f725ba3a5",
					"Name": "Praha, Nádraží Holešovice",
					"CountryCode": "CZ",
					"Lat": 50.11031,
					"Lng": 14.441406,
					"Timezone": "Europe/Prague"
				}
			}
		]';
		
		
		return json_decode($returnJson);
		
	}
	
	public function getPrices($connectionId = 0){
		$returnJson = '	[
			{
				"ConnectionId": "a623b789-e5f2-4cac-903f-bb93e671b984",
				"FreeSeatsCount": 54,
				"Prices": {
					"userPrice": {
						"amount": 230,
						"currency": "CZK"
					}
				},
				"ExpiresAt": "2016-10-14T20:56:59+0000"
			}
		]';
		
		
		return json_decode($returnJson);
		
	}
	
}
