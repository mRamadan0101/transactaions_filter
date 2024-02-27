<?php

namespace App\Services;

use App\Http\Resources\ProviderWResource;
use App\Http\Resources\ProviderXResource;
use App\Http\Resources\ProviderYResource;
use App\Repositories\DataProviderRepository;

class DataProviderService
{
    private $providers;

    public function __construct()
    {
        $location = getJsonFilesLocation();
        $jsonData = [];
        // Get all JSON files in the directory
        $jsonFiles = glob($location.'*.json');

        // Iterate over each JSON file
        foreach ($jsonFiles as $jsonFile) {
            $fileName = pathinfo($jsonFile, PATHINFO_FILENAME);

            // Read the contents of the JSON file
            $jsonContents = file_get_contents($jsonFile);
            $data = json_decode($jsonContents, true);
            // Decode the JSON contents into an associative array
            $this->providers[] = new DataProviderRepository($data, $fileName);
        }
    }

    public function getAllTransactions()
    {
        $transactions = [];
        foreach ($this->providers as $provider) {
            switch ($provider->getProviderName()) {
                case 'DataProviderW':
                    $transactions = array_merge($transactions,ProviderWResource::collection($provider->getTransactions())->resolve());
                    break;
                case 'DataProviderX':
                    $transactions = array_merge($transactions,ProviderXResource::collection($provider->getTransactions())->resolve());

                    break;
                case 'DataProviderY':
                    $transactions = array_merge($transactions,ProviderYResource::collection($provider->getTransactions())->resolve());

                    break;
                default:
                    // code...
                    break;
            }
        }

        return $transactions;
    }
}
