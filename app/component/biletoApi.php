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
		
		$returnJson = '{
  "Data": [
    {
      "Id": "7b635659-0fdf-4efa-a76d-f336dd6a5bbf",
      "Legs": [
        {
          "Id": "0a0dc17b-b841-45e4-be9e-5e86dafda325",
          "DepartureStationId": "b67a9ab3-9517-4e9e-91db-a2959b4e5463",
          "ConnectionId": "7b635659-0fdf-4efa-a76d-f336dd6a5bbf",
          "ConnectionSequence": 0,
          "DepartureStation": {
            "Id": "b67a9ab3-9517-4e9e-91db-a2959b4e5463",
            "Name": "Manchester (Train St.)",
            "CountryCode": "GB",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/London",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Greater Manchester",
            "AdminLevel2": "Greater Manchester",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 53.480759,
            "Lng": -2.242631,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "ArrivalStationId": "30af7be0-3d98-4ea0-a733-6959a1236a73",
          "ArrivalStation": {
            "Id": "30af7be0-3d98-4ea0-a733-6959a1236a73",
            "Name": "Paris (Train St.)",
            "CountryCode": "FR",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/Paris",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Île de France",
            "AdminLevel2": "Paris",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 48.881606,
            "Lng": 2.347197,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "DepartureAt": "2016-10-15T08:35:00+0100",
          "ArrivalAt": "2016-10-15T13:00:00+0100",
          "TripId": "68e1f7e2-0a5f-4980-9e47-478354a99922",
          "IsBuyable": true,
          "Status": {
            "Type": "ok",
            "Value": null,
            "CreatedAt": null
          },
          "Trip": {
            "Id": "68e1f7e2-0a5f-4980-9e47-478354a99922",
            "RouteId": "5fdc69a3-d259-449f-9e3d-241cafe72218",
            "ScheduleId": "4d3dfe65-edb5-4cdb-96a1-0a9bca4ca391",
            "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
            "Code": "Train3/4",
            "SeatRequired": false,
            "SeatAvailable": false,
            "IsBuyable": true,
            "Contingent": 80,
            "EnabledSeats": null,
            "VehicleId": null,
            "DepartureAt": "08:00:00",
            "DepartureTimezone": "Europe/London",
            "CreatedAt": "2016-10-15T01:05:48+0000",
            "UpdatedAt": "2016-10-15T01:05:48+0000",
            "DeletedAt": null,
            "Route": {
              "Id": "5fdc69a3-d259-449f-9e3d-241cafe72218",
              "Name": "Train3",
              "FullName": "Paris - Liverpool",
              "SeatRequired": false,
              "SeatAvailable": false,
              "IsBuyable": true,
              "Contingent": 80,
              "DefaultVehicleId": null,
              "DefaultEnabledSeats": null,
              "TicketMode": "standard",
              "BuyableMinutesBefore": 0,
              "VehicleCategoryId": "abfc7282-157d-4b9b-8877-a1071a4fd633",
              "OperatorId": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
              "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
              "FirstStationId": "30af7be0-3d98-4ea0-a733-6959a1236a73",
              "LastStationId": "7f042787-55af-43d2-ab82-4a0858d6477f",
              "CreatedAt": "2016-10-15T01:05:47+0000",
              "UpdatedAt": "2016-10-15T01:05:47+0000",
              "DeletedAt": null,
              "Trips": null,
              "VehicleCategory": {
                "Id": "abfc7282-157d-4b9b-8877-a1071a4fd633",
                "Abbr": null,
                "Name": "Rail",
                "Description": "Used for intercity or long-distance travel.",
                "Type": "rail",
                "TypeName": "rail",
                "DeletedAt": null
              },
              "Operator": {
                "Id": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
                "Name": "Magic Rails",
                "CreatedAt": "2016-03-03T15:08:43+0000",
                "UpdatedAt": "2016-03-03T15:08:43+0000",
                "DeletedAt": null
              },
              "FirstStation": null,
              "LastStation": null,
              "Facilities": [],
              "Pricelists": null
            },
            "Provider": null,
            "Operators": null,
            "Vehicle": null,
            "Facilities": null,
            "Events": null,
            "Schedule": null
          },
          "TripDate": "2016-10-15T00:00:00+0000",
          "TransitStopIDs": [
            "62b5f3ad-02f7-4e1a-90b7-d80590ffd8d9"
          ],
          "Distance": 0,
          "FreeSeatsCount": null,
          "OccupiedSeatsCount": null,
          "NotBuyableSeatsCount": null,
          "Connection": null,
          "TransitStops": null
        },
        {
          "Id": "a9818db0-4917-497d-a7d9-3e33989d5a0a",
          "DepartureStationId": "30af7be0-3d98-4ea0-a733-6959a1236a73",
          "ConnectionId": "7b635659-0fdf-4efa-a76d-f336dd6a5bbf",
          "ConnectionSequence": 1,
          "DepartureStation": {
            "Id": "30af7be0-3d98-4ea0-a733-6959a1236a73",
            "Name": "Paris (Train St.)",
            "CountryCode": "FR",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/Paris",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Île de France",
            "AdminLevel2": "Paris",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 48.881606,
            "Lng": 2.347197,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "ArrivalStationId": "a8c4222b-1b59-4789-b4b8-51b86a25c698",
          "ArrivalStation": {
            "Id": "a8c4222b-1b59-4789-b4b8-51b86a25c698",
            "Name": "Lyon (Train St.)",
            "CountryCode": "FR",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/Paris",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Rhône-Alpes",
            "AdminLevel2": "Rhône",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 45.764043,
            "Lng": 4.835659,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "DepartureAt": "2016-10-15T15:45:00+0200",
          "ArrivalAt": "2016-10-15T21:30:00+0200",
          "TripId": "204d396e-19ea-4e70-8c30-016dd7871fae",
          "IsBuyable": true,
          "Status": {
            "Type": "ok",
            "Value": null,
            "CreatedAt": null
          },
          "Trip": {
            "Id": "204d396e-19ea-4e70-8c30-016dd7871fae",
            "RouteId": "4294bb82-5f02-4b54-a93c-7cf891cf6728",
            "ScheduleId": "4d3dfe65-edb5-4cdb-96a1-0a9bca4ca391",
            "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
            "Code": "Train1/6",
            "SeatRequired": false,
            "SeatAvailable": false,
            "IsBuyable": true,
            "Contingent": 50,
            "EnabledSeats": null,
            "VehicleId": null,
            "DepartureAt": "14:00:00",
            "DepartureTimezone": "Europe/Brussels",
            "CreatedAt": "2016-10-15T01:05:48+0000",
            "UpdatedAt": "2016-10-15T01:05:48+0000",
            "DeletedAt": null,
            "Route": {
              "Id": "4294bb82-5f02-4b54-a93c-7cf891cf6728",
              "Name": "Train1",
              "FullName": "Madrid - Brusel",
              "SeatRequired": false,
              "SeatAvailable": false,
              "IsBuyable": true,
              "Contingent": 50,
              "DefaultVehicleId": null,
              "DefaultEnabledSeats": null,
              "TicketMode": "standard",
              "BuyableMinutesBefore": 0,
              "VehicleCategoryId": "abfc7282-157d-4b9b-8877-a1071a4fd633",
              "OperatorId": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
              "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
              "FirstStationId": "c5c760bb-6e36-443b-bf06-dec71cf15792",
              "LastStationId": "082d59ae-7779-4879-82ef-acaeb6cb9880",
              "CreatedAt": "2016-10-15T01:05:47+0000",
              "UpdatedAt": "2016-10-15T01:05:47+0000",
              "DeletedAt": null,
              "Trips": null,
              "VehicleCategory": {
                "Id": "abfc7282-157d-4b9b-8877-a1071a4fd633",
                "Abbr": null,
                "Name": "Rail",
                "Description": "Used for intercity or long-distance travel.",
                "Type": "rail",
                "TypeName": "rail",
                "DeletedAt": null
              },
              "Operator": {
                "Id": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
                "Name": "Magic Rails",
                "CreatedAt": "2016-03-03T15:08:43+0000",
                "UpdatedAt": "2016-03-03T15:08:43+0000",
                "DeletedAt": null
              },
              "FirstStation": null,
              "LastStation": null,
              "Facilities": [],
              "Pricelists": null
            },
            "Provider": null,
            "Operators": null,
            "Vehicle": null,
            "Facilities": null,
            "Events": null,
            "Schedule": null
          },
          "TripDate": "2016-10-15T00:00:00+0000",
          "TransitStopIDs": [],
          "Distance": 0,
          "FreeSeatsCount": null,
          "OccupiedSeatsCount": null,
          "NotBuyableSeatsCount": null,
          "Connection": null,
          "TransitStops": null
        },
        {
          "Id": "bcf99950-1792-4827-a2bc-827ee32fbba3",
          "DepartureStationId": "a8c4222b-1b59-4789-b4b8-51b86a25c698",
          "ConnectionId": "7b635659-0fdf-4efa-a76d-f336dd6a5bbf",
          "ConnectionSequence": 2,
          "DepartureStation": {
            "Id": "a8c4222b-1b59-4789-b4b8-51b86a25c698",
            "Name": "Lyon (Train St.)",
            "CountryCode": "FR",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/Paris",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Rhône-Alpes",
            "AdminLevel2": "Rhône",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 45.764043,
            "Lng": 4.835659,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "ArrivalStationId": "6f001dec-a510-4616-851a-31cc904cb5c4",
          "ArrivalStation": {
            "Id": "6f001dec-a510-4616-851a-31cc904cb5c4",
            "Name": "Firenze (Train St.)",
            "CountryCode": "IT",
            "IsTerminal": false,
            "IsSearchable": false,
            "Timezone": "Europe/Rome",
            "Type": "{rail}",
            "MinTransferTime": null,
            "OperationSince": null,
            "OperationUntil": null,
            "Code": null,
            "Location": null,
            "AdminLevel1": "Toscana",
            "AdminLevel2": "Firenze",
            "AdminLevel3": null,
            "CreatedAt": "2016-03-03T15:08:44+0000",
            "UpdatedAt": "2016-03-03T15:08:44+0000",
            "DeletedAt": null,
            "Lat": 43.76956,
            "Lng": 11.255814,
            "Facilities": null,
            "Places": null,
            "Routes": null,
            "Stops": null
          },
          "DepartureAt": "2016-10-16T08:00:00+0200",
          "ArrivalAt": "2016-10-16T13:30:00+0200",
          "TripId": "8797cd23-247f-4df9-9cd7-4bd5ccaf93fc",
          "IsBuyable": true,
          "Status": {
            "Type": "ok",
            "Value": null,
            "CreatedAt": null
          },
          "Trip": {
            "Id": "8797cd23-247f-4df9-9cd7-4bd5ccaf93fc",
            "RouteId": "3d90a879-e7d4-41db-9fa8-3a3726fb91c7",
            "ScheduleId": "4d3dfe65-edb5-4cdb-96a1-0a9bca4ca391",
            "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
            "Code": "Train5/1",
            "SeatRequired": false,
            "SeatAvailable": false,
            "IsBuyable": true,
            "Contingent": 350,
            "EnabledSeats": null,
            "VehicleId": null,
            "DepartureAt": "08:00:00",
            "DepartureTimezone": "Europe/Paris",
            "CreatedAt": "2016-10-15T01:05:48+0000",
            "UpdatedAt": "2016-10-15T01:05:48+0000",
            "DeletedAt": null,
            "Route": {
              "Id": "3d90a879-e7d4-41db-9fa8-3a3726fb91c7",
              "Name": "Train5",
              "FullName": "Lyon - Roma",
              "SeatRequired": false,
              "SeatAvailable": false,
              "IsBuyable": true,
              "Contingent": 350,
              "DefaultVehicleId": null,
              "DefaultEnabledSeats": null,
              "TicketMode": "standard",
              "BuyableMinutesBefore": 0,
              "VehicleCategoryId": "abfc7282-157d-4b9b-8877-a1071a4fd633",
              "OperatorId": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
              "ProviderId": "cb545492-b567-4eb3-81f3-0e1954c2f5c4",
              "FirstStationId": "a8c4222b-1b59-4789-b4b8-51b86a25c698",
              "LastStationId": "17626086-cbfa-4916-9c2f-0f60de16651f",
              "CreatedAt": "2016-10-15T01:05:47+0000",
              "UpdatedAt": "2016-10-15T01:05:47+0000",
              "DeletedAt": null,
              "Trips": null,
              "VehicleCategory": {
                "Id": "abfc7282-157d-4b9b-8877-a1071a4fd633",
                "Abbr": null,
                "Name": "Rail",
                "Description": "Used for intercity or long-distance travel.",
                "Type": "rail",
                "TypeName": "rail",
                "DeletedAt": null
              },
              "Operator": {
                "Id": "47cea2d4-601e-44c6-97e5-1e7001a961f8",
                "Name": "Magic Rails",
                "CreatedAt": "2016-03-03T15:08:43+0000",
                "UpdatedAt": "2016-03-03T15:08:43+0000",
                "DeletedAt": null
              },
              "FirstStation": null,
              "LastStation": null,
              "Facilities": [],
              "Pricelists": null
            },
            "Provider": null,
            "Operators": null,
            "Vehicle": null,
            "Facilities": null,
            "Events": null,
            "Schedule": null
          },
          "TripDate": "2016-10-16T00:00:00+0000",
          "TransitStopIDs": [
            "6e13bd21-f4f4-4dea-9844-a138529ed51e"
          ],
          "Distance": 0,
          "FreeSeatsCount": null,
          "OccupiedSeatsCount": null,
          "NotBuyableSeatsCount": null,
          "Connection": null,
          "TransitStops": null
        }
      ]
    }
  ],
  "Links": [
    {
      "rel": "next",
      "href": "https://api.bileto.zone/v1/connections?To=66d0f778-6690-4182-882b-30830a840bed&From=06dd92b5-0646-4e46-b1b0-76766bc3cba1&DateTime=2016-10-14T00%3A00%3A00&ResultsCount=1&Type=DepartureSince&FetchSeatCounts=0&Datetime=2016-10-15T07%3A35%3A01Z"
    },
    {
      "rel": "prev",
      "href": "https://api.bileto.zone/v1/connections?To=66d0f778-6690-4182-882b-30830a840bed&From=06dd92b5-0646-4e46-b1b0-76766bc3cba1&DateTime=2016-10-14T00%3A00%3A00&ResultsCount=1&Type=ArrivalUntil&FetchSeatCounts=0&Datetime=2016-10-15T11%3A59%3A59Z"
    }
  ]
}';
		
		return json_decode($returnJson);
		
	}
	
	
	public function getStops($idLeg = 0){
		$returnJson = '[
  {
    "Id": "c7e30411-daa5-4327-944c-63acc1d641c8",
    "TripId": "68e1f7e2-0a5f-4980-9e47-478354a99922",
    "StationId": "b67a9ab3-9517-4e9e-91db-a2959b4e5463",
    "Sequence": 2,
    "Distance": 0,
    "DepartureDay": 0,
    "ArrivalDay": 0,
    "DepartureAt": "2016-10-15T08:35:00+0100",
    "ArrivalAt": "2016-10-15T08:35:00+0100",
    "Timezone": "Europe/London",
    "Headsign": null,
    "ReversedDirection": false,
    "ArrivalPlatform": null,
    "DeparturePlatform": null,
    "Restriction": null,
    "UpdatedAt": "2016-10-15T02:11:26+0000",
    "DeletedAt": null,
    "Trip": null,
    "Station": {
      "Id": "b67a9ab3-9517-4e9e-91db-a2959b4e5463",
      "Name": "Manchester (Train St.)",
      "CountryCode": "GB",
      "Lat": 53.480759,
      "Lng": -2.242631,
      "Timezone": "Europe/London",
      "IsTerminal": false,
      "IsSearchable": false,
      "Type": [
        "rail"
      ],
      "MinTransferTime": null,
      "OperationSince": null,
      "OperationUntil": null,
      "AdminLevel1": "Greater Manchester",
      "AdminLevel2": "Greater Manchester",
      "AdminLevel3": null,
      "UpdatedAt": "2016-03-03T15:08:44+0000",
      "DeletedAt": null
    }
  },
  {
    "Id": "62b5f3ad-02f7-4e1a-90b7-d80590ffd8d9",
    "TripId": "68e1f7e2-0a5f-4980-9e47-478354a99922",
    "StationId": "9a4e4e70-82d2-4a4d-85c9-463838350704",
    "Sequence": 3,
    "Distance": 0,
    "DepartureDay": 0,
    "ArrivalDay": 0,
    "DepartureAt": "2016-10-15T10:45:00+0100",
    "ArrivalAt": "2016-10-15T10:45:00+0100",
    "Timezone": "Europe/London",
    "Headsign": null,
    "ReversedDirection": false,
    "ArrivalPlatform": null,
    "DeparturePlatform": null,
    "Restriction": null,
    "UpdatedAt": "2016-10-15T02:11:26+0000",
    "DeletedAt": null,
    "Trip": null,
    "Station": {
      "Id": "9a4e4e70-82d2-4a4d-85c9-463838350704",
      "Name": "London (Train St.)",
      "CountryCode": "GB",
      "Lat": 51.507351,
      "Lng": -0.127758,
      "Timezone": "Europe/London",
      "IsTerminal": false,
      "IsSearchable": false,
      "Type": [
        "rail"
      ],
      "MinTransferTime": null,
      "OperationSince": null,
      "OperationUntil": null,
      "AdminLevel1": "London",
      "AdminLevel2": "London",
      "AdminLevel3": null,
      "UpdatedAt": "2016-03-03T15:08:44+0000",
      "DeletedAt": null
    }
  },
  {
    "Id": "839a224a-7527-4145-89e9-37d30c9cf5c7",
    "TripId": "68e1f7e2-0a5f-4980-9e47-478354a99922",
    "StationId": "30af7be0-3d98-4ea0-a733-6959a1236a73",
    "Sequence": 4,
    "Distance": 0,
    "DepartureDay": 0,
    "ArrivalDay": 0,
    "DepartureAt": "2016-10-15T14:00:00+0200",
    "ArrivalAt": "2016-10-15T14:00:00+0200",
    "Timezone": "Europe/Paris",
    "Headsign": null,
    "ReversedDirection": false,
    "ArrivalPlatform": null,
    "DeparturePlatform": null,
    "Restriction": null,
    "UpdatedAt": "2016-10-15T02:11:26+0000",
    "DeletedAt": null,
    "Trip": null,
    "Station": {
      "Id": "30af7be0-3d98-4ea0-a733-6959a1236a73",
      "Name": "Paris (Train St.)",
      "CountryCode": "FR",
      "Lat": 48.881606,
      "Lng": 2.347197,
      "Timezone": "Europe/Paris",
      "IsTerminal": false,
      "IsSearchable": false,
      "Type": [
        "rail"
      ],
      "MinTransferTime": null,
      "OperationSince": null,
      "OperationUntil": null,
      "AdminLevel1": "Île de France",
      "AdminLevel2": "Paris",
      "AdminLevel3": null,
      "UpdatedAt": "2016-03-03T15:08:44+0000",
      "DeletedAt": null
    }
  }
]';
		
		$stops = json_decode($returnJson);
		return $stops;
		
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
		
		$json = json_decode($returnJson);
		dump($json);
		return $json[0]->Prices->userPrice->amount;
		
	}
	
	public function getReturn(){
		echo "\n<br>RETURN---";
		$con = $this->getConnections();
		
		$connection = $con->Data[0];
		dump($connection);
		
		
		
		$trasaAll = new \stdClass();
		$trasaAll->id = $connection->Id;
		$trasaAll->cena = 0;
		
		$countLeg = count($connection->Legs)-1;
		foreach ($connection->Legs as $key => $leg) {
			$trasa = new \stdClass();
			$trasa->price = $this->getPrices($connection->Id);
			$trasaAll->cena += $trasa->price;
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
//				echo "\n<br>STATION";
//				dump($station);
//				die('<br>sfs');
				$legStation = new \stdClass();
				$legStation->name = $stationDetail->Name;
				$legStation->lat = $stationDetail->Lat;
				$legStation->lng = $stationDetail->Lng;
				$trasa->stations[] = $legStation;
			}
			
			
			$trasaAll->legs[$leg->Id] = $trasa;
		}
		dump($trasaAll);
		
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
		
	
}
