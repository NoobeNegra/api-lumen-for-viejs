<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ToDo next time with factories 

        $MAX_USERS = 10;
        $MAX_TOOLS = $MAX_USERS * 4;

        // Models
        DB::table('models')->insert(['name' => 'users']);
        DB::table('models')->insert(['name' => 'tools']);
        DB::table('models')->insert(['name' => 'exchanges']);

        //States
        DB::table('states')->insert(['name' => 'asked']);
        DB::table('states')->insert(['name' => 'canceled']);
        DB::table('states')->insert(['name' => 'accepted']);
        DB::table('states')->insert(['name' => 'given']);
        DB::table('states')->insert(['name' => 'waiting']);
        DB::table('states')->insert(['name' => 'returned']);

        // Availability
        DB::table('availability')->insert(['name' => 'to_all']);
        DB::table('availability')->insert(['name' => 'to_friends']);
        DB::table('availability')->insert(['name' => 'not']);

        // Create 10 random users
        for ($i = 0; $i < $MAX_USERS; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(30),
                'surename' => Str::random(30),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'origin' => 'WEBS'
            ]);
        }

        // Create 40 random tools
        for ($i = 0; $i < $MAX_TOOLS; $i++) {
            DB::table('tools')->insert([
                'user_id' => random_int(1, $MAX_USERS),
                'name' => Str::random(10),
                'model' => Str::random(10) . '-' . Str::random(5) . '-' . Str::random(10),
                'serial_number' => Str::random(10),
                'description' => Str::random(90),
                'available_id' => 1
            ]);
        }

        // Create 30 random comments
        for ($i = 0; $i < $MAX_USERS * 3; $i++) {
            $model = random_int(1, 2);
            if ($model == 1)
                $object = random_int(1, $MAX_USERS);
            else
                $object = random_int(1, $MAX_TOOLS);

            DB::table('comments')->insert([
                'user_id' => random_int(1, $MAX_USERS),
                'model_id' => random_int(1, 3),
                'comment' => Str::random(random_int(30, 160)),
                'object_id' => $object
            ]);
        }
    }
}
