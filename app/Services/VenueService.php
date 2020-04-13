<?php

namespace App\Services;

class VenueService implements VenueServiceInterface
{
    public function __construct($clientId, $clientSecret)
    {
        $this->foursquare = new \FoursquareApi($clientId, $clientSecret);
    }

    public function getData($location)
    {
        // Searching for venues nearby Japan Cities
        $endpoint = 'venues/search';

        // Prepare parameters
        $params = [
          'near' => "$location",
          'limit' => 12,
          // 'categoryId'=> '4deefb944765f83613cdba6e' //Historic Site
      ];

        // Perform a request to a public resource
        $response = $this->foursquare->GetPublic($endpoint, $params);

        return (array) json_decode($response);
    }
}
