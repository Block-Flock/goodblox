<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (! DB::table('global')->where('id', 1)->exists()) {
            DB::table('global')->insert([
                'id' => 1,
                'alert1' => 0,
                'alert2' => 0,
                'alert3' => 0,
                'alert4' => 0,
                'alert5' => 0,
                'maintenance' => 'off',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (Schema::hasTable('forumgroups') && ! DB::table('forumgroups')->exists()) {
            $gid = DB::table('forumgroups')->insertGetId([
                'name' => 'Community',
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('topics')->insert([
                [
                    'category' => $gid,
                    'name' => 'General Discussion',
                    'description' => 'General topics',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'category' => $gid,
                    'name' => 'Help',
                    'description' => 'Help and support',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
