<?php

if (!function_exists('getJsonFilesLocation')) {
    function getJsonFilesLocation()
    {
        $filesLocation = database_path('json_files/');

        return $filesLocation;
    }
}
if (!function_exists('getData')) {
    function getData()
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

            // Decode the JSON contents into an associative array
            $jsonData[$fileName] = json_decode($jsonContents, true);
        }

        return collect($jsonData);
    }
}
