<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id'=>1,'title'=>'Post One','Content'=>'Post one Content'],
            ['user_id'=>1,'title'=>'Post Two','Content'=>'Post two Content'],
            ['user_id'=>1,'title'=>'Post Three','Content'=>'Post three Content']
        ]);
    }
}
