<?php

// app/Services/GeoCoderInterface.php
namespace App\Services;

interface GeoCoderInterface {
    public function getCoordinates(string $location): array;
}



?>
