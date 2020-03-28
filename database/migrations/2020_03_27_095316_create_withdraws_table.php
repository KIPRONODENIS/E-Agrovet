<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Withdraw;
class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agrovet_id');
            $table->integer('amount');
            $table->string('phone');
            $table->timestamps();
        });

  Withdraw::create([
'agrovet_id'=>2,
'amount'=>200,
'phone'=>'0799012907'
  ]);

  Withdraw::create([
'agrovet_id'=>2,
'amount'=>200,
'phone'=>'0799012907'
  ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
}
