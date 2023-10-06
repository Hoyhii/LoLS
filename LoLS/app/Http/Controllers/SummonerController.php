<?php

namespace App\Http\Controllers;

use App\Models\Summoner;
use App\Http\Requests\StoreSummonerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class SummonerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isLoggedIn = auth()->check();
        $summoners = $user->summoner_names;
        $regions = [
            'euw1' => 'EUW',
            'eun1' => 'EUNE',
            'na1' => 'NA',
            'kr' => 'KR',
            'br1' => 'BR',
            'la1' => 'LAN',
            'la2' => 'LAS',
            'oc1' => 'OCE',
            'ru1' => 'RU',
            'tr1' => 'TR',
            'jp1' => 'JP',
            'ph2' => 'PH',
            'sg2' => 'SG',
            'tw2' => 'TW',
            'vn2' => 'VN',
        ];

        return Inertia::render('Summoner', [
            'summoners' => $summoners,
            'regions' => $regions,
            'isLoggedIn' => $isLoggedIn
        ]);
    }
    public function create()
    {
        $user = auth()->user();
        $summoners = $user->summoner_names;
        $currentPage = 'Add Summoner';
        $regions = [
            'euw1' => 'EUW',
            'eun1' => 'EUNE',
            'na1' => 'NA',
            'kr' => 'KR',
            'br1' => 'BR',
            'la1' => 'LAN',
            'la2' => 'LAS',
            'oc1' => 'OCE',
            'ru1' => 'RU',
            'tr1' => 'TR',
            'jp1' => 'JP',
            'ph2' => 'PH',
            'sg2' => 'SG',
            'tw2' => 'TW',
            'vn2' => 'VN',
        ];

        return Inertia::render('AddSummoner', [
            'summoners' => $summoners,
            'regions' => $regions,
            'currentPage'=> $currentPage,
        ]);
    }
    public function store(StoreSummonerRequest $request)
    {
        $data = request()->validate([
            'summoner_name' => 'required|string|max:255',
            'region' => 'required|string|max:10',
        ]);

        $region = $data['region'];

        $riotApiKey = env('RIOT_API_KEY');
        $username = urlencode($data['summoner_name']);

        $response = Http::get("https://{$region}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{$username}", [
            'api_key' => $riotApiKey,
        ]);
        $responseJson = $response->json();
        $summonerId = $responseJson["id"];

        $responsev2 = Http::get("https://{$region}.api.riotgames.com/lol/league/v4/entries/by-summoner/{$summonerId}", [
            'api_key' => $riotApiKey,
        ]);

        $userData = $responsev2->json();
        $tier = $userData[0]["tier"];
        $rank = $userData[0]["rank"];
        $wins = $userData[0]["wins"];
        $losses = $userData[0]["losses"];
        $games = $wins + $losses;

        //custom_order


        auth()->user()->summoner_names()->create([
            'summoner_name' => $data['summoner_name'],
            'region' => $region,
            'tier' => $tier,
            'rank' => $rank,
            'winrate' => $wins / $games * 100,
            'games' => $games,
            'wins' => $wins,
            'losses' => $losses,
        ]);

        return redirect("/profile")->with('success', 'Summoner added successfully.');
    }
    public function edit()
    {

        $regions = [
            'euw1' => 'EUW',
            'eun1' => 'EUNE',
            'na1' => 'NA',
            'kr' => 'KR',
            'br1' => 'BR',
            'la1' => 'LAN',
            'la2' => 'LAS',
            'oc1' => 'OCE',
            'ru1' => 'RU',
            'tr1' => 'TR',
            'jp1' => 'JP',
            'ph2' => 'PH',
            'sg2' => 'SG',
            'tw2' => 'TW',
            'vn2' => 'VN',
        ];

        $user = auth()->user();
        $summonerData = $user->summoner_names;
        $currentPage = 'Edit Summoner';

        return Inertia::render('EditSummoner', compact('summonerData', 'regions','currentPage'));
    }
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $summoner_name = Summoner::findOrFail($id);
        $request->validate([
            'summoner_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ]);


        $riotApiKey = env('RIOT_API_KEY');
        $username = urlencode($request->summoner_name);
        $region = $request->region;

        $response = Http::get("https://{$region}.api.riotgames.com/lol/summoner/v4/summoners/by-name/{$username}", [
            'api_key' => $riotApiKey,
        ]);
        $responseJson = $response->json();
        $summonerId = $responseJson["id"];

        $responsev2 = Http::get("https://{$region}.api.riotgames.com/lol/league/v4/entries/by-summoner/{$summonerId}", [
            'api_key' => $riotApiKey,
        ]);

        $userData = $responsev2->json();
        $tier = $userData[0]["tier"];
        $rank = $userData[0]["rank"];
        $wins = $userData[0]["wins"];
        $losses = $userData[0]["losses"];
        $games = $wins + $losses;

        $summoner_name->update([
            'summoner_name' => $request->input('summoner_name'),
            'region' => $request->input('region'),
            'tier' => $tier,
            'rank' => $rank,
            'winrate' => $wins / $games * 100,
            'games' => $games,
            'wins' => $wins,
            'losses' => $losses,
        ]);



        return redirect("/summoner/edit")
            ->with('success', 'Summoner details changed successfully.');
    }
    public function destroy(int $id)
    {
        $user = auth()->user();
        $summonerName = SummonerName::findOrFail($id)->delete();
        if (is_null($summonerName)) {
            return response()->json(["message" => "Summoner not found."], 404);
        }
        Summoner::destroy($id);

        // return redirect()->back();
        return redirect("/player/{$user->id}/profile")->with('success', 'Summoner deleted successfully.');

    }
}
