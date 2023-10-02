<?php

namespace App\Http\Controllers;

use App\Models\Summoner;
use App\Models\User;
use Illuminate\Http\Request;

class LadderController extends Controller
{
    public function ladder(){
        $summoner_names = Summoner::all();
        $users = User::all();
        return view('ladders.index',compact('summoner_names','users'));
    }

    public function frontpage($id){
        $user = User::findOrFail($id);
        $summoners = $user->summoner_names;
        return view('players.index', compact('user','summoners'));
    }

}
