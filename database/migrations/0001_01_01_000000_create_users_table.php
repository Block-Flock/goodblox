<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->text('thumbnail')->nullable();
            $table->string('blurb', 500)->nullable();
            $table->unsignedBigInteger('lastseen')->default(0);
            $table->string('bantype', 32)->default('None');
            $table->text('banreason')->nullable();
            $table->string('bandate', 64)->nullable();
            $table->unsignedBigInteger('unbantime')->nullable();
            $table->string('USER_PERMISSIONS', 64)->default('Member');

            $table->string('BC', 16)->default('None');
            $table->string('BCExpire', 32)->nullable();
            $table->unsignedBigInteger('robux')->default(0);
            $table->unsignedBigInteger('tix')->default(0);
            $table->unsignedBigInteger('next_tix_reward')->nullable();
            $table->string('membership_type', 32)->default('NONE');
            $table->unsignedBigInteger('next_bricks_award')->nullable();

            $table->string('accountcode', 128)->nullable();
            $table->text('ip')->nullable();
            $table->string('defaultmaplocationfolder', 512)->nullable();

            $table->string('headcolor', 64)->nullable();
            $table->string('torsocolor', 64)->nullable();
            $table->string('leftarmcolor', 64)->nullable();
            $table->string('rightarmcolor', 64)->nullable();
            $table->string('leftlegcolor', 64)->nullable();
            $table->string('rightlegcolor', 64)->nullable();
            $table->string('avatar_hash', 128)->nullable();

            $table->timestamp('join_date')->nullable();
            $table->boolean('is_banned')->default(false);

            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
