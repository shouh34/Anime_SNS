<?php
namespace App\Services;
use Anitime;
use App\Services\AniInfomations;
use App\Services\Animation;
// app/Services/NominatimGeoCoder.php

use Illuminate\Support\Facades\Http;

class NominatimGeoCoder implements GeoCoderInterface {
    public function getCoordinates($query = "進撃の巨人",$page = 5): array
    {
        $response = Http::get("https://api.jikan.moe/v4/anime", [
            'q' => $query,
            'page' => $page,
            'limit' => 12,
        ]);
    
        if ($response->successful()) {
            $data = $response->json();
    
            return [
                'result' => $data['data'] ?? [],
                'pagination' => $data['pagination'] ?? [],
            ];
        }
    
        // 失敗時は空データを返す
        return [
            'result' => [],
            'pagination' => [],
        ];
    
    }
}

   
?>