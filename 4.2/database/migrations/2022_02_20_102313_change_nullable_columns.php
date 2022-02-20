<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('name', 50)->nullable()->change();
        });

        Schema::table('nft', function(Blueprint $table)
        {
            $table->integer('status')->nullable()->change();
            $table->integer('nft_key')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
            $table->integer('created_at')->nullable()->change();
            $table->integer('updated_at')->nullable()->change();
        });

        Schema::table('nft_history', function(Blueprint $table)
        {
            $table->integer('type')->nullable()->change();
            $table->integer('nft_id')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
            $table->integer('owner_user_id')->nullable()->change();
            $table->float('price', 16, 8)->nullable()->change();
            $table->integer('duration')->nullable()->change();
            $table->integer('created_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
