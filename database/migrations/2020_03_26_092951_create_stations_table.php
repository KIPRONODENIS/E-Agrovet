<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Station;
class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('town_id');
            $table->string('name');
            $table->timestamps();
        });

Station::create([
'town_id'=>1,
'name'=>'Meru office'
]);
Station::create([
'town_id'=>1,
'name'=>'Meru-maua market office'
]);
Station::create([
'town_id'=>2,
'name'=>'Kianjai-maua market office'
]);

Station::create([
'town_id'=>2,
'name'=>'Makutano market office'
]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
