<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('user_id')->comment('参加したユーザーのID');
            $table->unsignedBigInteger('user_id')->comment('参加したユーザーのID');
            $table->unsignedBigInteger('community_id')->comment('参加したコミュニティのID');
            $table->timestamps();

            // userが削除されたとき、参加しているコミュニティも全て退会(外部キー制約)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // コミュニティが削除されたとき、参加しているコミュニティも全て退会(外部キー制約)
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joins');
    }
}
