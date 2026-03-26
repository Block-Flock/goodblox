<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('global', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alert1')->default(0);
            $table->unsignedBigInteger('alert2')->default(0);
            $table->unsignedBigInteger('alert3')->default(0);
            $table->unsignedBigInteger('alert4')->default(0);
            $table->unsignedBigInteger('alert5')->default(0);
            $table->string('maintenance', 8)->default('off');
            $table->text('maintenance_message')->nullable();
            $table->timestamps();
        });

        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32)->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('thumbnail')->nullable();
            $table->unsignedBigInteger('creatorid')->default(0);
            $table->string('filename', 512)->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedInteger('sales')->default(0);
            $table->boolean('is_limited')->default(false);
            $table->timestamps();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('thumbnail')->nullable();
            $table->unsignedBigInteger('creator_id')->index();
            $table->unsignedInteger('players')->default(0);
            $table->string('ip', 128)->nullable();
            $table->unsignedInteger('port')->nullable();
            $table->string('defaultmapfilename', 256)->nullable();
            $table->timestamp('datecreated')->nullable();
            $table->timestamps();
        });

        Schema::create('pageviews', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 64);
            $table->unsignedBigInteger('userid');
            $table->timestamps();
        });

        Schema::create('owneditems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('assetid');
            $table->string('type', 32)->index();
            $table->timestamps();
        });

        Schema::create('owned_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ownerid');
            $table->unsignedBigInteger('itemid');
            $table->timestamps();
        });

        Schema::create('limited_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });

        Schema::create('owned_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('achievement_id');
            $table->timestamps();
        });

        Schema::create('avatar_cache', function (Blueprint $table) {
            $table->string('hash', 128)->primary();
            $table->string('head_color', 32)->nullable();
            $table->string('torso_color', 32)->nullable();
            $table->string('leftarm_color', 32)->nullable();
            $table->string('rightarm_color', 32)->nullable();
            $table->string('leftleg_color', 32)->nullable();
            $table->string('rightleg_color', 32)->nullable();
            $table->unsignedBigInteger('hatid1')->default(0);
            $table->unsignedBigInteger('hatid2')->default(0);
            $table->unsignedBigInteger('hatid3')->default(0);
            $table->unsignedBigInteger('faceid')->default(0);
            $table->unsignedBigInteger('shirtid')->default(0);
            $table->unsignedBigInteger('pantsid')->default(0);
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('assetid');
            $table->text('content');
            $table->unsignedBigInteger('time_posted');
            $table->timestamps();
        });

        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_from')->index();
            $table->unsignedBigInteger('user_to')->index();
            $table->string('arefriends', 8)->default('0');
            $table->timestamps();
        });

        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_file');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('friends');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('avatar_cache');
        Schema::dropIfExists('owned_achievements');
        Schema::dropIfExists('limited_sales');
        Schema::dropIfExists('owned_items');
        Schema::dropIfExists('owneditems');
        Schema::dropIfExists('pageviews');
        Schema::dropIfExists('games');
        Schema::dropIfExists('catalog');
        Schema::dropIfExists('global');
    }
};
