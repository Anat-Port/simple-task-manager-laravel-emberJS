<?php

 use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('tasks')->delete();

        DB::table('tasks')->insert([
            'description' => 'משימה א',
            'is_completed' => false
        ]);


        DB::table('tasks')->insert([
            'description' => 'משימה ב',
            'is_completed' => true
        ]);
    }
 
}
