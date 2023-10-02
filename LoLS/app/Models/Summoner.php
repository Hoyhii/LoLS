<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summoner extends Model
{
    use HasFactory;

    protected $table = 'summoner_names';
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'summoner_name',
        'region',
        'tier',
        'rank',
        'winrate',
        'games',
        'wins',
        'losses',
        'custom_order',
    ];
}
