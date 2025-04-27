<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    //


    public function index()
    {

        return view('Anime.search');


    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $results = [];
    
        if ($query) {
            $response = Http::get("https://api.jikan.moe/v4/anime", [
                'q' => $query,
                'limit' => 10,
            ]);
    
            $results = $response->json('data');
        }
    
        return view('anime.search', compact('results', 'query'));
        }




    public function seasonal(Request $request)
    {
        //年数取得
        $year = Carbon::now()->year;

        $year = $request->input('year',$year);
        $season = $request->input('season', 'spring');
        $page = $request->input('page', 1);
    
        $response = Http::get("https://api.jikan.moe/v4/seasons/{$year}/{$season}", [
            'page' => $page,
            'limit' => 12, // カード3列×4行くらいに
        ]);
    
        $results = $response->json('data');
        $pagination = $response->json('pagination');


/*
        //キャラ検索
        $characters = [];

            // キャラ検索
            $response = Http::get("https://api.jikan.moe/v4/characters", [
                'q' => "カズマ",
                'limit' => 5,
            ]);
    
            $characters = $response->json('data');
        
    
*/


        return view('Anime.result', compact('results', 'year', 'season', 'page', 'pagination'));
    }
    
}
