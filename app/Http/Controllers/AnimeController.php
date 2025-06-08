<?php

namespace App\Http\Controllers;
use Anitime;
use App\Services\AniInfomations;
use App\Services\Animation;
use App\Services\AnitimeGenerate; // ← この use がない or 間違っている
use App\Services\GeoCoderInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    //
    protected $geoCoder;

    public function __construct(GeoCoderInterface $geoCoder)
    {
        // GeoCoderInterfaceにバインドされた実装（NominatimGeoCoder）が自動的に注入される
        $this->geoCoder = $geoCoder;
    }
    
    public function index()
    {

        return view('Anime.search');


    }





    //検索ボックスの処理
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




     return view('Anime.result', compact('results', 'year', 'season', 'page', 'pagination'));
    }
    
}
