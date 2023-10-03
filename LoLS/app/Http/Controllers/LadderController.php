<?php

namespace App\Http\Controllers;

use App\Models\Summoner;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LadderController extends Controller
{
    public function ladder(){
        $summoners = Summoner::all();
        $users = User::all();
        return Inertia::render('Ladders',compact('summoners','users'));
    }

    public function frontpage(){
        $summoners = Summoner::all();
        $users = User::all();
        return Inertia::render('FrontPage',compact('summoners','users'));
    }

}
