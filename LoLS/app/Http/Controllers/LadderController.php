<?php

namespace App\Http\Controllers;

use App\Models\Summoner;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class LadderController extends Controller
{
    public function ladder(){
        $summoners = Summoner::all();
        $users = User::all();
        $IsLoggedIn = auth()->check();
        return Inertia::render('Ladders',
            [   'summoners' => $summoners,
                'users' => $users,
                'isLoggedIn' => $IsLoggedIn
            ]);
    }

    public function frontpage(){
        $summoners = Summoner::all();
        $users = User::all();
        $IsLoggedIn = auth()->check();
        return Inertia::render('FrontPage',compact('summoners','users','IsLoggedIn'));
    }

}
