<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('summoners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string("summoner_name");
            $table->string("region");
            $table->string("tier")->nullable();
            $table->string("rank")->nullable();
            $table->double("winrate")->nullable();
            $table->integer("games")->nullable();
            $table->integer("wins")->nullable();
            $table->integer("losses")->nullable();
            $table->integer("custom_order")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summoners');
    }
};
