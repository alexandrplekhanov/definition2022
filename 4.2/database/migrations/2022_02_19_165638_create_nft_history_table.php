<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNftHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nft_history', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('nft_id');
            $table->integer('user_id');
            $table->integer('owner_user_id');
            $table->float('price', 16, 8);
            $table->integer('duration');
            $table->integer('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nft_history');
    }
}
