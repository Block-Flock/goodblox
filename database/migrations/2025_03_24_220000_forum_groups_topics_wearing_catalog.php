<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forumgroups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author')->index();
            $table->unsignedBigInteger('reply_to')->default(0)->index();
            $table->string('title')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('time_posted');
            $table->unsignedBigInteger('category')->index();
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
        });

        Schema::create('wearing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid')->index();
            $table->unsignedBigInteger('itemid');
            $table->string('type', 32)->index();
            $table->timestamps();
        });

        Schema::table('catalog', function (Blueprint $table) {
            $table->unsignedBigInteger('assetid')->nullable()->after('id');
            $table->string('hatmesh', 512)->nullable();
            $table->string('hattexture', 512)->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('time_joined')->nullable()->after('join_date');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('time_joined');
        });

        Schema::table('catalog', function (Blueprint $table) {
            $table->dropColumn(['assetid', 'hatmesh', 'hattexture']);
        });

        Schema::dropIfExists('wearing');
        Schema::dropIfExists('forum');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('forumgroups');
    }
};
